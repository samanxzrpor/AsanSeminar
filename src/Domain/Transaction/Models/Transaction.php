<?php

namespace Domain\Transaction\Models;

use Domain\Order\Models\Order;
use Domain\User\Models\User;

class Transaction extends \Illuminate\Database\Eloquent\Model
{

    public $fillable = [
        'amount' ,
        'description' ,
        'register_date' ,
        'status' ,
        'type' ,
        'user_id' ,
    ];

    public function order()
    {
        return $this->hasOne(Order::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
