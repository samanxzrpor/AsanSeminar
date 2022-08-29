<?php

namespace Domain\Meeting\Jobs;

use Domain\Meeting\Actions\MeetingFinishAction;
use Domain\Meeting\Actions\MeetingStartAction;
use Domain\Meeting\Models\Meeting;
use Domain\Webinar\Models\Webinar;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class FinishMeetingJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $performingWebinars = Meeting::where('status' , 'performing')->get();
        foreach ($performingWebinars as $meeting) {
            $meetingDurationHour = Str::before($meeting->meeting_duration , '.') ?? 0;
            $meetingDurationMin = Str::after(number_format($meeting->meeting_duration , 2) , '.') ?? 0;
            $carbonTime = Carbon::make($meeting->start_date);

            if ($meetingDurationHour)
                $carbonTime->addHour($meetingDurationHour);

            if ($meetingDurationMin)
                $carbonTime->addMinute($meetingDurationMin);

            if ($carbonTime <= now()) {
                (new MeetingFinishAction())($meeting);
            }
        }


    }
}
