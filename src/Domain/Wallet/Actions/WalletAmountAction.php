<?php

namespace Domain\Wallet\Actions;

use Domain\Transaction\Models\Transaction;
use Domain\User\Models\User;

class WalletAmountAction
{

    public function __invoke()
    {
        $positiveTransactionAmount = Transaction::whereIn('type' ,['refund' , 'deposit'])
            ->pluck('amount')->sum();
        $negativeTransactionAmount = Transaction::whereIn('type' ,['buy' , 'withdraw'])
            ->pluck('amount')->sum();

        $walletAmount = $positiveTransactionAmount - $negativeTransactionAmount;
        return $walletAmount;
    }
}
