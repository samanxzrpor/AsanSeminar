<?php

namespace Application\User\Webinars\Controllers;

use Domain\User\Models\User;
use Domain\Webinar\Actions\WebinarGetCurrentUserAction;
use Domain\Webinar\Models\Webinar;
use Illuminate\Support\Facades\Auth;

class WebinarController extends \Core\Http\Controllers\Controller
{

    public function index()
    {
        $usersWebinars = (new WebinarGetCurrentUserAction())();
        dd($usersWebinars);
    }
}
