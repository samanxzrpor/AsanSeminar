<?php

namespace Domain\Orders\Models;

use Domain\User\Models\User;
use Domain\Webinar\Models\Webinar;

class Order extends \Illuminate\Database\Eloquent\Model
{

    public function webinar()
    {
        return $this->belongsTo(Webinar::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
