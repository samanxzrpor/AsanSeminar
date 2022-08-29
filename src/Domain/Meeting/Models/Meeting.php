<?php

namespace Domain\Meeting\Models;

use Database\Factories\MeetingFactory;
use Domain\Webinar\Models\Webinar;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Meeting extends \Illuminate\Database\Eloquent\Model
{
    use hasFactory;

    public $fillable = [
        'title' ,
        'description' ,
        'start_date' ,
        'event_date' ,
        'has_record' ,
        'max_capacity' ,
        'meeting_duration',
        'status' ,
        'webinar_id'
    ];

    protected static function newFactory(){
        return MeetingFactory::new();
    }

    public function webinar()
    {
        return $this->belongsTo(Webinar::class);
    }

}
