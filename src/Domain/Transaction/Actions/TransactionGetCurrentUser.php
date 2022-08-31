<?php

namespace Domain\Transaction\Actions;

use Domain\Transaction\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionGetCurrentUser
{

    public function __invoke()
    {
        $transaction = Transaction::where('user_id', Auth::id())->get();
        return $transaction;
    }
}
