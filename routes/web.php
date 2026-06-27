<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\CrewPointController;
use App\Http\Controllers\ProfileController;


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
Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/jadwal', [JadwalController::class, 'index']);

Route::get('/checklist', [ChecklistController::class, 'index']);

Route::get('/laporan', [LaporanController::class, 'index']);

Route::get('/crewpoints', [CrewPointController::class, 'index']);

Route::get('/profile', [ProfileController::class, 'index']);
