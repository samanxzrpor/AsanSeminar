<?php


use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->middleware('role:Admin')
    ->name('admin.')
    ->group(function () {

        Route::resource('discount_codes' , \Application\Admin\DiscountCodes\Controllers\DiscountCodesController::class);
        Route::resource('orders' , \Application\Admin\Orders\Controllers\OrdersController::class);
        Route::resource('payments' , \Application\Admin\Payments\Controllers\PaymentsController::class);
        Route::resource('users' , \Application\Admin\User\Controllers\UsersController::class);
        Route::resource('webinars' , \Application\Admin\Webinars\Controllers\WebinarsController::class);

    });
