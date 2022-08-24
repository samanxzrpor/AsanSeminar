<?php

namespace Domain\Webinar\DataTransferObjects;

use Core\DataTransferObjects\DataTransferObject;
use Core\Traits\JalaliDate;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class WebinarData extends DataTransferObject
{
    use JalaliDate;

    public string $title;

    public string $description;

    public int $price;

    public int $percentage_discount;

    public bool $can_use_discount;

    public bool $show_all;

    public int $max_capacity;

    public string $event_date;

    public string $status;

    public int $user_id;


    public static function fromRequest($request)
    {
        $parent = Parent::fromRequest($request);
        if ($request->method() == 'PUT')
            return $parent;

        $changedData = Arr::set($parent , 'event_date', JalaliDate::changeToCarbon(
            $request->get('event_date') . ' 00:00:00'
        ));

        return $changedData;
    }
}
