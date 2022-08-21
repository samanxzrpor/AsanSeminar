<?php

namespace Application\Admin\Webinars\Controllers;

use Application\Admin\Webinars\ViewModels\WebinarFormViewModel;
use Domain\User\Models\User;
use Domain\Webinar\Actions\WebinarGetAllAction;
use Illuminate\Support\Facades\Auth;

class WebinarController
{

    public function index()
    {
        $webinars = (new WebinarGetAllAction())();

        return  view('webinars.webinars');
    }

    public function create()
    {
        $currentUser = User::find(Auth::user());

        return view('webinars.create-webinar' , compact($viewData));
    }
}
