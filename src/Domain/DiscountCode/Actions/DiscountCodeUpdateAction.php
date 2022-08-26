<?php

namespace Domain\DiscountCode\Actions;

use Domain\DiscountCode\Models\DiscountCode;

class DiscountCodeUpdateAction
{

    public function __invoke(DiscountCode $discountCode,array $data)
    {
        $DiscountCode = $discountCode->update([
            'title' => $data['title'],
            'discount_code' => $data['discount_code'],
            'amount' => $data['amount'],
            'start_date' => $data['start_date'],
            'expire_date' => $data['expire_date'],
            'discount_code_count' => $data['discount_code_count'],
            'discount_type' => $data['discount_type'],
            'webinar_id' => $data['webinar_id'],
            'is_active' => $data['is_active'] ? true : false,
        ]);
        return $DiscountCode;
    }
}
