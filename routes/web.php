<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::redirect('/', '/dashboard')->name('home');
    Route::view('/dashboard', 'dashboard.index')->name('dashboard');
    // Route::view('/settings', 'settings')->name('settings');
    // Route::view('/help', 'help')->name('help');
    Route::view('tasks', 'tasks')->name('tasks');
    Route::view('tasks/create', 'tasks.create')->name('tasks.create');
});
