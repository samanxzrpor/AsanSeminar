<?php

namespace Domain\DiscountCode\Actions;

use Domain\DiscountCode\Models\DiscountCode;
use Domain\Order\Models\Order;
use Domain\Webinar\Models\Webinar;

class DiscountCodeCheckAction
{

    public function __invoke(Webinar $webinar, string $code)
    {
        $discountCode = DiscountCode::where('discount_code', $code)->first();
        $successOrders = Order::where('discount_code_id', $discountCode->id)
            ->where('status' , 'paid')
            ->get()
            ->count();

        if (!$discountCode || $discountCode->webinar->id !== $webinar->id)
            return 'Discount Code Not Exist';

        if ($discountCode->expire_date < now()->toDateTimeString())
            return 'Discount Code expired';

        if ($discountCode->discount_code_count <= $successOrders)
            return 'Capacity of Discount Code finished';

    }
}
