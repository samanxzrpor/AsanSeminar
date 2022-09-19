<?php

namespace Domain\DiscountCode\Rules;

use Illuminate\Contracts\Validation\Rule;

class BeforeStartDateLimitRule implements Rule
{

    public function passes($attribute , $value )
    {
        if ($value/ 1000 >= now()->timestamp)
            return true;
    }

    public function message()
    {
        return 'زمان شروع مربوط به گذشته مبیاشد.';
    }
}
