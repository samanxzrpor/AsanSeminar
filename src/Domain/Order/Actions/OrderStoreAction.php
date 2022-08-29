<?php

namespace Domain\Order\Actions;

use Domain\Order\Models\Order;

class OrderStoreAction
{

    public function __invoke(array $data)
    {
        $newOrder = Order::create([
            'user_id' => $data['user_id'],
            'webinar_id' => $data['webinar_id'] ,
            'discount_code_id' => $data['discount_code_id'] ?? null
        ]);

        return $newOrder;
    }
}
