<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CheckAuthToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = Session::get('access_token'); 
        $user = Session::get('user');

        // If no token or user data, redirect to login
        if (!$token || !$user) {
            Log::info('Unauthorized Access Attempt', [
                'url' => $request->fullUrl(),
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent()
            ]);

            Session::flush();

            return redirect()->route('login')
                ->with('error', 'Please login to access this page.');
        }

      
        if (!$this->isValidTokenFormat($token)) {
            Log::warning('Invalid Token Format Detected', [
                'user_id' => $user['id'] ?? 'unknown',
                'token' => substr($token, 0, 10) . '...'
            ]);

            Session::flush();

            return redirect()->route('login')
                ->with('error', 'Invalid session. Please login again.');
        }

        // Passed all checks
        return $next($request);
    }

    /**
     * Validate token format (basic structure check).
     *
     * @param  string  $token
     * @return bool
     */
    private function isValidTokenFormat(string $token): bool
    {
        if (empty($token) || strlen($token) < 20) {
            return false;
        }

        // Basic check for JWT structure (3 parts separated by '.')
        $parts = explode('.', $token);
        return count($parts) === 3;
    }
}
