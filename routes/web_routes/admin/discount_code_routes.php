<?php
use Illuminate\Support\Facades\Route;

Route::prefix('discount')->group(function (){

    Route::get('/' , [\Application\Admin\DiscountCodes\Controllers\DiscountCodesController::class , 'index'])->name('discount-codes');
});
