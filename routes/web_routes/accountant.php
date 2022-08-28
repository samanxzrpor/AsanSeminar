<?php

use Illuminate\Support\Facades\Route;


Route::prefix('accountant/{user}')->middleware('role:Accountant')->name('accountant.')->group(function () {

        Route::prefix('webinars')->controller(\Application\Accountant\Webinars\Controllers\WebinarController::class)
            ->group(function (){
                Route::get('/' , 'index')->name('webinars.index');
        });

        Route::prefix('users')->controller(\Application\Accountant\Users\Controllers\UsersController::class)
        ->group(function (){
            Route::get('/' , 'index')->name('users.index');
        });

        Route::prefix('orders')->controller(\Application\Accountant\Orders\Controllers\OrdersController::class)
            ->group(function (){
                Route::get('/' , 'index')->name('orders.index');
            });
    });
