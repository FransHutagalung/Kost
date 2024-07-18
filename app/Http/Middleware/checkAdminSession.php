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
        if (!Auth::guard('web')->check()) {
            // Jika tidak ada session admin, arahkan ke halaman login atau tindakan lain
            return redirect()->route('user.login');
        }
        
        // Lanjutkan permintaan jika session admin ada
        // dd('gak ada');
        return $next($request);
    }
}
