<?php

namespace Application\Checkout\Controllers;

use Domain\DiscountCode\Models\DiscountCode;
use Domain\User\Models\User;
use Domain\Webinar\Models\Webinar;
use Illuminate\Http\Request;

class CheckoutController extends \Core\Http\Controllers\Controller
{

    public function index()
    {
        $webinar = Webinar::find(request()->get('webinar'));
        $user = User::find(request()->get('user'));

        return view('user.checkout' , [
            'webinar' => $webinar ,
            'user' => $user
        ]);
    }

    public function applyCode(Request $request , Webinar $webinar)
    {
        dd($request->all());
//        $code = $request->get('code');
//        $discountCode = DiscountCode::where('discount_code', $code)->first();
//
//        if (!$discountCode || $discountCode->webinar->id !== $webinar->id)
//            return back()->with('failed' , 'کد تخفیف معتبر نمیباشد .');
//
//        $price = $webinar->price - ($webinar->price * ($webinar->percentage_discount / 100));
//
//        if ($discountCode->discount_type == 'amount')
//            $discountedPrice = $price - $discountCode->amount;
//
//        if ($discountCode->discount_type == 'percentage')
//            $discountedPrice = $price - ($price * ($discountCode->amount/100));
//
//        return  $discountedPrice;
    }
}
