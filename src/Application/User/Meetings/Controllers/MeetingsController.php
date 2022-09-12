<?php

namespace Application\User\Meetings\Controllers;

use Core\Http\Controllers\Controller;
use Domain\Meeting\Actions\MeetingGetCurrentWebinarAction;
use Domain\User\Models\User;
use Domain\Webinar\Models\Webinar;

class MeetingsController extends  Controller
{

    public function index(User $user , Webinar $webinar)
    {
        $meetings = (new MeetingGetCurrentWebinarAction())($webinar);

        return view('user.meetings' , [
            'meetings' => $meetings ,
            'webinar' => $webinar
        ]);
    }
}
