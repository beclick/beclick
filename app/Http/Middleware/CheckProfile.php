<?php

namespace App\Http\Middleware;

use App\Models\Profile;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckProfile
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
        $profile = Profile::where('user_id',  Auth::user()->id)->first();
        if (!isset($profile)) {
            return redirect()->route('profile.edit');
        }
        return $next($request);
    }
}
