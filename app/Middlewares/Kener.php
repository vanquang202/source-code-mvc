<?php

namespace App\Middlewares;

class Kener
{
    public function register()
    {
        return [
            'login' => LoginMiddleware::class,
            'role' => RoleMiddleware::class,
        ];
    }
}