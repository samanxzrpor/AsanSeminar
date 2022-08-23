<?php


use Application\Admin\User\Controllers\UsersController;
use Illuminate\Support\Facades\Route;


Route::resource('users' , UsersController::class);
