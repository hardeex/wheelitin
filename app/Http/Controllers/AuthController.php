<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{


    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }



    /**
     * Show registration form
     */
    public function register()
    {
        return view('auth.register');
    }

    /**
     * Handle registration submission
     */

public function submit(Request $request)
{
    Log::info('The register method is called');
    Log::info('The incoming request', $request->all());

    // Frontend validation before API call
    $validator = Validator::make(
        $request->all(),
        [                
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'password' => 'required|string|min:8',
            'user_type' => 'required|string|in:user,specialist',
            'address' => 'required|string|max:500',
            'postCodes' => 'required|string|max:10',
        ]
    );

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    try {
        // Prepare data for API
        $apiData = [               
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password,
            'user_type' => $request->user_type,
            'address' => $request->address,
            'postCodes' => $request->postCodes,
        ];

        // Make API request
        $response = Http::timeout(15)->post(config('api.backend_url') . '/auth/signup', $apiData);

        // Log the full response (excluding tokens)
        Log::info('Registration API Response', [
            'status' => $response->status(),
            'body' => Arr::except($response->json() ?? [], ['access_token', 'refresh_token']),
        ]);

        $status = $response->status();
        $responseData = $response->json() ?? [];

        /**
         *  Handle success
         */
        if ($status === 201) {
            $user = $responseData['user'] ?? null;
            $warnings = $responseData['warnings'] ?? [];
            $accessToken = $responseData['access_token'] ?? null;

            // Store tokens in session 
            Session::put('access_token', $accessToken);
            Session::put('user', $user);

            $role = $user['user_type'] ?? 'default';

            $redirectRoute = match ($role) {
                'user' => 'user.dashboard',
                'specialist' => 'specialist.dashboard',
                'admin' => 'admin.dashboard',
                default => 'index',
            };

            return redirect()->route($redirectRoute)
                ->with('success', $responseData['message'] ?? 'Registration successful!')
                ->with('warnings', $warnings);
        }

        /**
         *  Handle validation error from backend (422)
         */
        if ($status === 422) {
            $errors = $responseData['errors'] ?? null;
            $message = $responseData['message'] ?? 'Validation failed.';

            if ($errors) {
                return back()->withErrors($errors)->withInput();
            }

            return back()->with('error', $message)->withInput();
        }

        /**
         * Handle duplicate or bad request (400)
         */
        if ($status === 400) {
            $errorMessage = $responseData['error']
                ?? $responseData['message']
                ?? 'Invalid request. Please check your input.';
            
            return back()->with('error', $errorMessage)->withInput();
        }

        /**
         * Handle internal server errors
         */
        if ($status === 500) {
            Log::error('Registration Server Error', [
                'message' => $responseData['message'] ?? 'Server error occurred.',
                'details' => $responseData['details'] ?? '',
                'status' => 500,
            ]);

            return back()
                ->with('error', $responseData['message'] ?? 'Server error occurred. Please try again later.')
                ->withInput();
        }

        /**
         *  Handle any other unexpected response
         */
        $errorMessage = $responseData['message']
            ?? $responseData['error']
            ?? 'Unexpected error occurred during registration. Please try again.';

        return back()->with('error', $errorMessage)->withInput();

    } catch (\Illuminate\Http\Client\ConnectionException $e) {
        Log::error('Registration API Connection Failed', [
            'error' => $e->getMessage(),
            'url' => config('api.backend_url') . '/auth/signup',
        ]);

        return back()->with('error', 'Unable to connect to server. Please check your internet connection and try again.')
                     ->withInput();
    } catch (\Exception $e) {
        Log::error('Registration Exception', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
        ]);

        return back()->with('error', 'An unexpected error occurred: ' . $e->getMessage())->withInput();
    }
}


    /**
     * Show login form
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Handle login submission
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

        $response = Http::timeout(150)
            ->post(config('api.backend_url') . '/auth/login', $loginData);

        $responseData = $response->json();

        Log::info('Login API Response', [
            'status' => $response->status(),
            'body' => $responseData,
        ]);

        if ($response->ok() && isset($responseData['access_token'], $responseData['user'])) {
            // Store session data
            Session::put('access_token', $responseData['access_token']);
            Session::put('refresh_token', $responseData['refresh_token'] ?? null);
            Session::put('user', $responseData['user']);

            // Role-based redirection
            $userType = $responseData['user']['user_type'] ?? 'default';
            $redirectRoute = match ($userType) {
                'user' => 'user.dashboard',
                'specialist' => 'specialist.dashboard',
                'admin' => 'admin.dashboard',
                default => 'index',
            };

            return redirect()->route($redirectRoute)
                ->with('success', 'Welcome back, ' . ($responseData['user']['first_name'] ?? 'User') . '!');
        }

        // Handle 401 (unauthorized)
        if ($response->status() === 401) {
            $message = $responseData['message'] ?? 'Login failed because you entered either a wrong email or password.';
            return back()->with('error', $message)->withInput();
        }

        // Handle validation errors
        if ($response->status() === 422 && isset($responseData['errors'])) {
            return back()->withErrors($responseData['errors'])->withInput();
        }

        // Fallback error
        return back()->with('error', $responseData['message'] ?? 'Login failed.')->withInput();

    } catch (\Exception $e) {
        Log::error('Login Exception', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
        ]);

        return back()->with('error', 'An unexpected error occurred. Please try again.')->withInput();
    }
}


    /**
     * Show verification page
     */
public function showVerification()
    {
        $user = $this->userService->fetchDashboardUser();

        if (!$user) {
            Log::warning('User fetch failed in showVerification, redirecting to login.');
            return redirect()->route('login')->with('error', 'Please log in to verify your account.');
        }

        Log::info('Showing verification page for user', [
            'user_id' => $user['_id'] ?? 'unknown',
            'email' => $user['email'] ?? 'N/A'
        ]);

        return view('auth.verify', compact('user'));
    }
   



public function verifyAccount(Request $request)
{
    Log::info('The email verification method is called', $request->all());
    // Validate only email
    $validator = Validator::make(
        $request->all(),
        [
            'email' => 'required|email',
        ],
        [
            'email.required' => 'Email is required.',
            'email.email' => 'Please provide a valid email address.',
        ]
    );

    if ($validator->fails()) {
        Log::warning('Email verification validation failed', [
            'errors' => $validator->errors()->toArray(),
            'input' => $request->except(['token']),
        ]);
        return back()->withErrors($validator);
    }

    $token = Session::get('access_token');
    $email = $request->input('email');
    $url = config('api.backend_url') . '/auth/send-verification';

    if (!$token) {
        Log::warning('No access token found in session for email verification.');
        return redirect()->route('login')->with('error', 'Please log in before verifying your account.');
    }

    try {
        Log::info('Sending email verification request', [
            'url' => $url,
            'email' => $email,
        ]);

        // Send request with Authorization header
        $response = Http::timeout(15)
            ->withToken($token)
            ->post($url, ['email' => $email]);

        Log::debug('Verification API response', [
            'status' => $response->status(),
            'body' => $response->body(),
        ]);

        if ($response->successful()) {
            Session::forget('pending_verification');

            Log::info('Email verification successful', ['email' => $email]);

            return redirect()->route('user.dashboard')
                ->with('success', 'Your email has been verified successfully!');
        }

        // Handle errors
        $responseData = $response->json();
        $errorMessage = $responseData['message'] ?? 'Email verification failed.';

        Log::warning('Email verification failed', [
            'status' => $response->status(),
            'message' => $errorMessage,
            'response' => $responseData,
        ]);

        if ($response->status() === 401) {
            // If token expired, redirect to login
            return redirect()->route('login')->with('error', 'Your session has expired. Please log in again.');
        }

        return back()->with('error', $errorMessage);

    } catch (\Illuminate\Http\Client\RequestException $e) {
        Log::error('Email Verification RequestException', [
            'error' => $e->getMessage(),
            'url' => $url,
        ]);
        return back()->with('error', 'Verification request failed: ' . $e->getMessage());

    } catch (\Exception $e) {
        Log::error('Email Verification General Exception', [
            'error' => $e->getMessage(),
            'url' => $url,
        ]);
        return back()->with('error', 'Verification failed: ' . $e->getMessage());
    }
}



public function verifyEmailLink(Request $request)
{
    Log::info('The method for verifying the email link method is called');

    $token = $request->query('token');
    $userId = $request->query('userId');
    $url = config('api.backend_url') . '/auth/verify-email';
    $startTime = microtime(true);

    if (empty($token) || empty($userId)) {
        Log::warning('Email verification link missing required parameters', [
            'token' => $token,
            'userId' => $userId,
        ]);
        return redirect()->route('login')->with('error', 'Invalid or expired verification link.');
    }

    try {
        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        $payload = [
            'userId' => $userId,
            'token' => $token,
        ];

        Log::info('Verifying email using link', [
            'url' => $url,
            'headers' => $headers,
            'payload' => [
                'userId' => $userId,
                'token' => substr($token, 0, 8) . '***', // partial token for safety
            ],
        ]);

        $response = Http::timeout(20)
            ->withHeaders($headers)
            ->get($url, $payload);

        $duration = round(microtime(true) - $startTime, 2);

        Log::debug('Email verification API raw response', [
            'status' => $response->status(),
            'duration_seconds' => $duration,
            'headers' => $response->headers(),
            'body_snippet' => substr($response->body(), 0, 500), // cap log to avoid overflow
        ]);

        if ($response->successful()) {
            Log::info('Email verification via link successful', [
                'user_id' => $userId,
                'duration_seconds' => $duration,
            ]);

            Session::forget('pending_verification');

            return redirect()->route('login')
                ->with('success', 'Your email has been successfully verified! You can now log in.');
        }

        $responseData = $response->json();
        $errorMessage = $responseData['message'] ?? 'Email verification failed.';

        Log::warning('Email verification via link failed', [
            'status' => $response->status(),
            'message' => $errorMessage,
            'response' => $responseData,
            'duration_seconds' => $duration,
        ]);

        return redirect()->route('login')->with('error', $errorMessage);

    } catch (\Illuminate\Http\Client\RequestException $e) {
        Log::error('Email verification RequestException', [
            'error' => $e->getMessage(),
            'url' => $url,
            'trace' => $e->getTraceAsString(),
        ]);
        return redirect()->route('login')->with('error', 'Verification request failed. Please try again.');

    } catch (\Exception $e) {
        Log::error('Email verification General Exception', [
            'error' => $e->getMessage(),
            'url' => $url,
            'trace' => $e->getTraceAsString(),
        ]);
        return redirect()->route('login')->with('error', 'An unexpected error occurred. Please try again.');
    }
}



    /**
     * Resend verification
     */
    public function resendVerification(Request $request)
    {
        try {
            $data = $request->only(['email', 'phone']);

            $response = Http::timeout(150)->post(config('api.backend_url') . '/resend-verification', $data);

            if ($response->successful()) {
                return back()->with('success', 'Verification details resent successfully!');
            }

            $responseData = $response->json();
            return back()->with('error', $responseData['message'] ?? 'Failed to resend verification.');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    /**
     * Show auth code verification page
     */
    public function showAuthCodeVerification()
    {
        $pending = Session::get('pending_auth_verification');

        if (!$pending) {
            return redirect()->route('login')->with('error', 'No pending authentication found.');
        }

        return view('auth.verify-auth-code', compact('pending'));
    }

    /**
     * Verify auth code
     */
    public function verifyAuthCode(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'auth_code' => 'required|string|size:5',
            ],
            [
                'auth_code.size' => 'Authentication code must be exactly 5 characters.',
            ],
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            $response = Http::timeout(150)->post(config('api.backend_url') . '/verify-dashboard-code', $request->only(['email', 'auth_code']));

            if ($response->successful()) {
                $responseData = $response->json();

                Session::put('auth_token', $responseData['data']['authorization']['token']);
                Session::put('user', $responseData['data']['user']);
                Session::forget('pending_auth_verification');

                return redirect()
                    ->route('dashboard')
                    ->with('success', 'Welcome back, ' . $responseData['data']['user']['name'] . '!');
            }

            $responseData = $response->json();
            return back()
                ->with('error', $responseData['message'] ?? 'Invalid authentication code.')
                ->withInput();
        } catch (\Exception $e) {
            Log::error('Auth Code Verification Exception', ['error' => $e->getMessage()]);
            return back()->with('error', 'Verification failed: ' . $e->getMessage());
        }
    }

    /**
     * Show forgot password form
     */
    public function showForgotPassword()
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle forgot password
     */

    public function forgotPassword(Request $request)
{
    Log::info('The forgot password method is called');
    Log::info('The incoming request', $request->all());

    $validator = Validator::make(
        $request->all(),
        [
            'email' => 'required|email',
        ],
        [
            'email.required' => 'Email address is required.',
            'email.email' => 'Please provide a valid email address.',
        ],
    );

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    try {
        $url = config('api.backend_url') . '/auth/forgot-password';
        Log::info('Calling backend URL: ' . $url);

        $client = Http::timeout(30);
        $response = $client->post($url, $request->only('email'));

        Log::info('Forgot Password Response', [
            'status' => $response->status(),
            'body' => $response->body(),
        ]);

        if ($response->successful()) {
            return back()->with('success', 'Password reset link sent to your email. Please check your inbox.');
        }

        $responseData = $response->json();
        return back()
            ->with('error', $responseData['message'] ?? 'Failed to send reset link.')
            ->withInput();

    } catch (\Exception $e) {
        Log::error('Forgot Password Exception', ['error' => $e->getMessage()]);
        return back()->with('error', 'An error occurred: ' . $e->getMessage());
    }
}


    /**
     * Show reset password form
     */
    public function showResetPassword(Request $request)
{
    Log::info('--- Accessed Reset Password Page ---');
    Log::info('Incoming query parameters:', $request->query());

    $token = $request->query('token');
    $email = $request->query('email');

    if (!$token || !$email) {
        Log::warning('Missing token or email in reset password link.', [
            'token' => $token,
            'email' => $email,
        ]);

        return redirect()->route('login')->with('error', 'Invalid reset link.');
    }

    Log::info('Valid reset link detected', [
        'token' => substr($token, 0, 5) . '...', // avoid logging full token
        'email' => $email,
    ]);

    return view('auth.reset-password', compact('token', 'email'));
}

/**
 * Handle reset password and change password
 */
public function resetPassword(Request $request)
{
    Log::info('--- Password Reset Attempt ---', [
        'email' => $request->input('email'), 
        'token' => substr($request->input('token'), 0, 10) . '...', 
    ]);

    $validator = Validator::make(
        $request->all(),
        [
            'token' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ],
        [
            'password.min' => 'Password must be at least 8 characters.',
            'password.confirmed' => 'Password confirmation does not match.',
        ]
    );

    if ($validator->fails()) {
        Log::warning('Password Reset Validation Failed', [
            'errors' => $validator->errors()->all(),
            'input' => $request->except('password', 'password_confirmation'), 
        ]);

        return back()->withErrors($validator)->withInput();
    }

    try {
       $payload = [
    'token' => $request->input('token'),
    'email' => $request->input('email'),
    'newPassword' => $request->input('password'),
];


        Log::info('Sending reset password request to backend', [
            'url' => config('api.backend_url') . '/auth/reset-password',
            'payload' => ['token' => substr($payload['token'], 0, 10) . '...', 'newPassword' => '***'],
        ]);

        $response = Http::timeout(15)->post(config('api.backend_url') . '/auth/reset-password', $payload);

        Log::info('Backend response received', [
            'status' => $response->status(),
            'body' => $response->json(),
        ]);

        if ($response->successful()) {
            return redirect()->route('login')->with('success', 'Password reset successfully! You can now login with your new password.');
        }

        $responseData = $response->json();

        Log::error('Password reset failed', [
            'response' => $responseData,
            'input' => ['token' => substr($payload['token'], 0, 10) . '...'],
        ]);

        return back()
            ->with('error', $responseData['message'] ?? 'Password reset failed.')
            ->withInput();

    } catch (\Exception $e) {
        Log::error('Reset Password Exception', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
        ]);

        return back()->with('error', 'An error occurred: ' . $e->getMessage());
    }
}


    /**
     * Handle logout
     */
    public function logout()
    {
        $token = Session::get('auth_token');

        if ($token) {
            try {
                Http::withToken($token)->post(config('api.backend_url') . '/logout');
            } catch (\Exception $e) {
                Log::error('Logout API Error', ['error' => $e->getMessage()]);
            }
        }

        Session::flush();

        return redirect()->route('login')->with('success', 'You have been logged out successfully.');
    }
}
