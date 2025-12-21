<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CheckSpecialistRole
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Session::get('user');

        if (!$user) {
            // Not logged in at all
            Log::warning('Unauthorized access attempt: no user session', [
                'url' => $request->fullUrl(),
                'ip' => $request->ip(),
            ]);

            return redirect()->route('login')
                ->with('error', 'Please login to access this page.');
        }

        if (($user['user_type'] ?? '') !== 'specialist') {
            // User logged in but does not have specialist role
            Log::warning('Access denied: user lacks specialist role', [
                'user_id' => $user['id'] ?? 'unknown',
                'user_type' => $user['user_type'] ?? 'unknown',
                'url' => $request->fullUrl(),
            ]);

            return redirect()->route('index')
                ->with('error', 'You do not have permission to access this page.');
        }

        // Passed role check
        return $next($request);
    }
}
