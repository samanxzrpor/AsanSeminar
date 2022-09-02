<?php

namespace Application\User\Webinars\Controllers;

use Domain\Order\Actions\OrderUpdateAction;
use Domain\Order\Models\Order;
use Domain\Transaction\Actions\TransactionStoreAction;
use Domain\Transaction\DataTransferObjects\TransactionData;
use Domain\User\Models\User;
use Domain\Webinar\Actions\WebinarGetCurrentUserAction;
use Domain\Webinar\Models\Webinar;
use Illuminate\Support\Facades\Auth;

class WebinarController extends \Core\Http\Controllers\Controller
{

    public function index()
    {
        $usersWebinars = (new WebinarGetCurrentUserAction())();
        return view('user.webinars' , [
            'webinars' => $usersWebinars,
            'page' => 'user'
        ]);
    }

    public function refund($user , $webinar)
    {
        $webinar = Webinar::find($webinar);
        $order =  Order::where(['status' => 'paid' ,'user_id'=> $user , 'webinar_id' => $webinar->id])->first();
        $timeForRefund = $order->created_at->addDays(5);

        if ($timeForRefund < now())
            return back()->with('failed' , 'مهلت عودت وجه و انصراف به اتمام رسیده');

        $this->refundTransaction($order->transaction->amount);
        (new OrderUpdateAction())($order , 'refund');

        return back()->with('success' , 'انصراف انجام شد و هزینه وبینار به حساب شما برگشت');
    }


    private function refundTransaction($orderPrice)
    {
        $transactionData = [
            'amount' => $orderPrice,
            'description' => 'Refund Description ... ',
            'status' => 'success',
        ];
        $transactionData = TransactionData::fromRequest(collect($transactionData));
        return (new TransactionStoreAction())($transactionData , 'refund');
    }
}
