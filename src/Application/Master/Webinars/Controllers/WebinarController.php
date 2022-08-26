<?php

namespace Application\Master\Webinars\Controllers;

use Domain\User\Models\User;
use Domain\Webinar\Actions\WebinarGetCurrentMasterAction;
use Domain\Webinar\Actions\WebinarGetCurrentUserAction;
use Domain\Webinar\Models\Webinar;
use Illuminate\Support\Facades\Auth;

class WebinarController extends \Core\Http\Controllers\Controller
{

    public function index()
    {
        $mastersWebinars = (new WebinarGetCurrentMasterAction())();
        return view('user.webinars' , [
            'webinars' => $mastersWebinars
        ]);
    }
}
