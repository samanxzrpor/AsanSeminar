<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [\Application\Admin\Webinars\Controllers\WebinarController::class  , 'index']);
Route::get('/login', [\Application\Auth\LoginController::class , 'showLoginForm'])->name('showLoginForm');
Route::get('/login', [\Application\Auth\LoginController::class , 'showLoginForm'])->name('login');
