<?php


use Application\Admin\Webinars\Controllers\WebinarsController;
use Illuminate\Support\Facades\Route;

Route::prefix('webinars')->group(function (){

    Route::get('/' , [WebinarsController::class , 'index'])->name('webinars');
    Route::get('/create' , [WebinarsController::class , 'create'])->name('webinars.create');
});
