<?php

namespace App\Http\Middleware;

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
        switch ($guard) {
            case 'owner':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('owner.dashboard');
                }
                break;
            case 'supplier':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('supplier.dashboard');
                }
                break;
            default:
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('pelanggan.dashboard');
                }
                break;
        }
        return $next($request);
    }
}
