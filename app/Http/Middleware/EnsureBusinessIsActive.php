<?php

namespace App\Http\Middleware;

use App\Models\Business;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureBusinessIsActive
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return $next($request);
        }

        $user = Auth::user();

        // SuperAdmin should not be blocked by business status
        if ($user && $user->userType === 'admin') {
            return $next($request);
        }

        if ($user && $user->business_id) {
            $business = Business::find($user->business_id);

            if ($business && $business->status !== 'active') {
                Auth::logout();

                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect()->route('login')->withErrors([
                    'email' => 'Your Account is deactivated. Please do nessecry paymnets for reactivate a bussince',
                ]);
            }
        }

        return $next($request);
    }
}

