<?php

namespace Application;

use Domain\Webinar\Actions\WebinarGetAllAction;
use Domain\Webinar\Models\Webinar;

class WebinarsController extends \Core\Http\Controllers\Controller
{

    public function index()
    {
        $webinars = (new WebinarGetAllAction())();

        return view('home' , ['webinars' => $webinars]);
    }

    public function show(Webinar $webinar)
    {

    }

}
