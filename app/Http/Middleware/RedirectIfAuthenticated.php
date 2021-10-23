<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if (Auth::user()->hasRole('admin')) {
                    return redirect()->route('admin.home');
                } elseif (Auth::user()->hasRole('citizen')) {
                    return redirect()->route('citizen.home');
                } elseif (Auth::user()->hasRole('paramedic')) {
                    return redirect()->route('paramedic.home');
                } elseif (Auth::user()->hasRole('vaccination-center')) {
                    return redirect()->route('vaccination_center.home');
                }
                Auth::logout();
            }
        }

        return $next($request);
    }
}
