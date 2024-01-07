<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     */
    public function handle($request, Closure $next)
    {
       if(session()->has('locale')){
            app()->setLocale(session()->get('locale'));
       }

        return $next($request);
    }
}
