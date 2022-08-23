<?php

namespace Domain\Webinar\Actions;

use Domain\Webinar\DataTransferObjects\WebinarData;
use Domain\Webinar\Models\Webinar;
use Illuminate\Support\Facades\Auth;

class WebinarStoreAction
{

    public function __invoke(array $data)
    {
        $newWebinar = Webinar::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'price' => $data['price'],
            'percentage_discount' => $data['percentage_discount'] ?? 0,
            'can_use_discount' => $data['can_use_discount'] ?? false,
            'show_all' => $data['show_all'] ?? false,
            'max_capacity' => $data['max_capacity'],
            'event_date' => $data['event_date'],
            'user_id' => Auth::id(),
        ]);
        return $newWebinar;
    }
}
