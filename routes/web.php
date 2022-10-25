<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    SessionController,
};

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [SessionController::class, 'create'])->name('sessions.create');
    Route::post('/login', [SessionController::class, 'store'])->name('sessions.store');
});
