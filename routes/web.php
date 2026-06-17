<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/login', function () {
    return view('login');
});

Route::get('/forgot-password', function () {
    return view('forgot-password');
});

Route::post('/login', [LoginController::class, 'login']);

Route::get('/dashboard-user', function () {
    return 'Dashboard User';
});

Route::get('/dashboard-koordinator', function () {
    return 'Dashboard Koordinator';
});