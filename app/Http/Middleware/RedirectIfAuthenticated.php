<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ($guard == "admins" ) {
            if (Auth::guard('admins')->check()) {

                return redirect('/backend/home');
            }
        }
        if ($guard == 'user') {

            if (Auth::guard('user')->check()) {
                return redirect('/');
            }
        }

        return $next($request);
    }
}
