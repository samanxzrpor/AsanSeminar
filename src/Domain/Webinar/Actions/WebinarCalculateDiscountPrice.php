<?php

namespace Domain\Webinar\Actions;

class WebinarCalculateDiscountPrice
{

    public function __invoke(int $price , int $percentageDiscount)
    {
        $discountAmount = $price * ($percentageDiscount/100);
        $discountedPrice = $price - $discountAmount;

        return $discountedPrice;
    }
}
