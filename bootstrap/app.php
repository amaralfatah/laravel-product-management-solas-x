<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Session\Middleware\StartSession;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        api: __DIR__ . '/../routes/api.php',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Jangan append middleware admin ke grup web secara default
        // $middleware->appendToGroup('web', \App\Http\Middleware\AdminMiddleware::class);

        // Pastikan StartSession ada di middleware web
        $middleware->web(append: [
            StartSession::class,
        ]);

        // Gunakan format array untuk alias
        $middleware->alias([
            'admin' => \App\Http\Middleware\AdminMiddleware::class,
            'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        ]);

        $middleware->api(prepend: [
            EnsureFrontendRequestsAreStateful::class,
            StartSession::class,
        ]);

        // Jangan nonaktifkan CSRF untuk semua routes
        // Hanya nonaktifkan untuk API jika diperlukan
        $middleware->validateCsrfTokens(except: [
            'api/*'
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Exceptions handling can be configured here
    })->create();
