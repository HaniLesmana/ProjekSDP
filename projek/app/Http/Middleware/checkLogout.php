<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class checkLogout
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
        if(Session::has('loggedIn'))
        {
            return back();
        }
        else {
            # Dikembalikan ke login page apabila belum login
            return $next($request);
            // return redirect('/');
        }
    }
}
