<?php

use Application\Transaction\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;


Route::post('transaction' , [TransactionController::class , 'store'])->name('transaction.store');
