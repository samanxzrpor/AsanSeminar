<?php

namespace Domain\DiscountCode\Actions;

use Domain\DiscountCode\Models\DiscountCode;

class DiscountCodeGetAll
{

    public function __invoke()
    {
        $discountCodes = DiscountCode::orderBy('is_active','desc')->get();

        return $discountCodes;
    }
}
