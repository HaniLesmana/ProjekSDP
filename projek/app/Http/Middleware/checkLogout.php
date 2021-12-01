<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            $request->session()->forget('loggedIn');
            Auth::guard("web_user")->logout();
            Auth::guard("web_pegawai")->logout();
            Auth::guard("web_admin")->logout();

        }
        return $next($request);
    }
}
