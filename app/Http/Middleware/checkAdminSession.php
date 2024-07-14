<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

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
        if ($request->session()->has('admin')) {
            // Jika tidak ada session admin, arahkan ke halaman login atau tindakan lain
            return redirect()->route('login');
        }

        // Lanjutkan permintaan jika session admin ada
        return $next($request);
    }
}
