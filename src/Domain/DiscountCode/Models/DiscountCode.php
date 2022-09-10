<?php

namespace Domain\DiscountCode\Models;

use Database\Factories\DiscountCodeFactory;
use Domain\Order\Models\Order;
use Domain\User\Models\User;
use Domain\Webinar\Models\Webinar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountCode extends Model
{
    use hasFactory;

    public $table = 'discount_codes';

    public $fillable = [
        'title' ,
        'discount_code' ,
        'amount' ,
        'is_active' ,
        'start_date' ,
        'expire_date' ,
        'discount_code_count',
        'discount_type' ,
        'webinar_id'
    ];


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
        return $this->hasMany(Order::class);
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
