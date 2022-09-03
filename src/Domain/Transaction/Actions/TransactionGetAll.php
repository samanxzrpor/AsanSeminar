<?php

namespace Domain\Transaction\Actions;

use Domain\Transaction\Models\Transaction;

class TransactionGetAll
{

    public function __invoke()
    {
        $transaction = Transaction::orderBy('register_date', 'desc')->get();

        return $transaction;
    }
}
