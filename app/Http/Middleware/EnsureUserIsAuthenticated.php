<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsAuthenticated
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to access this page'); // User is authenticated, proceed
        }

        return $next($request); // User is not authenticated, redirect to login
    }
}
