<?php

namespace Domain\Order\Actions;

use Domain\Order\Models\Order;

class OrderGetAllAction
{

    public function __invoke()
    {
        $orders = Order::orderBy('created_at', 'desc')->get();
        return $orders;
    }
}
