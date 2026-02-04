<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Show admin login form
     */
    public function login()
    {
        return view('admin.auth.login');
    }

    /**
     * Handle admin login submission
     */
    public function loginSubmit(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email|max:255',
                'password' => 'required|string|min:6',
            ],
            [
                'email.required' => 'Email is required.',
                'email.email' => 'Please enter a valid email address.',
                'password.required' => 'Password is required.',
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            $loginData = $request->only('email', 'password');
            $apiUrl = config('api.backend_url') . '/admin/auth/login';

            Log::info('Admin login attempt', [
                'url' => $apiUrl,
                'email' => $loginData['email']
            ]);

            $response = Http::timeout(15)
                ->withHeaders([
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ])
                ->post($apiUrl, $loginData);

            $responseData = $response->json();

            Log::info('Admin Login API Response', [
                'status' => $response->status(),
                'body' => $responseData,
            ]);

            if ($response->ok() && isset($responseData['access_token'], $responseData['admin'])) {
                // Store admin session data
                Session::put('access_token', $responseData['access_token']);
                Session::put('admin_refresh_token', $responseData['refresh_token'] ?? null);
                Session::put('admin', $responseData['admin']);

                Log::info('Admin login successful', [
                    'admin_id' => $responseData['admin']['_id'] ?? 'unknown',
                    'email' => $responseData['admin']['email']
                ]);

                return redirect()->route('admin.dashboard')
                    ->with('success', 'Welcome back, ' . ($responseData['admin']['name'] ?? 'Admin') . '!');
            }

            // Handle 401 (unauthorized)
            if ($response->status() === 401) {
                $message = $responseData['message'] ?? 'Login failed. Invalid email or password.';
                Log::warning('Admin login unauthorized', ['message' => $message]);
                return back()->with('error', $message)->withInput();
            }

            // Handle validation errors
            if ($response->status() === 422 && isset($responseData['errors'])) {
                return back()->withErrors($responseData['errors'])->withInput();
            }

            // Fallback error
            return back()->with('error', $responseData['message'] ?? 'Login failed.')->withInput();

        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            Log::error('Admin Login Connection Exception', [
                'error' => $e->getMessage(),
                'url' => $apiUrl ?? 'N/A'
            ]);
            return back()->with('error', 'Unable to connect to server. Please check your internet connection.')->withInput();

        } catch (\Exception $e) {
            Log::error('Admin Login Exception', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return back()->with('error', 'An unexpected error occurred. Please try again.')->withInput();
        }
    }

    /**
     * Show admin dashboard
     */
    public function dashboard2()
    {
        $token = Session::get('access_token');
        $user = Session::get('user');

        if (!$token || !$admin) {
            Log::warning('Admin dashboard access without token, redirecting to login.');
            return redirect()->route('admin.login')->with('error', 'Please log in to access the dashboard.');
        }

        try {
            $apiUrl = config('api.backend_url') . '/admin/dashboard';

            Log::info('Fetching admin dashboard data', [
                'url' => $apiUrl,
                'admin_id' => $admin['_id'] ?? 'unknown'
            ]);

            $response = Http::timeout(15)
                ->withToken($token)
                ->withHeaders([
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ])
                ->get($apiUrl);

            if ($response->successful()) {
                $dashboardData = $response->json();
                
                Log::info('Admin dashboard data fetched successfully');

                return view('admin.dashboard', [
                    'admin' => $admin,
                    'stats' => $dashboardData['data'] ?? []
                ]);
            }

            // Handle 401 (token expired)
            if ($response->status() === 401) {
                Session::flush();
                return redirect()->route('admin.login')->with('error', 'Your session has expired. Please log in again.');
            }

            Log::error('Admin dashboard API error', [
                'status' => $response->status(),
                'response' => $response->body()
            ]);

            return view('admin.dashboard', [
                'admin' => $admin,
                'stats' => [],
                'error' => 'Failed to load dashboard data.'
            ]);

        } catch (\Exception $e) {
            Log::error('Admin dashboard exception', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return view('admin.dashboard', [
                'admin' => $admin,
                'stats' => [],
                'error' => 'An error occurred while loading dashboard.'
            ]);
        }
    }



    public function dashboard()
{
    $token = Session::get('access_token');
    $user  = Session::get('user');

    if (!$token || !$user || $user['user_type'] !== 'admin') {
        Log::warning('Admin dashboard access denied');
        return redirect()->route('admin.login')
            ->with('error', 'Please log in to access the dashboard.');
    }

    $apiUrl = config('api.backend_url') . '/admin/dashboard';

    $response = Http::withToken($token)->get($apiUrl);

    return view('admin.dashboard', [
        'admin' => $user,
        'stats' => $response->json()['data'] ?? []
    ]);
}


    /**
     * Get all waitlist entries
     */
   public function waitlist(Request $request)
{
    $token = Session::get('access_token');
    $user  = Session::get('user');

    // Basic auth check
    if (!$token || !$user) {
        Log::warning('Waitlist access denied: missing session', [
            'token_exists' => (bool) $token,
            'user_exists'  => (bool) $user,
        ]);

        return redirect()
            ->route('admin.login')
            ->with('error', 'Please log in to access waitlist.');
    }

    // Build API URL from config
    $apiUrl = rtrim(config('api.backend_url'), '/') . '/waitlist/all';

    Log::info('Waitlist request starting', [
        'api_url' => $apiUrl,
        'admin_email' => $user['email'] ?? null,
        'token_preview' => substr($token, 0, 20) . '...',
    ]);

    try {
        $response = Http::timeout(30)
            ->withToken($token)
            ->acceptJson()
            ->get($apiUrl);

        // Log raw response details
        Log::info('Waitlist API response received', [
            'status' => $response->status(),
            'headers' => $response->headers(),
            'body_preview' => substr($response->body(), 0, 500),
        ]);

        // Handle expired token
        if ($response->status() === 401) {
            Log::warning('Waitlist API returned 401 – token expired');

            Session::flush();

            return redirect()
                ->route('admin.login')
                ->with('error', 'Session expired. Please log in again.');
        }

        // Handle non-success
        if (!$response->successful()) {
            Log::error('Waitlist API failed', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            return view('admin.waitlist', [
                'admin' => $user,
                'waitlist' => [],
                'count' => 0,
                'error' => 'Failed to fetch waitlist.',
            ]);
        }

        // Decode response
        $data = $response->json();

        Log::info('Waitlist API decoded successfully', [
            'success' => $data['success'] ?? null,
            'count' => $data['count'] ?? null,
            'items_received' => isset($data['data']) ? count($data['data']) : 0,
        ]);

        return view('admin.waitlist', [
            'admin'   => $user,
            'waitlist'=> $data['data'] ?? [],
            'count'   => $data['count'] ?? 0,
        ]);

    } catch (\Throwable $e) {
        Log::error('Waitlist exception thrown', [
            'message' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'trace' => $e->getTraceAsString(),
        ]);

        return view('admin.waitlist', [
            'admin' => $user,
            'waitlist' => [],
            'count' => 0,
            'error' => 'Unexpected error while loading waitlist.',
        ]);
    }
}


    /**
     * Send message to waitlisters
     */
    public function sendMessage(Request $request)
    {
        $token = Session::get('access_token');
        $user = Session::get('user');

        if (!$token || !$admin) {
            return redirect()->route('admin.login')->with('error', 'Please log in first.');
        }

        $validator = Validator::make(
            $request->all(),
            [
                'subject' => 'required|string|max:255',
                'message' => 'required|string',
                'userType' => 'nullable|string|in:user,specialist,all',
                'sendVia' => 'required|array',
                'sendVia.*' => 'in:email,sms,both'
            ],
            [
                'subject.required' => 'Subject is required.',
                'message.required' => 'Message content is required.',
                'sendVia.required' => 'Please select how to send the message.',
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            $apiUrl = config('api.backend_url') . '/admin/waitlist/send-message';

            $payload = [
                'subject' => $request->subject,
                'message' => $request->message,
                'userType' => $request->userType ?? 'all',
                'sendVia' => $request->sendVia
            ];

            Log::info('Sending message to waitlist', [
                'url' => $apiUrl,
                'payload' => $payload,
                'admin_id' => $admin['_id'] ?? 'unknown'
            ]);

            $response = Http::timeout(30)
                ->withToken($token)
                ->withHeaders([
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ])
                ->post($apiUrl, $payload);

            $responseData = $response->json() ?? [];

            if ($response->successful()) {
                Log::info('Message sent successfully', [
                    'admin_id' => $admin['_id'] ?? 'unknown',
                    'recipients_count' => $responseData['data']['sent_count'] ?? 0
                ]);

                return back()->with('success', $responseData['message'] ?? 'Messages sent successfully!');
            }

            // Handle 401 (token expired)
            if ($response->status() === 401) {
                Session::flush();
                return redirect()->route('admin.login')->with('error', 'Your session has expired. Please log in again.');
            }

            // Handle validation errors
            if ($response->status() === 422 && isset($responseData['errors'])) {
                return back()->withErrors($responseData['errors'])->withInput();
            }

            Log::error('Send message API error', [
                'status' => $response->status(),
                'response' => $response->body()
            ]);

            return back()->with('error', $responseData['message'] ?? 'Failed to send messages.')->withInput();

        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            Log::error('Message send connection failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return back()->with('error', 'Unable to connect to server. Please try again.')->withInput();

        } catch (\Exception $e) {
            Log::error('Message send exception', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return back()->with('error', 'An error occurred while sending messages.')->withInput();
        }
    }

    /**
     * Admin logout
     */
    public function logout()
    {
        $user = Session::get('user');

        Log::info('Admin logging out', [
            'admin_id' => $admin['_id'] ?? 'unknown',
            'email' => $admin['email'] ?? 'N/A'
        ]);

        // Clear admin session
        Session::forget(['access_token', 'admin_refresh_token', 'admin']);

        return redirect()->route('admin.login')->with('success', 'You have been logged out successfully.');
    }
}