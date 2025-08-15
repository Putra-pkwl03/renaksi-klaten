<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoutingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanRenaksiController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\CategoryController;

// Group: (belum login)
Route::middleware('guest')->group(function () {
    Route::get('/auth/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/auth/login', [AuthController::class, 'login']);

    Route::get('/auth/register', [AuthController::class, 'showRegister']);
    Route::post('/auth/register', [AuthController::class, 'register']);
});

// Group: user yg sudah login
Route::middleware('auth')->group(function () {
    Route::post('/auth/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/', [RoutingController::class, 'index'])->name('root');

    Route::resource('laporan-renaksi', LaporanRenaksiController::class);
    Route::resource('units', UnitController::class);
    Route::resource('categories', CategoryController::class);

    // Catch-all 
    Route::get('{first}/{second}/{third}', [RoutingController::class, 'thirdLevel'])->name('third');
    Route::get('{first}/{second}', [RoutingController::class, 'secondLevel'])->name('second');
    Route::get('{any}', [RoutingController::class, 'root'])->name('any');
});

