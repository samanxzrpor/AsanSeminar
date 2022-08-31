<?php

namespace Domain\Webinar\Actions;

use Domain\Order\Models\Order;
use Domain\User\Models\User;
use Domain\Webinar\Models\Webinar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WebinarGetCurrentUserAction
{
    public function __invoke()
    {
//        $user = Auth::user();
//        $webinars = DB::table('webinars')
//            ->rightJoin('orders', 'webinars.id', '=', 'orders.webinar_id')
//            ->select('webinars.*')
//            ->where('user_id' , $user->id)
//            ->get();
        $webinars = Webinar::query()
            ->getUsersWebinarFromOrder()
            ->get();

        return $webinars;
    }
}
