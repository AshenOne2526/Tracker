<?php

use App\Http\Controllers\Auth\CreateAuthenticatedSessionController;
use App\Http\Controllers\Auth\CreateRegisteredUserController;
use App\Http\Controllers\Auth\DestroyAuthenticatedSessionController;
use App\Http\Controllers\Auth\StoreAuthenticatedSessionController;
use App\Http\Controllers\Auth\StoreRegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('login', CreateAuthenticatedSessionController::class)->name('login');
    Route::post('login', StoreAuthenticatedSessionController::class)->name('login.store');

    Route::get('register', CreateRegisteredUserController::class)->name('register');
    Route::post('register', StoreRegisteredUserController::class)->name('register.store');
});

Route::middleware('auth')->group(function () {
    Route::post('logout', DestroyAuthenticatedSessionController::class)->name('logout');
});