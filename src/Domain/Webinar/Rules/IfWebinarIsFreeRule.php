<?php

namespace Domain\Webinar\Rules;

use Illuminate\Contracts\Validation\Rule;

class IfWebinarIsFreeRule implements Rule
{
    public $price ;

    public function __construct($price)
    {
        $this->price = $price;
    }

    public function passes($attribute , $value )
    {

        if ($this->price == 0 && $value > 0)
            return false;

        return true;
    }

    public function message()
    {
        return 'If The Webinar is Free , You Should Set Your :attribute equal to 0';
    }
}
