<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SawController;
use App\Http\Controllers\MfepController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\PerbandinganController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/home', [DashboardController::class, 'index']);
    Route::resource('siswa', SiswaController::class);
    Route::resource('kriteria', KriteriaController::class);
    Route::resource('alternatif', AlternatifController::class);
    Route::resource('perhitungan-saw', SawController::class);
    Route::resource('perhitungan-mfep', MfepController::class);
    Route::resource('perbandingan', PerbandinganController::class);
    Route::resource('pengguna', UserController::class);
    Route::post('/siswa/ubah', [SiswaController::class, 'ubah'])->name('siswa.ubah');
    Route::post('/kriteria/ubah', [KriteriaController::class, 'ubah'])->name('kriteria.ubah');
    Route::post('/alternatif/ubah', [AlternatifController::class, 'ubah'])->name('alternatif.ubah');
});