<?php

use App\Http\Controllers\Api\V1\Users\CreateController;
use App\Http\Controllers\Api\V1\Users\DeleteController;
use App\Http\Controllers\Api\V1\Users\ListController;
use App\Http\Controllers\Api\V1\Users\LogoutController;
use App\Http\Controllers\Api\V1\Users\UpdateController;
use App\Http\Controllers\Api\V1\Users\ViewController;
use Illuminate\Support\Facades\Route;

Route::prefix('users')->name('users.')->group(static function () {
    Route::prefix('logout')->group(static function () {
        Route::any('', LogoutController::class)->name('logout');
    });

    Route::post('', CreateController::class)->name('create');
    Route::get('list', ListController::class)->name('list');
    Route::get('{user}', ViewController::class)->name('view');
    Route::put('{user}', UpdateController::class)->name('update');
    Route::delete('{user}', DeleteController::class)->name('delete');
});
