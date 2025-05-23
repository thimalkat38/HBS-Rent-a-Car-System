<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // If user is not logged in
        if (!Auth::check()) {
            return redirect('/please-login');
        }

        // If user is logged in but not an admin
        if (Auth::user()->userType !== 'admin') {
            return redirect('/');
        }

        // Allow access
        return $next($request);
    }
}
