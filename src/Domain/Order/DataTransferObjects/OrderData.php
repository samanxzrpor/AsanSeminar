<?php

namespace Domain\Order\DataTransferObjects;

class OrderData extends \Core\DataTransferObjects\DataTransferObject
{

    public $webinar_id ;

    public $user_id ;

    public $discount_code_id ;


    public static function fromRequest($request)
    {
        $data = parent::fromRequest($request);

        return $data;
    }
}