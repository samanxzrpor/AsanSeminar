<?php

namespace Domain\Webinar\Actions;

use Domain\Webinar\DataTransferObjects\WebinarData;
use Domain\Webinar\Models\Webinar;
use Illuminate\Support\Collection;

class WebinarGetCanShowAllAction
{

    public function __invoke()
    {
        return Webinar::where('show_all', true)->orderBy('created_at', 'desc')->paginate(20);
    }
}
