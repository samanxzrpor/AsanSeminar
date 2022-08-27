<?php

namespace Domain\Transaction\DataTransferObjects;

use Core\Traits\JalaliDate;
use Illuminate\Support\Arr;

class TransactionData extends \Core\DataTransferObjects\DataTransferObject
{

    public $amount ;

    public $description ;

    public $status ;

    public static function fromRequest($request)
    {
        $data = parent::fromRequest($request);
        if ($request->has('success'))
            Arr::set($data , 'status', 'success');

        if ($request->has('failed'))
            Arr::set($data , 'status', 'failed');

        Arr::set($data , 'register_date', now()->toDateTimeString());
        return $data;
    }
}
