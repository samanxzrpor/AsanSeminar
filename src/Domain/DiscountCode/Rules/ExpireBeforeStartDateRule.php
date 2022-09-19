<?php

namespace Domain\DiscountCode\Rules;

use Illuminate\Contracts\Validation\Rule;

class ExpireBeforeStartDateRule implements Rule
{

    public $startDate;

    public function __construct($startDate)
    {
        $this->startDate = $startDate;
    }

    public function passes($attribute , $value )
    {
        if ($value >= $this->startDate)
            return true;
    }

    public function message()
    {
        return 'زمان شروع و پایان درست ست نشده اند.';
    }
}


