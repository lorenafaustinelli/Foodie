<?php

namespace App\Http\Middleware;
use App\Providers\RouteServiceProvider;

use Closure;
use Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        //UTENTE

        //per layout
        if(Auth::user()->admin=='false'){
            return redirect(RouteServiceProvider::USER);
        }
        
        return $next($request);
    }
}
