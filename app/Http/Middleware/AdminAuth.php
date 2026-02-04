<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        $token = Session::get('access_token');
        $user  = Session::get('user');

        if (!$token || !$user) {
            Log::warning('Admin access denied: not authenticated');
            return redirect()->route('admin.login')
                ->with('error', 'Please log in to access this page.');
        }

        if (($user['user_type'] ?? null) !== 'admin') {
            Log::warning('Admin access denied: not admin', [
                'user_type' => $user['user_type'] ?? null
            ]);

            return redirect()->route('index')
                ->with('error', 'Unauthorized access.');
        }

        return $next($request);
    }
}
