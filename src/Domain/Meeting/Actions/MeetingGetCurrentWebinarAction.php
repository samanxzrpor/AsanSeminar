<?php

namespace Domain\Meeting\Actions;

use Domain\Meeting\Models\Meeting;

class MeetingGetCurrentWebinarAction
{

    public function __invoke($webinar)
    {
        $meetings = Meeting::where('webinar_id', $webinar->id)->get();

        return $meetings;
    }
}
