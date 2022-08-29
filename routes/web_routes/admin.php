<?php


use Application\Admin\DiscountCodes\Controllers\DiscountCodesController;
use Application\Admin\Meetings\Controllers\MeetingsController;
use Application\Admin\Orders\Controllers\OrdersController;
use Application\Admin\Payments\Controllers\PaymentsController;
use Application\Admin\Users\Controllers\UsersController;
use Application\Admin\Webinars\Controllers\WebinarsController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->middleware('role:Admin')
    ->name('admin.')
    ->group(function () {

        Route::resource('discount_codes' , DiscountCodesController::class);
        Route::resource('orders' , OrdersController::class);
        Route::resource('payments' , PaymentsController::class);
        Route::resource('users' , UsersController::class);
        Route::resource('webinars' , WebinarsController::class);
        Route::resource('webinars/{webinar}/meetings' , MeetingsController::class)
        ->middleware('open_webinars');
    });
