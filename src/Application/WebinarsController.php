<?php

namespace Application;

use Domain\User\Models\User;
use Domain\Webinar\Actions\WebinarGetCanShowAllAction;
use Domain\Webinar\Models\Webinar;
use Illuminate\Support\Facades\Auth;

class WebinarsController extends \Core\Http\Controllers\Controller
{

    public function index()
    {
        $webinars = (new WebinarGetCanShowAllAction())();
        $currentUser = User::find(Auth::id());

        return view('home' , [
            'webinars' => $webinars,
            'user' => $currentUser
        ]);
    }

    public function show(Webinar $webinar)
    {

    }

}
