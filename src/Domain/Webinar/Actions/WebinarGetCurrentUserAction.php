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
        $webinars = Webinar::query()
            ->getUsersWebinarFromOrder()
            ->get();

        return $webinars;
    }
}
