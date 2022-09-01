<?php

namespace Application\User\Webinars\Controllers;

use Domain\Order\Models\Order;
use Domain\User\Models\User;
use Domain\Webinar\Actions\WebinarGetCurrentUserAction;
use Domain\Webinar\Models\Webinar;
use Illuminate\Support\Facades\Auth;

class WebinarController extends \Core\Http\Controllers\Controller
{

    public function index()
    {
        $usersWebinars = (new WebinarGetCurrentUserAction())();
        return view('user.webinars' , [
            'webinars' => $usersWebinars
        ]);
    }

    public function refund($user , $webinar)
    {
        $webinar = Webinar::find($webinar);
        $timeForRefund = Order::where(['user_id'=> $user , 'webinar_id' => $webinar->id])
            ->first()
            ->created_at
            ->addDays(5);
        if ($timeForRefund < now())
            return back()->with('failed' , 'مهلت عودت وجه و انصراف به اتمام رسیده');

        (new )
    }
}
