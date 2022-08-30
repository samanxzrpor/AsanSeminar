<?php

namespace Domain\DiscountCode\Actions;

use Domain\DiscountCode\Models\DiscountCode;

class DiscountCodeApplyToPriceAction
{

    public function __invoke(DiscountCode $discountCode , $price)
    {
        if ($discountCode->discount_type == 'amount')
            $discountedPrice = $price - $discountCode->amount;

        if ($discountCode->discount_type == 'percentage')
            $discountedPrice = $price - ($price * ($discountCode->amount/100));

        return $discountedPrice;
    }
}
