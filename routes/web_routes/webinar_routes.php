<?php


use Illuminate\Support\Facades\Route;

Route::prefix('webinars')
    ->name('webinars.')
    ->controller(\Application\WebinarsController::class )
    ->group(function (){

    Route::get('/', 'index')->name('home');

    Route::get('{webinar:title}');

});
