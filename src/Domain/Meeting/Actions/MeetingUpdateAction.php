<?php

namespace Domain\Meeting\Actions;

use Domain\Meeting\Models\Meeting;
use Domain\Webinar\Models\Webinar;

class MeetingUpdateAction
{

    public function __invoke(array $data ,Webinar $webinar ,Meeting $meeting)
    {
        $updatedMeeting = $meeting->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'meeting_duration' => $data['meeting_duration'],
            'event_date' => $data['event_date'],
            'max_capacity' => $data['max_capacity'],
            'has_record' => $data['has_record'] ? true : false,
            'webinar_id' => $webinar->id,
        ]);
        return $meeting;
    }
}
