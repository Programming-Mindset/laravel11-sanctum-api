<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Auth\UserController;
use Illuminate\Support\Facades\Route;


Route::group([
    'prefix' => 'v1',
], function () {
    Route::post('/register', [RegisterController::class, 'register']);
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth:sanctum');

    Route::group([
        'midddleware' => ['auth:sanctum'],

    ], function () {
        Route::get('/users', [UserController::class, 'index']);
    });
});

