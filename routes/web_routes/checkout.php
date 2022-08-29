<?php


use Application\Checkout\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;

Route::prefix('checkout')->controller(CheckoutController::class)->group(function () {

    Route::get('/' , 'index')->name('checkout');
    Route::post('applyCode/{webinar}' ,  'applyCode')->name('checkout.apply-code');
    Route::post('buy' ,  'buyWebinar')->name('checkout.buyWebinar');
});
