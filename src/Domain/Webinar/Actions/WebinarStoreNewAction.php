<?php

namespace Domain\Webinar\Actions;

use Domain\Webinar\DataTransferObjects\WebinarData;
use Domain\Webinar\Models\Webinar;

class WebinarStoreNewAction
{

    public function __invoke(WebinarData $data)
    {
        // TODO: Implement __invoke() method.
        $newWebinar = Webinar::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'price' => $data['price'],
            'discount' => $data['discount'],
            'can_use_discount' => $data['can_use_discount'],
            'show_all' => $data['show_all'],
            'max_capacity' => $data['max_capacity'],
            'event_date' => $data['event_date']
        ]);

    }
}
