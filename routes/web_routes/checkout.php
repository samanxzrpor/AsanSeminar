<?php


use Application\Checkout\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;

Route::prefix('checkout')->group(function () {

    Route::get('/' , [CheckoutController::class, 'index'])->name('checkout');
    Route::post('applyCode/{webinar}' , [CheckoutController::class, 'applyCode'])->name('checkout.apply-code');
});
