<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\CrewPointController;
use App\Http\Controllers\ProfileController;

// Koordinator Controller
use App\Http\Controllers\Koordinator\DashboardController as KoordinatorDashboardController;
use App\Http\Controllers\Koordinator\JadwalController as KoordinatorJadwalController;
use App\Http\Controllers\Koordinator\ChecklistController as KoordinatorChecklistController;
use App\Http\Controllers\Koordinator\LaporanController as KoordinatorLaporanController;
use App\Http\Controllers\Koordinator\UserController as KoordinatorUserController;
use App\Http\Controllers\Koordinator\ProfileController as KoordinatorProfileController;
use App\Http\Controllers\Koordinator\CrewPointController as KoordinatorCrewPointController;
use App\Http\Controllers\Koordinator\PenghuniController as KoordinatorPenghuniController;
use App\Http\Controllers\Koordinator\PenilaianController as KoordinatorPenilaianController;


/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/login');
});


Route::get('/login', function () {
    return view('login');
})->name('login');


Route::post('/login', [LoginController::class, 'login'])
    ->name('login.submit');


Route::get('/forgot-password', function () {
    return view('forgot-password');
});


Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');



/*
|--------------------------------------------------------------------------
| USER
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard',
        [DashboardController::class, 'index']
    )->name('dashboard');


    Route::get('/jadwal',
        [JadwalController::class, 'index']
    );


    Route::get('/checklist',
        [ChecklistController::class, 'index']
    );


    Route::post('/checklist/{id}/toggle',
        [ChecklistController::class, 'toggle']
    )->name('checklist.toggle');


    Route::get('/laporan',
        [LaporanController::class, 'index']
    );


    Route::post('/laporan',
        [LaporanController::class, 'store']
    )->name('laporan.store');


    Route::get('/crewpoints',
        [CrewPointController::class, 'index']
    );


    Route::get('/profile',
        [ProfileController::class, 'index']
    );

});



/*
|--------------------------------------------------------------------------
| KOORDINATOR
|--------------------------------------------------------------------------
*/

Route::prefix('koordinator')->group(function () {


    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard',
        [KoordinatorDashboardController::class, 'index']
    )->name('koordinator.dashboard');



    /*
    |--------------------------------------------------------------------------
    | Jadwal
    |--------------------------------------------------------------------------
    */

    Route::resource('jadwal',
        KoordinatorJadwalController::class
    )->except(['show']);



    /*
    |--------------------------------------------------------------------------
    | Checklist
    |--------------------------------------------------------------------------
    */

    Route::resource('checklist',
        KoordinatorChecklistController::class
    )->except(['show']);



    /*
    |--------------------------------------------------------------------------
    | Laporan
    |--------------------------------------------------------------------------
    */

    Route::get('/laporan',
        [KoordinatorLaporanController::class,'index']
    )->name('koordinator.laporan.index');


    Route::get('/laporan/{id}',
        [KoordinatorLaporanController::class,'show']
    )->name('koordinator.laporan.show');


    Route::put('/laporan/{id}',
        [KoordinatorLaporanController::class,'update']
    )->name('koordinator.laporan.update');



    /*
    |--------------------------------------------------------------------------
    | User
    |--------------------------------------------------------------------------
    */

    Route::resource('user',
        KoordinatorUserController::class
    )->except(['show']);



    /*
    |--------------------------------------------------------------------------
    | Penghuni
    |--------------------------------------------------------------------------
    */

    Route::get('/penghuni',
        [KoordinatorPenghuniController::class,'index']
    )->name('koordinator.penghuni.index');


    Route::get('/penghuni/create',
        [KoordinatorPenghuniController::class,'create']
    )->name('koordinator.penghuni.create');


    Route::post('/penghuni',
        [KoordinatorPenghuniController::class,'store']
    )->name('koordinator.penghuni.store');


    Route::get('/penghuni/{id}/edit',
        [KoordinatorPenghuniController::class,'edit']
    )->name('koordinator.penghuni.edit');


    Route::put('/penghuni/{id}',
        [KoordinatorPenghuniController::class,'update']
    )->name('koordinator.penghuni.update');


    Route::delete('/penghuni/{id}',
        [KoordinatorPenghuniController::class,'destroy']
    )->name('koordinator.penghuni.destroy');

    /*
    |--------------------------------------------------------------------------
    | Penilaian
    |--------------------------------------------------------------------------
    */

    Route::get('/penilaian',
        [KoordinatorPenilaianController::class,'index']
    )->name('koordinator.penilaian.index');


    Route::get('/penilaian/create/{id}',
        [KoordinatorPenilaianController::class,'create']
    )->name('koordinator.penilaian.create');


    Route::post('/penilaian',
        [KoordinatorPenilaianController::class,'store']
    )->name('koordinator.penilaian.store');

    // LIHAT DETAIL PENILAIAN
    Route::get('/penilaian/{id}',
        [KoordinatorPenilaianController::class,'show']
    )->name('koordinator.penilaian.show');


    // EDIT PENILAIAN (TAMBAHKAN INI)
    Route::get('/penilaian/{id}/edit',
        [KoordinatorPenilaianController::class,'edit']
    )->name('koordinator.penilaian.edit');


    // UPDATE PENILAIAN (TAMBAHKAN INI)
    Route::put('/penilaian/{id}',
        [KoordinatorPenilaianController::class,'update']
    )->name('koordinator.penilaian.update');

    Route::delete('/penilaian/{id}',
        [KoordinatorPenilaianController::class,'destroy']
    )->name('koordinator.penilaian.destroy');



    /*
    |--------------------------------------------------------------------------
    | Crew Point
    |--------------------------------------------------------------------------
    */

    Route::get('/crewpoints',
        [KoordinatorCrewPointController::class,'index']
    )->name('koordinator.crewpoints.index');



    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */

    Route::get('/profile',
        [KoordinatorProfileController::class,'index']
    )->name('koordinator.profile.index');


    Route::get('/profile/edit',
        [KoordinatorProfileController::class,'edit']
    )->name('koordinator.profile.edit');


    Route::put('/profile/update',
        [KoordinatorProfileController::class,'update']
    )->name('koordinator.profile.update');


});