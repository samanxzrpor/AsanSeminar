<?php


use Application\Auth\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::prefix('login')->group(function (){

    Route::get('/', [AuthController::class , 'showLoginForm'])
        ->name('showLoginForm');

    Route::post('/', [AuthController::class , 'login'])
        ->middleware('throttle:authentication')
        ->name('login');
});

Route::prefix('register')->group(function (){

    Route::get('/', [AuthController::class , 'showRegisterForm'])
        ->name('showRegisterForm');

    Route::post('/', [AuthController::class , 'create'])
        ->middleware('throttle:authentication')
        ->name('register');
});
