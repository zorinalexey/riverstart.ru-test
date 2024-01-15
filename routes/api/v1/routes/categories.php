<?php

use App\Http\Controllers\Api\V1\Categories\CreateController;
use App\Http\Controllers\Api\V1\Categories\DeleteController;
use App\Http\Controllers\Api\V1\Categories\ListController;
use App\Http\Controllers\Api\V1\Categories\UpdateController;
use App\Http\Controllers\Api\V1\Categories\ViewController;
use Illuminate\Support\Facades\Route;

Route::prefix('categories')->name('categories.')->group(static function () {

    Route::post('', CreateController::class)->name('create');
    Route::get('list', ListController::class)->name('list');
    Route::get('{category}', ViewController::class)->name('view');
    Route::put('{category}', UpdateController::class)->name('update');
    Route::delete('{category}', DeleteController::class)->name('delete');
});
