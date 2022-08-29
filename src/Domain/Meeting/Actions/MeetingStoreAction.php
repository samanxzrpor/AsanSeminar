<?php

namespace Domain\Meeting\Actions;

use Domain\Meeting\Models\Meeting;
use Domain\Webinar\Models\Webinar;

class MeetingStoreAction
{

    public function __invoke(array $data , Webinar $webinar)
    {
        $meeting = Meeting::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'meeting_duration' => $data['meeting_duration'],
            'event_date' => $data['event_date'],
            'max_capacity' => $data['max_capacity'],
            'has_record' => $data['has_record'] ? true : false,
            'webinar_id' => $data['webinar_id'],
        ]);
        return $meeting;
    }
}
