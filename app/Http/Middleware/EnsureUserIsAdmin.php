<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsAdmin
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
        //if (!Auth::check() || !Auth::user()->isAdmin) {
          //  return redirect('home')->with('error', 'You do not have access to this resource.');
        //}

        return $next($request);
    }
}
