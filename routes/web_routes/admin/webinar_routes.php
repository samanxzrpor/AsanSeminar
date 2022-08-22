<?php


use Application\Admin\Webinars\Controllers\WebinarsController;
use Illuminate\Support\Facades\Route;

Route::prefix('webinars')
    ->controller(WebinarsController::class)
    ->group(function (){

    Route::get('/' , 'index')->name('webinars');
    Route::get('/create' ,  'create')->name('webinars.create');
    Route::get('/store' ,  'store')->name('webinars.store');
});
