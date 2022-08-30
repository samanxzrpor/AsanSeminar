<?php

namespace Domain\Order\Actions;

use Domain\Order\Models\Order;

class OrderUpdateAction
{
    public function __invoke(Order $order , $status , $transaction = null )
    {
        $order->update([
            'status' => $status,
            'transaction_id' => $transaction->id ?? null,
        ]);
    }
}
