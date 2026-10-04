<?php

use App\Http\Controllers\Wiki\ShowSpaceController;
use App\Http\Controllers\Wiki\StoreSpaceController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('wiki')->name('wiki.')->group(function () {
    Route::post('spaces', StoreSpaceController::class)->name('spaces.store');
    Route::get('{space}', ShowSpaceController::class)->name('spaces.show');
});