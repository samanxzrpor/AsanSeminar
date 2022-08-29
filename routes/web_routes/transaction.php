<?php

use Application\Transaction\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;


Route::post('shaparak' , function (\Illuminate\Http\Request $request){
    $amount = $request->get('amount');
    $type = $request->get('type');
    return view('transaction' , ['amount' => $amount , 'type' => $type]);
})->name('shaparak');

Route::post('transaction' , [TransactionController::class , 'store'])->name('transaction.store');
