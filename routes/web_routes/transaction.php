<?php

use Application\Transaction\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;


Route::get('transaction' , [TransactionController::class , 'store'])->name('transaction.store');
