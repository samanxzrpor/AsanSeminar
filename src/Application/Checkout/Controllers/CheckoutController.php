<?php

namespace Application\Checkout\Controllers;

use Application\Transaction\Controllers\TransactionController;
use Domain\DiscountCode\Models\DiscountCode;
use Domain\Order\Actions\OrderStoreAction;
use Domain\Order\DataTransferObjects\OrderData;
use Domain\User\Models\User;
use Domain\Webinar\Models\Webinar;
use Illuminate\Http\Request;

class CheckoutController extends \Core\Http\Controllers\Controller
{

    public function index()
    {
        $webinar = Webinar::find(request()->get('webinar'));
        $user = User::find(request()->get('user'));
        $webinarDiscountPrice = $webinar->price - ($webinar->price * ($webinar->percentage_discount/100));
        return view('user.checkout' , [
            'webinar' => $webinar ,
            'user' => $user ,
            'discount_price' => $webinarDiscountPrice
        ]);
    }


    public function buyWebinar(Request $request , Webinar $webinar , User $user , string $code)
    {
        $webinarPrice = $this->determineDiscountedPrice($webinar);
        $discountedPrice = $this->checkDicountCode($webinar, $code , $webinarPrice);
        $discount = DiscountCode::where('code' , $code)->first();
        $this->storeOrder($webinar, $user , $discount);
        if ($request->has('wallet'))
            app(TransactionController::class)->store();
        if ($request->has('direct-deposit'))
            $type = 'deposit';
        $type =$this->ditermineTransactionType($request);

        return redirect()->route('shaparak' , [
            'amount' => $discountedPrice ,
            'type' => $type
        ]);
    }


    private function storeOrder(Webinar $webinar, User $user, DiscountCode $discountCode)
    {
        $orderData = OrderData::fromRequest([
            'webinar_id' => $webinar->id,
            'user_id' => $user->id,
            'Discount_code_id' => $discountCode->id
        ]);
        $order = (new OrderStoreAction())($orderData);
    }


    private function ditermineTransactionType($request)
    {
        if ($request->has('wallet'))
            $type = 'buy';
        if ($request->has('direct-deposit'))
            $type = 'deposit';

        return $type;
    }

    public function applyCode(Request $request , Webinar $webinar)
    {
        $code = $request->get('code');
        $price = $this->determineDiscountedPrice($webinar);
        $discountedPrice = $this->checkDicountCode($webinar, $code , $price);
        return json_encode($discountedPrice);
    }


    private function determineDiscountedPrice(Webinar $webinar)
    {
        $webinarDiscountPrice = $webinar->price - ($webinar->price * ($webinar->percentage_discount/100));
        return $webinarDiscountPrice;
    }


    private function checkDicountCode(Webinar $webinar , string $code , int $price) {
        $discountCode = DiscountCode::where('discount_code', $code)->first();

        if (!$discountCode || $discountCode->webinar->id !== $webinar->id)
            return json_encode('Discount Code Not Exist');

        if ($discountCode->discount_type == 'amount')
            $discountedPrice = $price - $discountCode->amount;

        if ($discountCode->discount_type == 'percentage')
            $discountedPrice = $price - ($price * ($discountCode->amount/100));

        return $discountedPrice;
    }
}
