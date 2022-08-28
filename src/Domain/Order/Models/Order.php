<?php

namespace Domain\Order\Models;

use Database\Factories\OrderFactory;
use Domain\DiscountCode\Models\DiscountCode;
use Domain\User\Models\User;
use Domain\Webinar\Models\Webinar;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends \Illuminate\Database\Eloquent\Model
{
    use hasFactory;

    public static function newFactory()
    {
        return OrderFactory::new();
    }

    public function webinar()
    {
        return $this->belongsTo(Webinar::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function discountCode()
    {
        return $this->hasOne(DiscountCode::class);
    }
}
