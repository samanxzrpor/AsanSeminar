<?php

namespace Domain\Order\Actions;

use Domain\Order\Models\Order;

class OrderStoreAction
{

    public function __invoke(array $data)
    {
        $newOrder = Order::create([
            'user_id' => $data['user']->id,
            'webinar_id' => $data['webinar']->id ,
            'discount_code_id' => $data['discount_code']->id ?? null,
            'status' => 'doing'
        ]);

        return $newOrder;
    }
}
