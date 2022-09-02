<?php

namespace Domain\Webinar\QueryBuilders;

use Illuminate\Support\Facades\Auth;

class WebinarBuilder extends \Illuminate\Database\Eloquent\Builder
{

    public function getUsersWebinarFromOrder() : self
    {
        return $this->Join('orders', 'webinars.id', '=', 'orders.webinar_id')
            ->join('transactions' , 'transactions.id', '=', 'orders.transaction_id')
            ->where('orders.status' , 'paid')
            ->where('orders.user_id' , Auth::id())
            ->select('webinars.*' , 'transactions.amount');
    }
}
