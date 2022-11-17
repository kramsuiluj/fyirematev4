<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AdminUserController,
    CertificateController,
    SessionController,
    DashboardController,
    HeadController,
    PrintController
};

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [SessionController::class, 'create'])->name('sessions.create');
    Route::post('/login', [SessionController::class, 'store'])->name('sessions.store');
});

Route::group(['middleware' => 'auth'], function () {
    Route::delete('/logout', [SessionController::class, 'destroy'])->name('sessions.destroy');
    Route::get('/certificates', [CertificateController::class, 'index'])->name('certificates.index');
    Route::get('/certificates/create', [CertificateController::class, 'create'])->name('certificates.create');
    Route::get('/certificates/{certificate}', [CertificateController::class, 'show'])->name('certificates.show');
    Route::post('/certificates/store', [CertificateController::class, 'store'])->name('certificates.store');
});

Route::get('/dashboard', DashboardController::class)->name('dashboard')->middleware('auth');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::group(['as' => 'heads.'], function () {
        Route::get('/heads', [HeadController::class, 'index'])->name('index');
        Route::get('/heads/create', [HeadController::class, 'create'])->name('create');
        Route::post('/heads', [HeadController::class, 'store'])->name('store');
        Route::get('/heads/{head}/edit', [HeadController::class, 'edit'])->name('edit');
        Route::patch('/heads/{head}', [HeadController::class, 'update'])->name('update');
        Route::delete('/heads/{head}', [HeadController::class, 'destroy'])->name('destroy');
    });

    Route::group(['as' => 'users.'], function () {
        Route::get('/users', [AdminUserController::class, 'index'])->name('index');
        Route::get('/users/create', [AdminUserController::class, 'create'])->name('create');
        Route::post('/users/store', [AdminUserController::class, 'store'])->name('store');
        Route::get('/users/{user}/edit', [AdminUserController::class, 'edit'])->name('edit');
        Route::patch('/users/{user}', [AdminUserController::class, 'update'])->name('update');
        Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('destroy');
    });
});

Route::get('/certificates/{certificate}/print', PrintController::class)->name('print');
