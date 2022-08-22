<?php

use Application\Admin\Payments\Controllers\PaymentsController;
use Illuminate\Support\Facades\Route;

Route::prefix('payments')->group(function (){

    Route::get('/' , [PaymentsController::class , 'index'])->name('payments');
});
