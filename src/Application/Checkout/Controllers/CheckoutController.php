<?php

namespace Application\Checkout\Controllers;

use Application\Transaction\Controllers\TransactionController;
use Application\Transaction\Exceptions\InvalidTransactionException;
use Domain\DiscountCode\Actions\DiscountCodeApplyToPriceAction;
use Domain\DiscountCode\Actions\DiscountCodeCheckAction;
use Domain\DiscountCode\Models\DiscountCode;
use Domain\Order\Actions\OrderStoreAction;
use Domain\Order\Actions\OrderUpdateAction;
use Domain\Order\DataTransferObjects\OrderData;
use Domain\Transaction\Actions\TransactionStoreAction;
use Domain\Transaction\DataTransferObjects\TransactionData;
use Domain\User\Models\User;
use Domain\Wallet\Actions\WalletAmountAction;
use Domain\Webinar\Actions\WebinarGetCurrentUserAction;
use Domain\Webinar\Models\Webinar;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CheckoutController extends \Core\Http\Controllers\Controller
{

    public function index( Webinar $webinar)
    {
        $webinarDiscountPrice = $this->setWebinarsDiscountePrice($webinar);
        return view('user.checkout' , [
            'webinar' => $webinar ,
            'discount_price' => $webinarDiscountPrice
        ]);
    }


    public function buyWebinar(Request $request , Webinar $webinar)
    {
        $code = $request->get('discount-code');
        $user = Auth::user();
        $discount = DiscountCode::where('discount_code' , $code)->first();

        try {
            $webinarPrice = $this->setWebinarsDiscountePrice($webinar);
            if ($code)
                $discountedPrice = $this->checkDiscountCode($webinar, $code , $webinarPrice);

            $order = $this->storeOrder($webinar, $user , $discount);

            if ($request->has('wallet')){
                $transaction = $this->buyTransaction($webinarPrice , $discountedPrice);
                $this->updateOrder($order , 'paid', $transaction);
            }
            if ($request->has('direct-deposit')) {
                $amount = $discountedPrice ?? $webinarPrice;

                $data = [
                    'order_id' => $order->id,
                    'user_id' => $user->id,
                    'amount' => $amount ,
                    'type' => 'direct',
                    'callback' => route('transaction.store')
                ];

                $jwt = JWT::encode($data, 'SaMaN', 'HS256');

                return Http::withHeaders([
                    'X-CSRF-Token' => csrf_token(),
                    'Content-Type', 'application/x-www-form-urlencoded'
                ])->post('http://127.0.0.1:8001/api/shaparak', [
                    'token' =>$jwt
                ]);
            }

        } catch (\Exception $e) {
            Log::error('Transaction Exception: ' . $e->getMessage());
            return redirect()->route('user.webinars.index',Auth::user())->with('failed' , 'پرداخت با مشکل مواجه شد دوباره تلاش کنید.');
        }
        return redirect()->route('user.webinars.index',Auth::user())->with('success' , 'پرداخت با موفقیت انجام شد.');
    }


    private function storeOrder(Webinar $webinar, $user, $discountCode)
    {
        $orderData = OrderData::fromRequest(collect([
            'webinar' => $webinar,
            'user' => $user,
            'discount_code' => $discountCode
        ]));
        return (new OrderStoreAction())($orderData);
    }

    public function applyCode(Request $request , Webinar $webinar)
    {
        $code = $request->get('code');
        $price = $this->setWebinarsDiscountePrice($webinar);
        $discountedPrice = $this->checkDiscountCode($webinar, $code , $price);
        return json_encode($discountedPrice);
    }

    private function setWebinarsDiscountePrice(Webinar $webinar)
    {
        $webinarDiscountPrice = $webinar->price - ($webinar->price * ($webinar->percentage_discount/100));
        return $webinarDiscountPrice;
    }

    private function checkDiscountCode(Webinar $webinar , string $code , int $price)
    {
        $errorResult = (new DiscountCodeCheckAction())($webinar, $code);
        if ($errorResult)
            return $errorResult;
        $discountCode = DiscountCode::where('discount_code', $code)->first();
        $discountedPrice = (new DiscountCodeApplyToPriceAction())($discountCode , $price);

        return $discountedPrice;
    }

    private function updateOrder($order , $status , $transaction)
    {
        (new OrderUpdateAction())($order , $status , $transaction);
    }

    private function buyTransaction($webinarPrice , $discountedPrice = null)
    {
        $transactionData = [
            'amount' => $discountedPrice ?? $webinarPrice,
            'description' => 'Buy Description ... ',
            'status' => 'success',
        ];
        $this->checkWalletCharge($transactionData['amount']);
        $transactionData = TransactionData::fromRequest(collect($transactionData));
        return (new TransactionStoreAction())($transactionData , 'buy');
    }

    private function checkWalletCharge($amount)
    {
        $walletAmount = (new WalletAmountAction())();
        if ($walletAmount < $amount)
            return back()->with('failed', 'مقدار حساب کیف شما کمتر از هزینه مورد نظر میباشد.');
    }
}
