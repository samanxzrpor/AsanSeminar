<?php

namespace Domain\Meeting\Actions;

use Domain\Meeting\Models\Meeting;

class MeetingStartAction
{

    public function __invoke(Meeting $meeting , string $status)
    {
        $meeting->update([
            'start_date' => now()->toDateTimeString(),
            'status' => $status
        ]);
    }
}
