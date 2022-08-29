<?php

namespace Domain\Meeting\Actions;

use Domain\Meeting\Models\Meeting;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class MeetingFinishAction
{

    public function __invoke(Meeting $meeting )
    {
        $meeting->update([
            'status' => 'finished'
        ]);
    }
}
