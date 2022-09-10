<?php

namespace Domain\Transaction\Actions;

use Domain\Transaction\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionStoreAction
{
    public function __invoke(array $data ,string $type)
    {
        $transaction = Transaction::create([
            'user_id' => Auth::user()->id,
            'amount' => $data['amount'],
            'description' => $data['description'] ?? 'Description ... ',
            'type' => $type,
            'register_date' => $data['register_date'],
            'status' => $data['status'],
        ]);
        return $transaction;
    }
}
