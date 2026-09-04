<?php

use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::view('/login', 'auth.auth')->name('login');
    Route::view('/register', 'auth.register')->name('register');
});

Route::middleware('auth')->group(function () {
    Route::view('/', 'welcome')->name('home');
    Route::view('/tasks', 'welcome')->name('tasks');
    Route::view('/tasks/create', 'welcome')->name('tasks.create');
    Route::view('/settings', 'welcome')->name('settings');
    Route::view('/help', 'welcome')->name('help');
});
