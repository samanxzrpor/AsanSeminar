<?php


use Application\Admin\User\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::prefix('users')->group(function (){

    Route::get('/' , [UsersController::class , 'index'])->name('users');
});
