<?php
use Illuminate\Support\Facades\Route;

Route::prefix('orders')->group(function (){

    Route::get('/' , [OrdersController::class , 'index'])->name('orders');
});
