<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        'auth' => \App\Http\Middleware\CheckAdminSession::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \App\Http\Middleware\checkAdminSession::class,
            // Sesuaikan dengan middleware lain yang Anda butuhkan untuk aplikasi web Anda
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];


    // protected $routeMiddleware = [
    //     'admin' => \App\Http\Middleware\CheckAdminSession::class,
    // ];

    protected $routeMiddleware = [
        'admin' => \App\Http\Middleware\CheckAdminSession::class,
        \App\Http\Middleware\admin::class,
        // Middleware lainnya...
    ];
}
