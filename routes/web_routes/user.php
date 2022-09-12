<?php

use Illuminate\Support\Facades\Route;


Route::middleware('role:User|Master|Accountant')->name('user.')->group(function () {

        Route::prefix('webinars')->controller(\Application\User\Webinars\Controllers\WebinarController::class)
            ->group(function (){
                Route::get('/' , 'index')->name('webinars.index');
                Route::post('{webinar}/refund' , 'refund')->name('webinars.refund');

                Route::controller(\Application\User\Meetings\Controllers\MeetingsController::class)
                    ->middleware('open_webinars')
                    ->withoutMiddleware('role:User|Master|Accountant')
                    ->withoutMiddleware('auth')
                    ->group(function (){
                        Route::get('{webinar}/meetings' , 'index')->name('meetings.index');
                    });
        });

        Route::prefix('orders')->controller(\Application\User\Orders\Controllers\OrdersController::class)
            ->group(function (){
            Route::get('/' , 'index')->name('orders.index');
        });

        Route::prefix('transactions')->controller(\Application\User\Transactions\Controllers\TransactionsController::class)
            ->group(function (){
                Route::get('/' , 'index')->name('payments.index');
            });

        Route::prefix('{user}/my_webinars')->controller(\Application\User\Webinars\Controllers\MasterWebinarController::class)
            ->middleware('role:Master')
            ->group(function (){
                Route::get('/' , 'index')->name('my-webinars.index');
            });

        Route::prefix('profile')->controller(\Application\User\Profile\Controllers\ProfileController::class)
            ->group(function (){
                Route::get('/' , 'index')->name('profile.index');
            });

    });
