<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AutocomplateController, DashboardController, JabatanController, LoginController, OpdController, ProfileController, SubController};

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
    Route::post('/login/proses', [LoginController::class, 'proses'])->name('login.proses');
});



Route::middleware(['auth', 'verified'])->group(function () {

    Route::post('/login/logout', [LoginController::class, 'logout'])->name('login.logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::controller(OpdController::class)->group(function () {
        Route::get('/opd',  'index')->name('opd');
    });
    Route::controller(SubController::class)->group(function () {
        Route::post('/sub',  'index')->name('sub');
        Route::post('/sub/modal/jabatan',  'modaljabatan')->name('modal.sub.jabatan');
        Route::post('/sub/modal/pilih',  'pilih')->name('modal.pilih.jabatan');
        Route::post('/sub/modal/pilih/proses',  'pilihjabatan')->name('proses.pilih.jabatan');
    });
    Route::controller(JabatanController::class)->group(function () {
        Route::get('/jabatan', 'index')->name('jabatan');
        Route::post('/jabatan/modal', 'modal')->name('jabatan.modal');
        Route::post('/jabatan/store', 'store')->name('jabatan.store');
    });
    Route::controller(AutocomplateController::class)->group(function () {
        Route::get('/auto/jabatan', 'jabatan')->name('auto.jabatan');
    });
});
