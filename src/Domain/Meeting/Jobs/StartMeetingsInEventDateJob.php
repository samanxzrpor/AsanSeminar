<?php

namespace Domain\Meeting\Jobs;

use Domain\Meeting\Actions\MeetingStartAction;
use Domain\Meeting\Models\Meeting;
use Domain\Webinar\Models\Webinar;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StartMeetingsInEventDateJob implements ShouldQueue
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
        $pendingWebinars = Meeting::where('status' , 'pending')->get();
        foreach ($pendingWebinars as $meeting) {
            if ($meeting->event_date === now()->toDateTimeString()) {
                (new MeetingStartAction())($meetings);
            }
        }
    }
}
