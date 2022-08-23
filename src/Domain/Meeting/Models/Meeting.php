<?php

namespace Domain\Meeting\Models;

use Database\Factories\MeetingFactory;
use Domain\Webinar\Models\Webinar;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Meeting extends \Illuminate\Database\Eloquent\Model
{
    use hasFactory;

    protected static function newFactory(){
        return MeetingFactory::new();
    }

    public function webinar()
    {
        return $this->belongsTo(Webinar::class);
    }

}
