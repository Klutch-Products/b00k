<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Remove Inertia-related middleware
        // You can add any other middleware you need here
        // $middleware->web(append: [
        //     // Add your custom middleware here if needed
        // ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
