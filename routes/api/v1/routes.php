<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(static function (){
    include __DIR__ . DIRECTORY_SEPARATOR . 'routes'. DIRECTORY_SEPARATOR .'users.php';
    include __DIR__ . DIRECTORY_SEPARATOR . 'routes'. DIRECTORY_SEPARATOR .'products.php';
    include __DIR__ . DIRECTORY_SEPARATOR . 'routes'. DIRECTORY_SEPARATOR .'categories.php';
});
