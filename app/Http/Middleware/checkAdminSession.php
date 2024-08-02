<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdminSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Pemeriksaan apakah pengguna memiliki session admin
        if (!Auth::guard('Admin')->check() ) {
            if(Auth::guard('Admin')->user()->type != 'admin'){
                return redirect()->route('user.login');
            }
            return redirect()->route('user.login');
        }
        // dd(Auth::guard('Admin')->user()->type);
        // Lanjutkan permintaan jika session admin ada
        // dd('gak ada');
        return $next($request);
    }
}
