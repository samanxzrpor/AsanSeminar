<?php

namespace Domain\DiscountCode\Models;

use Domain\User\Models\User;
use Illuminate\Database\Eloquent\Model;

class DiscountCode extends Model
{
    public $table = 'discount_code';


    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function disableDiscountCode()
    {
        $this->update([
            'is_active' => false,
        ]);
    }
}
