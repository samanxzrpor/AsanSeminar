<?php

namespace Application\User\Webinars\Controllers;

use Domain\Webinar\Actions\WebinarGetCurrentMasterAction;
use Illuminate\Support\Facades\Auth;

class MasterWebinarController extends \Core\Http\Controllers\Controller
{

    public function index()
    {
        $mastersWebinars = (new WebinarGetCurrentMasterAction())();
        return view('user.master_webinars' , [
            'webinars' => $mastersWebinars,
            'user' => Auth::user(),
            'page' => 'master'
        ]);
    }
}
