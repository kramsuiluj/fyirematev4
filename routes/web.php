<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{FsicController, SessionController, DashboardController, HeadController};

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [SessionController::class, 'create'])->name('sessions.create');
    Route::post('/login', [SessionController::class, 'store'])->name('sessions.store');
});

Route::group(['middleware' => 'auth'], function () {
    Route::delete('/logout', [SessionController::class, 'destroy'])->name('sessions.destroy');
    Route::get('/certificates/create', [FsicController::class, 'create'])->name('certificates.create');
});

Route::get('/dashboard', DashboardController::class)->name('dashboard')->middleware('auth');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/heads', [HeadController::class, 'index'])->name('heads.index');
    Route::get('/heads/create', [HeadController::class, 'create'])->name('heads.create');
    Route::post('/heads', [HeadController::class, 'store'])->name('heads.store');
    Route::get('/heads/{head}/edit', [HeadController::class, 'edit'])->name('heads.edit');
    Route::patch('/heads/{head}', [HeadController::class, 'update'])->name('heads.update');
    Route::delete('/heads/{head}', [HeadController::class, 'destroy'])->name('heads.destroy');
});
