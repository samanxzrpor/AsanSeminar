<?php

namespace Domain\Meeting\Actions;

use Domain\Meeting\Models\Meeting;

class MeetingStartAction
{

    public function __invoke(Meeting $meeting)
    {
        $meeting->update([
            'start_date' => now()->toDateTimeString(),
            'status' => 'performing'
        ]);
    }
}
