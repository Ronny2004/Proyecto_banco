<?php
// app/Http/Kernel.php
namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    // ...

    protected $routeMiddleware = [
        // Otros middlewares...
        'check.permission' => \App\Http\Middleware\CheckPermission::class,
    ];
}
