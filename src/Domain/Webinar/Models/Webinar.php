<?php

namespace Domain\Webinar\Models;

use Database\Factories\WebinarFactory;
use Domain\DiscountCode\Models\DiscountCode;
use Domain\Meeting\Models\Meeting;
use Domain\Orders\Models\Order;
use Domain\User\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webinar extends Model
{
    use hasFactory;


    public $guarded = [
        'id'
    ];


    protected static function newFactory(){
        return WebinarFactory::new();
    }

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

    public function canUseDiscount()
    {
        return $this->can_use_discount == 'on' ? true : false;
    }
}
