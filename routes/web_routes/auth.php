<?php


use Application\Auth\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::controller(AuthController::class)->group(function (){

    Route::get('login',  'showLoginForm')
        ->name('showLoginForm');

    Route::post('login', [AuthController::class , 'login'])
        ->middleware('throttle:authentication')
        ->name('login');

    Route::get('register','showRegisterForm')
        ->name('showRegisterForm');

    Route::post('register',  'create')
        ->middleware('throttle:authentication')
        ->name('register');

    Route::get('logout' , 'logout')->name('logout');
});
