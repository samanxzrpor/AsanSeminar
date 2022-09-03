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

        Route::prefix('users')->controller(UsersController::class)->group(function () {
            Route::get('' , 'index')->name('users.index');
            Route::get('{user}/edit' , 'edit')->name('users.edit')->middleware('role:Admin');
            Route::put('{user}/update' , 'update')->name('users.update')->middleware('role:Admin');
            Route::delete('{user}/delete' , 'destroy')->name('users.destroy')->middleware('role:Admin');
        });

        Route::prefix('webinars')->controller(WebinarsController::class)->group(function () {
            Route::get('' , 'index')->name('webinars.index');
            Route::get('create' , 'create')->name('webinars.create')->middleware('role:Admin');
            Route::post('store' , 'store')->name('webinars.store')->middleware('role:Admin');
            Route::get('{webinar}/edit' , 'edit')->name('webinars.edit')->middleware('role:Admin');
            Route::put('{webinar}/update' , 'update')->name('webinars.update')->middleware('role:Admin');
            Route::delete('{webinar}/delete' , 'destroy')->name('webinars.destroy')->middleware('role:Admin');
        });

        Route::resource('webinars/{webinar}/meetings' , MeetingsController::class)
        ->middleware(['open_webinars' , 'role:Admin']);
    });
