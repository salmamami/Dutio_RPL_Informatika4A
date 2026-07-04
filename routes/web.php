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
use App\Http\Controllers\Koordinator\DashboardController as KoordinatorDashboardController;
use App\Http\Controllers\Koordinator\JadwalController as KoordinatorJadwalController;
use App\Http\Controllers\Koordinator\ChecklistController as KoordinatorChecklistController;
use App\Http\Controllers\Koordinator\LaporanController as KoordinatorLaporanController;



Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [LoginController::class,'login']);

Route::get('/forgot-password', function () {
    return view('forgot-password');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard',[DashboardController::class,'index']);

    Route::get('/jadwal',[JadwalController::class,'index']);

    Route::get('/checklist',[ChecklistController::class,'index']);

    Route::get('/laporan',[LaporanController::class,'index']);

    Route::get('/crewpoints',[CrewPointController::class,'index']);

    Route::get('/profile',[ProfileController::class,'index']);

});

Route::post('/logout',[LoginController::class,'logout']);

Route::get('/koordinator/dashboard', [KoordinatorDashboardController::class, 'index']);

Route::get('/koordinator/jadwal', [KoordinatorJadwalController::class, 'index']);

Route::get('/koordinator/jadwal/create', [KoordinatorJadwalController::class, 'create']);

Route::get('/koordinator/jadwal/{id}/edit', [KoordinatorJadwalController::class, 'edit']);

Route::post('/koordinator/jadwal', [KoordinatorJadwalController::class,'store']);

Route::put('/koordinator/jadwal/{id}', [KoordinatorJadwalController::class,'update']);

Route::delete('/koordinator/jadwal/{id}', [KoordinatorJadwalController::class,'destroy']);

Route::get('/koordinator/checklist', [KoordinatorChecklistController::class, 'index']);

Route::get('/koordinator/checklist/create', [KoordinatorChecklistController::class, 'create']);

Route::get('/koordinator/checklist/{id}/edit', [KoordinatorChecklistController::class, 'edit']);

Route::get('/koordinator/laporan', [KoordinatorLaporanController::class, 'index']);

Route::get('/koordinator/laporan/{id}', [KoordinatorLaporanController::class, 'show']);
