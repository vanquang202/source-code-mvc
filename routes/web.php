<?php

use Illuminate\Router\Router as Route;

/**
 * Code me
 */
Route::get('/', [App\Controllers\DashboardController::class, 'index']);