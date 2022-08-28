<?php

namespace Application\Accountant\Webinars\Controllers;

use Domain\Webinar\Actions\WebinarGetAllAction;

class WebinarController extends \Core\Http\Controllers\Controller
{

    public function index()
    {
        $webinars = (new WebinarGetAllAction())();

        return  view('admin.webinars.list' , ['webinars' => $webinars]);
    }
}
