<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\CrewPointController;
use App\Http\Controllers\ProfileController;


Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/forgot-password', function () {
    return view('forgot-password');
});

Route::post('/login', [LoginController::class, 'login']);

Route::middleware(['auth','role:penghuni'])->group(function(){

    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard.user');

    Route::get('/jadwal',[JadwalController::class,'index']);

    Route::get('/checklist',[ChecklistController::class,'index']);

    Route::get('/laporan',[LaporanController::class,'index']);

    Route::get('/crewpoints',[CrewPointController::class,'index']);

    Route::get('/profile',[ProfileController::class,'index']);
});

Route::middleware(['auth','role:koordinator'])->group(function(){

    Route::get('/dashboard-koordinator', function(){
        return view('dashboard-koordinator');
    })->name('dashboard.koordinator');
});

Route::post('/logout',[LoginController::class,'logout']);