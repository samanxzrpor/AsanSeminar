<?php

namespace Domain\Wallet\Actions;

use Domain\Transaction\Models\Transaction;
use Domain\User\Models\User;
use Illuminate\Support\Facades\Auth;

class WalletAmountAction
{

    public function __invoke()
    {
        $transaction = Transaction::where('user_id' , Auth::id())->get();
        $positiveTransactionAmount = $transaction->whereIn('type' ,['refund' , 'deposit'])
            ->pluck('amount')->sum();
        $negativeTransactionAmount = $transaction->whereIn('type' ,['buy' , 'withdraw'])
            ->pluck('amount')->sum();

        return $positiveTransactionAmount - $negativeTransactionAmount;
    }
}
