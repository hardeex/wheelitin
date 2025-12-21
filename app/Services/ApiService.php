<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class ApiService
{
    /**
     * Make API request with automatic token refresh on 401.
     *
     * @param string $method
     * @param string $url
     * @param array $data
     * @return \Illuminate\Http\Client\Response|\Illuminate\Http\RedirectResponse
     */
    public function apiRequestWithAutoRefresh(string $method, string $url, array $data = [])
    {
        $token = Session::get('access_token');
        $refreshToken = Session::get('refresh_token');

        $response = Http::withToken($token)->$method($url, $data);

        if ($response->status() === 401 && $refreshToken) {
            // Attempt to refresh the token
            $refreshResponse = Http::post(config('api.backend_url') . '/auth/refresh', [
                'refresh_token' => $refreshToken,
            ]);

            if ($refreshResponse->successful()) {
                $newTokens = $refreshResponse->json();

                Session::put('access_token', $newTokens['access_token']);
                Session::put('refresh_token', $newTokens['refresh_token']);

                // Retry original request
                return Http::withToken($newTokens['access_token'])->$method($url, $data);
            }

            // Refresh failed, clear session and redirect login
            Log::warning('Token refresh failed, logging out user.');

            Session::flush();

            return Redirect::route('login')->with('error', 'Session expired. Please login again.');
        }

        return $response;
    }
}
