<?php

use Illuminate\Support\Facades\Route;


Route::prefix('masters/{user}')->middleware('role:Master')->name('master.')->group(function () {

        Route::prefix('webinars')->controller(\Application\Master\Webinars\Controllers\WebinarController::class)
            ->group(function (){

                Route::get('/' , 'index')->name('webinars.index');

        });

    });
