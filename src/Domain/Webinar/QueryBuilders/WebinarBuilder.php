<?php

namespace Domain\Webinar\QueryBuilders;

use Illuminate\Support\Facades\Auth;

class WebinarBuilder extends \Illuminate\Database\Eloquent\Builder
{

    public function getUsersWebinarFromOrder() : self
    {
        return $this->rightJoin('orders', 'webinars.id', '=', 'orders.webinar_id')
            ->select('webinars.*')
            ->where('user_id' , Auth::id());
    }
}
