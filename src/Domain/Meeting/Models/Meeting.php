<?php

namespace Domain\Meeting\Models;

use Domain\Webinar\Models\Webinar;

class Meeting extends \Illuminate\Database\Eloquent\Model
{

    public function webinar()
    {
        return $this->belongsTo(Webinar::class);
    }

}
