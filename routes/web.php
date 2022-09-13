<?php

use Illuminate\RouterApp\Router as Route;

/**
 * Code me
 */
Route::get('/', [App\Controllers\DashboardController::class, 'index']);