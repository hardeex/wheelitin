<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
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

        if ($token && $user && isset($user['user_type'])) {
            // Role-based redirection
            switch ($user['user_type']) {
                case 'user':
                    return redirect()->route('user.dashboard')
                        ->with('info', 'You are already logged in.');
                case 'specialist':
                    return redirect()->route('specialist.dashboard')
                        ->with('info', 'You are already logged in.');
                case 'admin':
                    return redirect()->route('admin.dashboard')
                    ->with('info', 'You are already logged in');
                default:
                    return redirect()->route('index')
                        ->with('info', 'You are already logged in.');
            }
        }

        return $next($request);
    }
}
