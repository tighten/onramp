<?php

declare(strict_types=1);

use App\Providers\AppServiceProvider;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use KgBot\LaravelLocalization\LaravelLocalizationServiceProvider;

return Application::configure(basePath: dirname(__DIR__))
    ->withProviders([
        LaravelLocalizationServiceProvider::class,
    ])
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        // channels: __DIR__.'/../routes/channels.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->redirectUsersTo(AppServiceProvider::HOME);

        $middleware->redirectGuestsTo(
            fn (Request $request) => $request->expectsJson() ? null : route_wlocale('login'),
        );

        $middleware->throttleApi();
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
