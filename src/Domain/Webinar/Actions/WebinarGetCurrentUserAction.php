<?php

namespace Domain\Webinar\Actions;

use Domain\Order\Models\Order;
use Domain\User\Models\User;
use Domain\Webinar\Models\Webinar;
use Illuminate\Support\Facades\Auth;

class WebinarGetCurrentUserAction
{
    public function __invoke()
    {
        $usersWebinars = Webinar::orderByDesc(
            Order::whereColumn('webinar_id' , 'webinars.id')
            ->orderByDesc('created_at')
        );
        return $usersWebinars;
    }
}
