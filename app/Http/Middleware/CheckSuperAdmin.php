<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckSuperAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if user is logged in and has a 'superadmin' role
        if (Auth::check() && Auth::user()->role === 'superadmin') {
            return $next($request);
        }

        // Redirect to home or show unauthorized message
        abort(403, 'Unauthorized access.');
    }
}
