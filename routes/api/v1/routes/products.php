<?php

use App\Http\Controllers\Api\V1\Products\CreateController;
use App\Http\Controllers\Api\V1\Products\DeleteController;
use App\Http\Controllers\Api\V1\Products\ListController;
use App\Http\Controllers\Api\V1\Products\UpdateController;
use App\Http\Controllers\Api\V1\Products\ViewController;
use Illuminate\Support\Facades\Route;

Route::prefix('products')->name('products.')->group(static function () {

    Route::get('', ListController::class)->name('list');
    Route::post('', CreateController::class)->name('create');
    Route::get('{product}', ViewController::class)->name('view');
    Route::put('{product}', UpdateController::class)->name('update');
    Route::delete('{product}', DeleteController::class)->name('delete');
});
