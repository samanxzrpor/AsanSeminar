<?php

namespace Domain\Meeting\Actions;

use Domain\Meeting\Models\Meeting;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class MeetingFinishAction
{

    public function __invoke(Meeting $meeting )
    {
        $meetingDurationHour = Str::before($meeting->meeting_duration , '.');
        $meetingDurationMin = Str::after($meeting->meeting_duration , '.');
        $finishTime = Carbon::make($meeting->start_time)
            ->addHour($meetingDurationHour)
            ->addMinute($meetingDurationMin);

        if ($finishTime == now()) {
            $meeting->update([
                'status' => 'finished'
            ]);
        }
    }
}
