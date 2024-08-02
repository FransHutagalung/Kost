<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use Inertia\Inertia;

class RegisterCustomerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */


public function handle(Request $request, Closure $next)
{
    $emailExist = User::where('email', $request->email)->first();

    if ($emailExist) {
        return redirect()->route('customer.signup')->withErrors('Email sudah ada');
    }

    return $next($request);
}

}
