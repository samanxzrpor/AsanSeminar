<?php

namespace Application\Checkout\Controllers;

use Domain\DiscountCode\Models\DiscountCode;
use Domain\User\Models\User;
use Domain\Webinar\Models\Webinar;

class OrderController extends \Core\Http\Controllers\Controller
{

    public function store(Webinar $webinar, User $user , DiscountCode $discountCode)
    {

    }
}
