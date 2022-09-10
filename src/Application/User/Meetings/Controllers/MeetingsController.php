<?php

namespace Application\User\Meetings\Controllers;

use Core\Http\Controllers\Controller;
use Domain\Meeting\Actions\MeetingGetCurrentWebinarAction;
use Domain\Webinar\Models\Webinar;

class MeetingsController extends  Controller
{

    public function index(Webinar $webinar)
    {
        $meetings = (new MeetingGetCurrentWebinarAction())($webinar);

        return view('user.meetings' , [
            'meetings' => $meetings ,
            'webinar' => $webinar
        ]);
    }
}
