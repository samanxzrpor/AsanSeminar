<?php

namespace Domain\Webinar\Actions;

use Domain\Webinar\DataTransferObjects\WebinarData;
use Domain\Webinar\Models\Webinar;
use Illuminate\Support\Collection;

class WebinarGetAllAction
{

    public function __invoke() : Collection
    {
        return Webinar::all();
    }
}
