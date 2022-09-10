<?php


use Application\User\Wallet\Controllers\WalletController;
use Illuminate\Support\Facades\Route;

Route::prefix('users/{user}/wallet')->group(function () {

    Route::get('/' , [WalletController::class , 'index'])->name('wallet.index');
    Route::post('charge/' , [WalletController::class , 'walletProcess'])->name('wallet.process');

});
