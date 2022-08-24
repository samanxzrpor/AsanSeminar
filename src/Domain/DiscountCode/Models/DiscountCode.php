<?php

namespace Domain\DiscountCode\Models;

use Database\Factories\DiscountCodeFactory;
use Domain\Orders\Models\Order;
use Domain\User\Models\User;
use Domain\Webinar\Models\Webinar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountCode extends Model
{
    use hasFactory;

    public $table = 'discount_codes';

    public $guarded = ['id'];


    public static function newFactory()
    {
        return DiscountCodeFactory::new();
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function webinar()
    {
        return $this->belongsTo(Webinar::class);
    }

    public function disableDiscountCode()
    {
        $this->update([
            'is_active' => false,
        ]);
    }
}
