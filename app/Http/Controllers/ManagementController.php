<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ManagementController extends Controller
{
    public function profile()
    {
        $token = Session::get('access_token');

        if (!$token) {
            return redirect()->route('login')->with('error', 'Please log in to view your profile.');
        }

        try {
            $url = config('api.backend_url') . '/auth/dashboard';

            Log::info('Fetching user profile from backend', [
                'url' => $url,
                'user_id' => Session::get('user')['id'] ?? 'unknown',
            ]);

            $response = Http::timeout(15)
                ->withToken($token)
                ->get($url);

            if ($response->successful()) {
                $user = $response->json();

                Log::info('Profile fetched successfully', [
                    'user_id' => $user['id'] ?? 'unknown',
                    'email' => $user['email'] ?? 'N/A',
                ]);

                // dd($user);
                // exit();
                return view('user-dashboard.show-profile', compact('user'));
            }

            Log::error('Failed to fetch user profile', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            return redirect()->back()->with('error', 'Unable to fetch profile data. Please try again.');

        } catch (\Exception $e) {
            Log::error('Profile Fetch Exception', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return redirect()->back()->with('error', 'An error occurred while fetching your profile.');
        }
    }


public function changePassword(Request $request)
{
    Log::info('--- Change Password Attempt ---', [
        'user_id' => Session::get('user')['id'] ?? 'unknown',
        'timestamp' => now(),
    ]);

    $validator = Validator::make(
        $request->all(),
        [
            'currentPassword' => 'required|string',
            'newPassword' => 'required|string|min:8|confirmed',
        ],
        [
            'currentPassword.required' => 'Current password is required.',
            'newPassword.required' => 'New password is required.',
            'newPassword.min' => 'New password must be at least 8 characters.',
            'newPassword.confirmed' => 'Password confirmation does not match.',
        ]
    );

    if ($validator->fails()) {
        Log::warning('Change password validation failed', [
            'errors' => $validator->errors()->toArray(),
        ]);
        return back()->withErrors($validator)->withInput();
    }

    $token = Session::get('access_token');

    if (!$token) {
        Log::error('No access token found for password change');
        return redirect()->route('login')->with('error', 'Session expired. Please log in again.');
    }

    try {
        $payload = [
            'currentPassword' => $request->currentPassword,
            'newPassword' => $request->newPassword,
        ];

        $url = config('api.backend_url') . '/auth/change-password';

        Log::info('Sending change password request to backend', [
            'url' => $url,
            'user_id' => Session::get('user')['id'] ?? 'unknown',
        ]);

        $response = Http::timeout(15)
            ->withToken($token)
            ->post($url, $payload);

        Log::info('Backend response received', [
            'status' => $response->status(),
            'body' => $response->json(),
        ]);

        if ($response->successful()) {
            Log::info('Password changed successfully', [
                'user_id' => Session::get('user')['id'] ?? 'unknown',
            ]);

            // Clear session and redirect to login
            Session::flush();
            
            return redirect()->back()->with('success', 'Password changed successfully! Please log in with your new password.');
        }

        $responseData = $response->json();
        $errorMessage = $responseData['message'] ?? 'Failed to change password.';

        Log::error('Password change failed', [
            'status' => $response->status(),
            'error' => $errorMessage,
            'response' => $responseData,
        ]);

        return back()->with('error', $errorMessage)->withInput($request->except(['currentPassword', 'newPassword', 'newPassword_confirmation']));

    } catch (\Illuminate\Http\Client\ConnectionException $e) {
        Log::error('Connection timeout during password change', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
        ]);

        return back()->with('error', 'Connection timeout. Please check your internet connection and try again.');

    } catch (\Exception $e) {
        Log::error('Change Password Exception', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
        ]);

        return back()->with('error', 'An error occurred while changing your password. Please try again.');
    }
}


public function updateProfile(Request $request)
{
    $token = Session::get('access_token');
    if (!$token) {
        return redirect()->route('login')->with('error', 'Please log in to update your profile.');
    }

    try {
        $url = config('api.backend_url') . '/auth/edit';
        Log::info('Updating user profile on backend', [
            'url' => $url,
            'user_id' => Session::get('user')['_id'] ?? 'unknown',
        ]);

        // Prepare payload - handle arrays for comma-separated fields
        $payload = $request->all();
        
        // Convert comma-separated strings to arrays
        if (isset($payload['postCodes']) && is_string($payload['postCodes'])) {
            $payload['postCodes'] = array_map('trim', explode(',', $payload['postCodes']));
        }
        
        if (isset($payload['services']) && is_string($payload['services'])) {
            $payload['services'] = array_map('trim', explode(',', $payload['services']));
        }
        
        if (isset($payload['serviceAreas']) && is_string($payload['serviceAreas'])) {
            $payload['serviceAreas'] = array_map('trim', explode(',', $payload['serviceAreas']));
        }

        // Convert numeric fields to appropriate types
        if (isset($payload['yearsOfExperience'])) {
            $payload['yearsOfExperience'] = (int) $payload['yearsOfExperience'];
        }
        
        if (isset($payload['hourlyRate'])) {
            $payload['hourlyRate'] = (float) $payload['hourlyRate'];
        }

        // Remove CSRF token and method spoofing fields
        unset($payload['_token'], $payload['_method']);

        Log::info('Profile update payload', ['payload' => $payload]);

        $response = Http::timeout(15)
            ->withToken($token)
            ->put($url, $payload);

        if ($response->successful()) {
            $updatedUser = $response->json();
            
            // Extract user data (handle nested structure if needed)
            $userData = $updatedUser['user'] ?? $updatedUser;

            // Update the session with fresh data
            Session::put('user', $userData);

            Log::info('Profile updated successfully and session refreshed', [
                'user_id' => $userData['_id'] ?? 'unknown',
                'first_name' => $userData['first_name'] ?? 'N/A',
            ]);

            return redirect()
                ->route('profile')
                ->with('success', 'Profile updated successfully.');
        }

        Log::error('Failed to update user profile', [
            'status' => $response->status(),
            'body' => $response->body(),
        ]);

        return redirect()->back()
            ->withInput()
            ->with('error', 'Unable to update profile. Please try again.');

    } catch (\Exception $e) {
        Log::error('Profile Update Exception', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
        ]);

        return redirect()->back()
            ->withInput()
            ->with('error', 'An error occurred while updating your profile.');
    }
}

}
