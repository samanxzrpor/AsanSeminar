<?php


use Application\Admin\Webinars\Controllers\WebinarsController;
use Illuminate\Support\Facades\Route;


Route::resource('webinars' , WebinarsController::class);
