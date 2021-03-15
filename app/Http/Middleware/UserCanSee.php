<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCanSee
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
        $requestedId = $request->user;
        if(! Auth::user()->id == $requestedId) {
            return $next($request);
        }
        else {
            return redirect(route('user.home'));
        }
    }
}
