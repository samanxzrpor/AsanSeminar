<?php


use Application\Admin\DiscountCodes\Controllers\DiscountCodesController;
use Application\Admin\Meetings\Controllers\MeetingsController;
use Application\Admin\Orders\Controllers\OrdersController;
use Application\Admin\Payments\Controllers\TransactionsController;
use Application\Admin\Users\Controllers\UsersController;
use Application\Admin\Webinars\Controllers\WebinarsController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->middleware('role:Admin|Accountant')
    ->name('admin.')
    ->group(function () {

        Route::resource('discount_codes' , DiscountCodesController::class)
        ->middleware('role:Admin');

        Route::prefix('orders')->controller(OrdersController::class)->group(function () {
            Route::get('' , 'index')->name('orders.index');
        });

        Route::prefix('payments')->controller(TransactionsController::class)->group(function () {
            Route::get('' , 'index')->name('payments.index');
        });

        Route::prefix('users')
            ->controller(UsersController::class)
            ->middleware('role:Admin')
            ->group(function () {
            Route::get('' , 'index')->name('users.index')->withoutMiddleware('role:Admin');
            Route::get('{user}/edit' , 'edit')->name('users.edit');
            Route::put('{user}/update' , 'update')->name('users.update');
            Route::delete('{user}/delete' , 'destroy')->name('users.destroy');
        });

        Route::prefix('webinars')
            ->controller(WebinarsController::class)
            ->middleware('role:Admin')
            ->group(function () {
            Route::get('' , 'index')->withoutMiddleware('role:Admin')->name('webinars.index');
            Route::get('create' , 'create')->name('webinars.create');
            Route::post('store' , 'store')->name('webinars.store');
            Route::get('{webinar}/edit' , 'edit')->name('webinars.edit');
            Route::put('{webinar}/update' , 'update')->name('webinars.update');
            Route::delete('{webinar}/delete' , 'destroy')->name('webinars.destroy');

            Route::prefix('{webinar}/meetings')
                ->controller(MeetingsController::class)
                ->group(function () {
                    Route::get('' , 'index')->middleware('role:Admin|Accountant')->name('meetings.index');
                    Route::get('create' , 'create')->name('meetings.create');
                    Route::post('store' , 'store')->name('meetings.store');
                    Route::get('{meeting}/edit' , 'edit')->middleware('open_webinars')->name('meetings.edit');
                    Route::put('{meeting}/update' , 'update')->middleware('open_webinars')->name('meetings.update');
                    Route::delete('{meeting}/delete' , 'destroy')->name('meetings.destroy');
                });
        });


    });
