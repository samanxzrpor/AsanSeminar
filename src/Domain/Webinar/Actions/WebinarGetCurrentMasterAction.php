<?php

namespace Domain\Webinar\Actions;

use Domain\Webinar\Models\Webinar;
use Illuminate\Support\Facades\Auth;

class WebinarGetCurrentMasterAction
{
    public function __invoke()
    {
        $usersWebinars = Webinar::where('master_id', Auth::id())->get();

        return $usersWebinars;
    }
}
