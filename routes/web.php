<?php

use Illuminate\Route\Route;

/**
 * Code me
 */
Route::get('/',[App\Controllers\DashboardController::class, 'index']);