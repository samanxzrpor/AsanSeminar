<?php

namespace Application\Checkout\Controllers;

use Application\Transaction\Controllers\TransactionController;
use Domain\DiscountCode\Models\DiscountCode;
use Domain\Order\Actions\OrderStoreAction;
use Domain\Order\DataTransferObjects\OrderData;
use Domain\User\Models\User;
use Domain\Webinar\Models\Webinar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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


    public function buyWebinar(Request $request)
    {
        $code = $request->get('discount-code');
        $webinar = Webinar::find(request()->get('webinar'));
        $user = User::find($request->get('user'));

        try {
            $webinarPrice = $this->setWebinarsDiscountePrice($webinar);
            $discountedPrice = $this->checkDicountCode($webinar, $code , $webinarPrice);
            $discount = DiscountCode::where('discount_code' , $code)->first();

            $order = $this->storeOrder($webinar, $user , $discount);

            $transactionData = [
                'amount' => $discountedPrice,
                'description' => 'Description ... ',
                'status' => 'success',
            ];
            if ($request->has('wallet'))
                app(TransactionController::class)->store(collect(array_merge($transactionData , ['type' => 'buy'])));
            if ($request->has('direct-deposit'))
                return redirect()->route('shaparak' , ['amount' => $discountedPrice , 'type' => 'deposit']);

        } catch (\Exception $e) {
            Log::error('Buy Webinar Exception: ', $e->getMessage());
        }

    }


    private function storeOrder(Webinar $webinar, User $user, DiscountCode $discountCode)
    {
        $orderData = OrderData::fromRequest([
            'webinar_id' => $webinar->id,
            'user_id' => $user->id,
            'discount_code_id' => $discountCode->id
        ]);
        $order = (new OrderStoreAction())($orderData);
    }


    public function applyCode(Request $request , Webinar $webinar)
    {
        $code = $request->get('code');
        $price = $this->setWebinarsDiscountePrice($webinar);
        $discountedPrice = $this->checkDicountCode($webinar, $code , $price);
        return json_encode($discountedPrice);
    }


    private function setWebinarsDiscountePrice(Webinar $webinar)
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

    private function updateOrder($request)
    {
    }
}
