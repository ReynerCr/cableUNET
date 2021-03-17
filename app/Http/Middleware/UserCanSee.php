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
    public function handle(Request $request, Closure $next, $param)
    {
        $requestedId = $request->route($param);
        if(Auth::user()->id == $requestedId->id) {
            return $next($request);
        }
        else {
            return redirect(route('client.home'));
        }
    }
}
