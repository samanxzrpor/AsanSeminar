<?php

namespace Domain\Transaction\Actions;

use Domain\Transaction\Models\Transaction;

class TransactionStoreAction
{
    public function __invoke(array $data ,string $type)
    {
        $transaction = Transaction::create([
            'amount' => $data['amount'],
            'description' => $data['description'] ?? 'Description ... ',
            'type' => $type,
            'register_date' => $data['register_date'],
            'status' => $data['status'],
        ]);
        return $transaction;
    }
}
