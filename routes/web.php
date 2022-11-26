<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AdminUserController,
    CertificateController,
    SessionController,
    DashboardController,
    HeadController,
    PrintController,
    InspectionOrderController,
    InspectionOrderPrintController,
    UserDashboardController,
    ActivityController,
    ChiefController,
    MarshalController,
};

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [SessionController::class, 'create'])->name('sessions.create');
    Route::post('/login', [SessionController::class, 'store'])->name('sessions.store');
});

Route::group(['middleware' => 'can:admin'], function () {
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

        Route::get('/personnel/chiefs', [ChiefController::class, 'index'])->name('personnel.chiefs.index');
        Route::get('/personnel/chiefs/create', [ChiefController::class, 'create'])->name('personnel.chiefs.create');
        Route::post('/personnel/chiefs', [ChiefController::class, 'store'])->name('personnel.chiefs.store');
        Route::get('/personnel/chiefs/{chief}/edit', [ChiefController::class, 'edit'])->name('personnel.chiefs.edit');
        Route::patch('/personnel/chiefs/{chief}', [ChiefController::class, 'update'])->name('personnel.chiefs.update');
        Route::patch('/personnel/chiefs/{chief}/default', [ChiefController::class, 'updateDefault'])->name('personnel.chiefs.updateDefault');
        Route::delete('/personnel/chiefs/{chief}', [ChiefController::class, 'destroy'])->name('personnel.chiefs.destroy');

        Route::get('/personnel/marshals', [MarshalController::class, 'index'])->name('personnel.marshals.index');
        Route::get('/personnel/marshals/create', [MarshalController::class, 'create'])->name('personnel.marshals.create');
        Route::post('/personnel/marshals', [MarshalController::class, 'store'])->name('personnel.marshals.store');
        Route::get('/personnel/marshals/{marshal}/edit', [MarshalController::class, 'edit'])->name('personnel.marshals.edit');
        Route::patch('/personnel/marshals/{marshal}', [MarshalController::class, 'update'])->name('personnel.marshals.update');
        Route::patch('/personnel/marshals/{marshal}/default', [MarshalController::class, 'updateDefault'])->name('personnel.marshals.updateDefault');

        Route::get('/logs', [ActivityController::class, 'index'])->name('activities.index');

        Route::group(['as' => 'users.'], function () {
            Route::get('/users', [AdminUserController::class, 'index'])->name('index');
            Route::get('/users/create', [AdminUserController::class, 'create'])->name('create');
            Route::post('/users/store', [AdminUserController::class, 'store'])->name('store');
            Route::get('/users/{user}/edit', [AdminUserController::class, 'edit'])->name('edit');
            Route::patch('/users/{user}', [AdminUserController::class, 'update'])->name('update');
            Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('destroy');
        });
    });
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/users/dashboard', UserDashboardController::class)->name('users.dashboard')->middleware('can:basic');

    Route::delete('/logout', [SessionController::class, 'destroy'])->name('sessions.destroy');
    Route::get('/certificates/create', [CertificateController::class, 'create'])->name('certificates.create');
    Route::get('/certificates', [CertificateController::class, 'index'])->name('certificates.index');
    Route::get('/certificates/{certificate}', [CertificateController::class, 'show'])->name('certificates.show');

    Route::post('/certificates/store', [CertificateController::class, 'store'])->name('certificates.store');
    Route::get('/certificates/{certificate}/edit', [CertificateController::class, 'edit'])->name('certificate.edit');
    Route::patch('/certificates/{certificate}', [CertificateController::class, 'update'])->name('certificates.update');

    Route::delete('/certificates/{certificate}', [CertificateController::class, 'destroy'])->name('certificates.destroy');

    Route::get('/certificates/{certificate}/ios', [InspectionOrderController::class, 'index'])->name('ios.index');
    Route::get('/certificates/{certificate}/ios/create', [InspectionOrderController::class, 'create'])->name('ios.create');
    Route::post('/certificates/{certificate}/ios', [InspectionOrderController::class, 'store'])->name('ios.store');
    Route::get('/certificates/{certificate}/ios/{io}/print', InspectionOrderPrintController::class)->name('ios.print');
    Route::delete('/certificates/{certificate}/ios/{io}', [InspectionOrderController::class, 'destroy'])->name('ios.destroy');
});

Route::get('/certificates/{certificate}/print', PrintController::class)->name('print');

Route::view('/test', 'test');
