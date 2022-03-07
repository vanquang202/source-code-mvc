<?php

namespace App\Middlewares;

class LoginMiddleware
{
    public function middleware()
    {
        if (isset($_SESSION['user'])) return true;
        return redirect('login');
    }
}