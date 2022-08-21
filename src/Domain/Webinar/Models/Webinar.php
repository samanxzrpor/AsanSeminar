<?php

namespace Domain\Webinar\Models;

use Domain\DiscountCode\Models\DiscountCode;
use Domain\Meeting\Models\Meeting;
use Domain\Orders\Models\Order;
use Domain\User\Models\User;
use Illuminate\Database\Eloquent\Model;

class Webinar extends Model
{
    public $guarded = [
        'id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function discountCodes()
    {
        return $this->hasMany(DiscountCode::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function meetings()
    {
        return $this->hasMany(Meeting::class);
    }
}
