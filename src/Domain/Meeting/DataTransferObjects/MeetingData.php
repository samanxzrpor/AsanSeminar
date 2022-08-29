<?php

namespace Domain\Meeting\DataTransferObjects;

use Core\Traits\JalaliDate;
use Illuminate\Support\Arr;

class MeetingData extends \Core\DataTransferObjects\DataTransferObject
{
    use JalaliDate;


    public string $title;

    public string $description;

    public int $max_capacity;

    public int $meeting_duration;

    public string $has_record;

    public string $event_date;

    public int $webinar_id;


    public static function fromRequest($request)
    {
        $parent = Parent::fromRequest($request);
        $changedData = Arr::set($parent , 'event_date', JalaliDate::changeToCarbon(
            $request->get('event_date')
        ));

        return $changedData;
    }
}
