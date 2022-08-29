<?php


use Application\User\Wallet\Controllers\WalletController;
use Illuminate\Support\Facades\Route;

Route::prefix('{user}/wallet')->group(function () {

    Route::get('/' , [WalletController::class , 'index'])->name('wallet.index');

});
