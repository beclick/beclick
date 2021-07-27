<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Access
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(isset($request->access) && $request->access == env('ACCESS_REQUEST')){
            \Session::put('access', env('ACCESS_REQUEST'));
        }
        if(env('ACCESS') == true || \Session::get('access') == env('ACCESS_REQUEST')){
            return $next($request);
        }
        return redirect()->route('welcome');
    }
}
