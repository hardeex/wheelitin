<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminAuth
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $token = Session::get('admin_access_token');
        $admin = Session::get('admin');

        if (!$token || !$admin) {
            return redirect()->route('admin.login')
                ->with('error', 'Please log in to access this page.');
        }

        return $next($request);
    }
}