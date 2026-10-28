<?php

use App\Http\Middleware\ResolveTenant;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        apiPrefix: 'api',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Тенант определяется до подстановки моделей в роуты, иначе TenantScope не сработает на {property}.
        $middleware->api(prepend: [ResolveTenant::class]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
