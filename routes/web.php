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
Route::middleware('auth:siswa')->group(function () {
    Route::get('/aspirasi', [AspirasiController::class, 'index'])->name('aspirasi.index');

    Route::get('/aspirasi/create', [AspirasiController::class, 'create'])->name('aspirasi.create');
    Route::post('/aspirasi/store', [AspirasiController::class, 'store'])->name('aspirasi.store');

    // view single aspirasi
    Route::get('/aspirasi/{aspirasi}', [AspirasiController::class, 'show'])->name('aspirasi.show');

    // edit & update
    Route::get('/aspirasi/{aspirasi}/edit', [AspirasiController::class, 'edit'])->name('aspirasi.edit');
    Route::put('/aspirasi/{aspirasi}', [AspirasiController::class, 'update'])->name('aspirasi.update');

    // delete
    Route::delete('/aspirasi/{aspirasi}', [AspirasiController::class, 'destroy'])->name('aspirasi.destroy');
});
