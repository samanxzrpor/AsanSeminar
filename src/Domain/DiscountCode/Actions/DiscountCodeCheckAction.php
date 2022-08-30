<?php

namespace Domain\DiscountCode\Actions;

use Domain\DiscountCode\Models\DiscountCode;
use Domain\Webinar\Models\Webinar;

class DiscountCodeCheckAction
{

    public function __invoke(Webinar $webinar, string $code)
    {
        $discountCode = DiscountCode::where('discount_code', $code)->first();

        if (!$discountCode || $discountCode->webinar->id !== $webinar->id)
            return 'Discount Code Not Exist';

        if ($discountCode->expire_date < now()->toDateTimeString())
            return 'Discount Code expired';

    }
}
