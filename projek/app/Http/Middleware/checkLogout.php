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
        // dd('TEST');
        if(Session::has('loggedIn'))
        {
            $request->session()->forget('loggedIn');
        }

        if(Auth::guard("web_user")->check())
        {
            Auth::guard("web_user")->logout();
        }
        else if(Auth::guard("web_pegawai")->check())
        {
            Auth::guard("web_pegawai")->logout();
        }
        else if(Auth::guard("web_admin")->check())
        {
            Auth::guard("web_admin")->logout();
        }
        return $next($request);
    }
}
