<?php

namespace App\Http\Middleware;

use Closure;

class AuthenAdmin
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
        if(!$request->user() || $request->user()->type !== 'admin') {
            return  redirect(url('/'));
        }
        return $next($request);
    }
}
