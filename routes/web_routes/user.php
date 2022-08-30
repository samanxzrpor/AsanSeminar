<?php

use Illuminate\Support\Facades\Route;


Route::prefix('users/{user}')->middleware('role:User|Master|Accountant')->name('user.')->group(function () {

        Route::prefix('webinars')->controller(\Application\User\Webinars\Controllers\WebinarController::class)
            ->group(function (){
                Route::get('/' , 'index')->name('webinars.index');
        });

        Route::prefix('orders')->controller(\Application\User\Orders\Controllers\OrdersController::class)
            ->group(function (){
            Route::get('/' , 'index')->name('orders.index');
        });

        Route::prefix('payments')->controller(\Application\User\Payments\Controllers\PaymentsController::class)
            ->group(function (){
                Route::get('/' , 'index')->name('payments.index');
            });

        Route::prefix('my_webinars')->controller(\Application\User\Webinars\Controllers\MasterWebinarController::class)
            ->middleware('role:Master')
            ->group(function (){
                Route::get('/' , 'index')->name('my-webinars.index');
            });

        Route::prefix('profile')->controller(\Application\User\Profile\Controllers\ProfileController::class)
            ->group(function (){
                Route::get('/' , 'index')->name('profile.index');
            });
    });
