<?php

namespace Application\Admin\DiscountCodes\Controllers;

use Domain\DiscountCode\Actions\DiscountCodeGetAll;

class DiscountCodesController extends \Core\Http\Controllers\Controller
{

    public function index()
    {
        $discountCodes = (new DiscountCodeGetAll())();
        return view('admin.discount_codes.list' , ['discount_codes' => $discountCodes]);
    }
}
