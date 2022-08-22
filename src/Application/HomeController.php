<?php

namespace Application;

use Domain\Webinar\Actions\WebinarGetAllAction;

class HomeController extends \Core\Http\Controllers\Controller
{

    public function index()
    {
        $webinars = (new WebinarGetAllAction());

        return view('home' , ['webinars' => $webinars]);
    }
}
