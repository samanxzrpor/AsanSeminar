<?php

namespace Domain\DiscountCode\Rules;

use Illuminate\Contracts\Validation\Rule;

class SetLimitOfAmountByTypeRule implements Rule
{
    public string $type ;

    public function __construct($type)
    {
        $this->type = $type;
    }

    public function passes($attribute , $value )
    {
        return $this->type == 'percentage' && $value < 100;
    }

    public function message()
    {
        return 'if The :attribute is Percentage , Should Set Your Discount Amount Between 0 and 100';
    }
}
