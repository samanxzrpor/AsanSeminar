<?php

namespace Application\Admin\Orders\Controllers;

use Domain\Order\Actions\OrderGetAllAction;

class OrdersController extends \Core\Http\Controllers\Controller
{

    public function index()
    {
        $orders = (new OrderGetAllAction())();

        return view('admin.orders.list' , [
            'orders' => $orders
        ]);
    }
}
