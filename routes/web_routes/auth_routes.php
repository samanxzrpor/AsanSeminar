<?php


use Application\Auth\Controllers\LoginController;
use Application\Auth\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;


Route::prefix('login')->group(function (){

    Route::get('/', [LoginController::class , 'showLoginForm'])
        ->name('showLoginForm');

    Route::post('/', [LoginController::class , 'login'])
        ->middleware('throttle:authentication')
        ->name('login');
});

Route::prefix('register')->group(function (){

    Route::get('/', [RegisterController::class , 'showRegisterForm'])
        ->name('showRegisterForm');

    Route::post('/', [RegisterController::class , 'login'])
        ->middleware('throttle:authentication')
        ->name('register');
});
