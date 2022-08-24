<?php

namespace Domain\Webinar\Actions;

use Domain\Webinar\Models\Webinar;

class WebinarGetByStatusAction
{

    public function __invoke(array $status)
    {
        $webinars = Webinar::whereIn('status', $status)->get();
        return $webinars;
    }
}
