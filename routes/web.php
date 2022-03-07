<?php

use Illuminate\Route\Route;

/**
 * Code me
 */
Route::gruop('admin', function () {
    Route::get('test', function () {
        dd(11111);
    });
    Route::get('hi', [App\Controllers\DashboardController::class, 'index']);
});