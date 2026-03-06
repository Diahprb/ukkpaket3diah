<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentAuthController;
use App\Http\Controllers\AspirasiController;

// homepage redirect logic
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('aspirasi.index');
    }

    return view('welcome');
});

// authentication routes for siswa
Route::get('/login', [StudentAuthController::class, 'showLogin'])->name('login');
Route::get('/register', [StudentAuthController::class, 'register'])->name('register');
Route::post('/register/store', [StudentAuthController::class, 'store'])->name('register.store');
Route::post('/login', [StudentAuthController::class, 'login']);
Route::post('/logout', [StudentAuthController::class, 'logout'])->middleware('auth')->name('logout');

// aspirasi pages protected by auth
Route::middleware('auth:siswa')->prefix('aspirasi')->group(function () {
    Route::get('/', [AspirasiController::class, 'index'])->name('aspirasi.index');

    Route::get('/create', [AspirasiController::class, 'create'])->name('aspirasi.create');
    Route::post('store', [AspirasiController::class, 'store'])->name('aspirasi.store');

    Route::get('/histori', [AspirasiController::class, 'histori'])->name('aspirasi.histori');

    // view single aspirasi
    Route::get('/{aspirasi}', [AspirasiController::class, 'show'])->name('aspirasi.show');

    // edit & update
    Route::get('/{aspirasi}/edit', [AspirasiController::class, 'edit'])->name('aspirasi.edit');
    Route::put('/{aspirasi}', [AspirasiController::class, 'update'])->name('aspirasi.update');

    // delete
    Route::delete('/{aspirasi}', [AspirasiController::class, 'destroy'])->name('aspirasi.destroy');
});
