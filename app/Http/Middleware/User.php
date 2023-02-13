<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Closure;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()){

            return $next($request);
            
        }
        return redirect(RouteServiceProvider::WELCOME);

        
    }
}
