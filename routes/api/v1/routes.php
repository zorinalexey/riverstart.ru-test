<?php

use App\Http\Controllers\Api\V1\Users\LoginController;
use Illuminate\Support\Facades\Route;

Route::prefix('users')->name('users.')->group(static function () {
    Route::post('login', LoginController::class)->name('login');
});

Route::middleware('auth:sanctum')->group(static function () {
    include __DIR__.DIRECTORY_SEPARATOR.'routes'.DIRECTORY_SEPARATOR.'users.php';
    include __DIR__.DIRECTORY_SEPARATOR.'routes'.DIRECTORY_SEPARATOR.'products.php';
    include __DIR__.DIRECTORY_SEPARATOR.'routes'.DIRECTORY_SEPARATOR.'categories.php';
});
