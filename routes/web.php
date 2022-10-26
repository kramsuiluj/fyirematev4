<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    SessionController,
    DashboardController,
    HeadController,
};

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [SessionController::class, 'create'])->name('sessions.create');
    Route::post('/login', [SessionController::class, 'store'])->name('sessions.store');
});

Route::group(['middleware' => 'auth'], function () {
   Route::delete('/logout', [SessionController::class, 'destroy'])->name('sessions.destroy');
});

Route::get('/dashboard', DashboardController::class)->name('dashboard');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/heads/create', [HeadController::class, 'create'])->name('heads.create');
    Route::post('/heads', [HeadController::class, 'store'])->name('heads.store');
});
