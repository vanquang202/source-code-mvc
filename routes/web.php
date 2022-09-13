<?php

use Illuminate\Router\Route;

/**
 * Code me
 */
Route::get('/', [App\Controllers\DashboardController::class, 'index']);