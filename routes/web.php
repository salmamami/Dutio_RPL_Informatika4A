<?php

use App\Http\Controllers\LoginController;

Route::post('/login', [LoginController::class, 'login']);

Route::get('/dashboard-user', function () {
    return 'Dashboard User';
});

Route::get('/dashboard-koordinator', function () {
    return 'Dashboard Koordinator';
});