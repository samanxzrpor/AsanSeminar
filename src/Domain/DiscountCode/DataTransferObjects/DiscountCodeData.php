<?php

namespace Domain\DiscountCode\DataTransferObjects;

use Core\Traits\JalaliDate;
use Illuminate\Support\Arr;

class DiscountCodeData
{

//    public string $title;
//
//    public string $discount_code;

//    public string $amount;
//
//    public string $discount_code_count;
//
//    public string $discount_type;
//
//    public string $start_date;
//
//    public string $expire_date;
//
//    public string $webinar_id;
//
//    public string $is_active;
//

    public function __construct(
        public string $title,
        public string $discount_code,
        public string $amount,
        public string $discount_code_count,
        public string $discount_type,
        public string $start_date,
        public string $expire_date,
        public string $webinar_id,
        public string $is_active,
    )
    {
    }

    public static function fromRequest($request)
    {
        $data = Parent::fromRequest($request);
        Arr::set($data , 'start_date', JalaliDate::changeToCarbon(
            $request->get('start_date')
        ));
        Arr::set($data , 'expire_date', JalaliDate::changeToCarbon(
            $request->get('expire_date')
        ));

        return $data;
    }
}
