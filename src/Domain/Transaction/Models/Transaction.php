<?php

namespace Domain\Transaction\Models;

class Transaction extends \Illuminate\Database\Eloquent\Model
{

    public $fillable = [
        'amount' ,
        'description' ,
        'register_date' ,
        'status' ,
        'type' ,
    ];
}
