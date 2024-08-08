<?php

use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Middleware\StudentMiddleware;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))

    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
       then: function () {
             Route::middleware('api')
            ->prefix('admin')
            ->name('admin.')
            ->group(base_path('routes/admin.php'));
       },
        )
    
    ->withMiddleware(function (Middleware $middleware) {
       [
        'student' => $middleware->append(StudentMiddleware::class),
        'admin' => $middleware->append(AdminMiddleware::class),
        ];
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
        
    })->create();
