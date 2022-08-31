<?php


use Application\Checkout\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;

Route::prefix('checkout')->controller(CheckoutController::class)->group(function () {

    Route::get('webinar/{webinar}' , 'index')->name('checkout');
    Route::post('applyCode/{webinar}' ,  'applyCode')->name('checkout.apply-code');
    Route::post('buy/{webinar}' ,  'buyWebinar')
        ->middleware('restrict_buy_already_webinar')
        ->name('checkout.buyWebinar');
});
