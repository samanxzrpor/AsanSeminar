<?php


use Illuminate\Support\Facades\Route;

Route::prefix('webinars')
    ->controller(\Application\User\Webinars\Controllers\WebinarController::class)
    ->group(function (){

    Route::get('/' , 'index')->name('webinars.index');
});
