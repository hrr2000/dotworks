<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Cache;

class LastActivity
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
        if(auth()->check()){
            Cache::put('frontend-online-'.auth()->user()->id,true,now()->addMinutes(5));
        }
        return $next($request);
    }
}
