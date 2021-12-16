<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // $user = Auth::guard("web_user")->user();
        // dd($user);
        if(Auth::guard("web_user")->check() && $role=='user'){
            return $next($request);
        }
        elseif(Auth::guard("web_pegawai")->check() && $role=='pegawai'){
            return $next($request);
        }
        elseif(Auth::guard("web_admin")->check() && $role=='admin'){
            return $next($request);
        }
        else{
            return abort(403);
        }
    }
}
