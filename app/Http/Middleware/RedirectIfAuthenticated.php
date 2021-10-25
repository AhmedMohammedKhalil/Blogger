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
        if(Auth::check() && Auth::user()->role->id == '1')
        {
            return redirect()->route('admin.dashboard');
        }
        if(Auth::check() && Auth::user()->role->id == '2')
        {
            return redirect()->route('auther.profile');
        }
        return $next($request);
    }
}
