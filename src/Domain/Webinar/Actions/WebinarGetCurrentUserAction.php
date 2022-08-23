<?php

namespace Domain\Webinar\Actions;

use Domain\Webinar\Models\Webinar;
use Illuminate\Support\Facades\Auth;

class WebinarGetCurrentUserAction
{
    public function __invoke()
    {
        $usersWebinars = Webinar::where('user_id', Auth::id())->get();

        return $usersWebinars;
    }
}
