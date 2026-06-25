<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\CrewPointController;
use App\Http\Controllers\ProfileController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/jadwal', [JadwalController::class, 'index']);

Route::get('/checklist', [ChecklistController::class, 'index']);

Route::get('/laporan', [LaporanController::class, 'index']);

Route::get('/crewpoints', [CrewPointController::class, 'index']);

Route::get('/profile', [ProfileController::class, 'index']);