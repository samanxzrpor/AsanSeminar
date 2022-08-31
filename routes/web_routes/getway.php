<?php


use Application\Checkout\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;

Route::prefix('pay')->controller(CheckoutController::class)->group(function () {

    Route::post('shaparak' , function (\Illuminate\Http\Request $request){
        $amount = $request->get('amount');
        $type = $request->get('type');
        return view('gateway' , ['amount' => $amount , 'type' => $type]);
    })->name('shaparak');

});
