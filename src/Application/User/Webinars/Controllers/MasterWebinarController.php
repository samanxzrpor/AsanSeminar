<?php

namespace Application\User\Webinars\Controllers;

use Domain\Webinar\Actions\WebinarGetCurrentMasterAction;

class MasterWebinarController extends \Core\Http\Controllers\Controller
{

    public function index()
    {
        $mastersWebinars = (new WebinarGetCurrentMasterAction())();
        return view('user.webinars' , [
            'webinars' => $mastersWebinars,
            'page' => 'master'
        ]);
    }
}
