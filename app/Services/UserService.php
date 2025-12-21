<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class UserService
{
    /**
     * Fetch the logged-in user's dashboard data from the backend.
     *
     * @return array|null
     */
    public function fetchDashboardUser(): ?array
    {
        $token = Session::get('access_token');

        if (!$token) {
            Log::warning('No access token found in session for dashboard fetch.');
            return null;
        }

        try {
            $url = config('api.backend_url') . '/auth/dashboard';

            Log::info('Fetching user dashboard from backend', [
                'url' => $url,
                'user_id' => Session::get('user')['id'] ?? 'unknown',
            ]);

            $response = Http::timeout(15)
                ->withToken($token)
                ->get($url);

            if ($response->successful()) {
                $userData = $response->json();

                $actualUser = $userData['user'] ?? [];

                Log::info('Dashboard user fetched successfully', [
                    'user_id' => $actualUser['_id'] ?? 'unknown',
                    'email' => $actualUser['email'] ?? 'N/A',
                    'isVerified' => $actualUser['isVerified'] ?? 'N/A',
                ]);

                return $actualUser;
            }

            Log::error('Failed to fetch dashboard user', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            return null;

        } catch (\Exception $e) {
            Log::error('Dashboard Fetch Exception', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return null;
        }
    }
}
