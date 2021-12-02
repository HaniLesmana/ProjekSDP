<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class checkLogin
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
        // if(Session::has('loggedIn'))
        // {
        //     return $next($request);
        // }
        // else {
        //     # Dikembalikan ke login page apabila belum login
        //     return redirect('/');
        //     return redirect('/');
        // }

        // AUTH
        // if(Auth::guard("web_user")->check() && !Auth::guard("web_pegawai")->check() && !Auth::guard("web_admin")->check())
        // {
        //     return $next($request);
        // }
        // else if(Auth::guard("web_pegawai")->check() && !Auth::guard("web_user")->check() && !Auth::guard("web_admin")->check())
        // {
        //     return $next($request);
        // }
        // else if(Auth::guard("web_admin")->check() && !Auth::guard("web_user")->check() && !Auth::guard("web_pegawai")->check())
        // {
        //     return $next($request);
        // }
        if(Auth::guard("web_user")->check())
        {
            return $next($request);

        }
        else if(Auth::guard("web_pegawai")->check())
        {
            return $next($request);
            dd("1");
        }
        else if(Auth::guard("web_admin")->check())
        {
            return $next($request);
        }
        else{
            return redirect()->back();
        }
        // AUTH
    }
}
