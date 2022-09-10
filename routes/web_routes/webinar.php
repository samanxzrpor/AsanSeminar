<?php


use Illuminate\Support\Facades\Route;



Route::get('/', [\Application\WebinarsController::class ,'index'])->name('webinars.list');

