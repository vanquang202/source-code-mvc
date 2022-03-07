<?php

namespace App\Middlewares;

class RoleMiddleware
{
    public function middleware()
    {
        if ($_SESSION['user']['role_id'] == 2) return true;
        return false;
    }
}