<?php

namespace Application\Checkout\Controllers;

use Domain\User\Models\User;
use Domain\Webinar\Models\Webinar;

class CheckoutController extends \Core\Http\Controllers\Controller
{

    public function index()
    {
        $webinar = Webinar::find(request()->get('webinar'));
        $user = User::find(request()->get('user'));

        return view('user.checkout' , [
            'webinar' => $webinar ,
            'user' => $user
        ]);
    }
}
