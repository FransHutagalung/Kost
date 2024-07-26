<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        // dd($user);
        if ($user && $user->type == 'admin') {
            return $next($request);
        }

        // Jika pengguna tidak memenuhi syarat, arahkan atau kembalikan respons lain
        return response('Forbidden', 403);
    }
}
