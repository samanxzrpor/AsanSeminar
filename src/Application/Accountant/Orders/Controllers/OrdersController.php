<?php

namespace Application\Accountant\Orders\Controllers;

use Application\Admin\Users\Requests\UpdateUserRequest;
use Domain\Order\Actions\OrderGetAllAction;
use Domain\User\Actions\UserGetAllAction;
use Domain\User\Actions\UserUpdateAction;
use Domain\User\DataTransferObjects\UserData;
use Domain\User\Models\User;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

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
