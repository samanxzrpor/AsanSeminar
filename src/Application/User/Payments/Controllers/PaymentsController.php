<?php

namespace Application\User\Payments\Controllers;

use Domain\User\Models\User;
use Domain\Webinar\Actions\WebinarGetCurrentUserAction;
use Domain\Webinar\Models\Webinar;
use Illuminate\Support\Facades\Auth;

class PaymentsController extends \Core\Http\Controllers\Controller
{

    public function index()
    {
        $usersWebinars = (new WebinarGetCurrentUserAction())();
        return view('user.webinars' , [
            'webinars' => $usersWebinars
        ]);
    }
}
