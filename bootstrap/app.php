<?php

use App\Http\Middleware\CheckAdminRole;
use App\Http\Middleware\CheckAuthToken;
use App\Http\Middleware\CheckSpecialistRole;
use App\Http\Middleware\RedirectIfAuthenticated;
use GuzzleHttp\RedirectMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        

        $middleware->alias([
            'check.auth' => CheckAuthToken::class,
            'check.specialist' => CheckSpecialistRole::class,
            'check.admin' => CheckAdminRole::class,
            'redirect.auth' => RedirectIfAuthenticated::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
