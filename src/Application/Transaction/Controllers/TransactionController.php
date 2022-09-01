<?php

namespace Application\Transaction\Controllers;

use Application\Transaction\Exceptions\NotEnoughWalletAmountException;
use Core\Http\Controllers\Controller;
use Domain\Order\Actions\OrderUpdateAction;
use Domain\Order\Models\Order;
use Domain\Transaction\Actions\TransactionStoreAction;
use Domain\Transaction\DataTransferObjects\TransactionData;
use Domain\User\Models\User;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TransactionController extends Controller
{

    public function store(Request $request)
    {
        $data = collect(JWT::decode($request->key , new Key('SaMaN' , 'HS256')));
        $order = Order::find($data->get('order_id')) ?? null;
        $user = User::find($data->get('user_id')) ?? null;
        Auth::loginUsingId($user->id);

        DB::beginTransaction();
        try {
            $transactionData = TransactionData::fromRequest($data);
            # Direct Purchase
            $this->directPurchase($transactionData , $order);
            # Charge Wallet
            $this->depositTransaction($transactionData);
            # Withdraw From Wallet
            $this->withdrawTransaction($transactionData);
            DB::commit();
        }
        catch (NotEnoughWalletAmountException $e) {
            DB::rollBack();
            Log::error('Transaction Exception: ' . $e->getMessage());
            return redirect()->route('user.webinars.index',Auth::user())->with('failed' , $e->getMessage());
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Transaction Exception: ' . $e->getMessage());
            return redirect()->route('user.webinars.index',Auth::user())->with('failed' , 'پرداخت با مشکل مواجه شد دوباره تلاش کنید.');
        }
        return redirect()->route('user.webinars.index',Auth::user())->with('success' , 'پرداخت با موفقیت انجام شد.');
    }


    private function directPurchase($transactionData , $order)
    {
        if ($transactionData['type'] == 'direct') {
            $depositTransaction = (new TransactionStoreAction())($transactionData , 'deposit');
            if ($depositTransaction->status == 'failed') {
                (new OrderUpdateAction())($order , 'unsuccessful' , $depositTransaction);
                throw new NotEnoughWalletAmountException('Transaction Get Failed');
            }
            $buyTransaction = (new TransactionStoreAction())($transactionData , 'buy');
            (new OrderUpdateAction())($order , 'paid' , $depositTransaction);
        }
    }

    private function depositTransaction($transactionData)
    {
        if ($transactionData['type'] == 'deposit') {
            $depositTransaction = (new TransactionStoreAction())($transactionData , 'deposit');
            if ($depositTransaction->status == 'failed') {
                throw new NotEnoughWalletAmountException('Transaction Get Failed');
            }
        }
    }

    private function withdrawTransaction($transactionData)
    {
        if ($transactionData['type'] == 'withdraw') {
            $depositTransaction = (new TransactionStoreAction())($transactionData , 'withdraw');
            if ($depositTransaction->status == 'failed') {
                throw new NotEnoughWalletAmountException('Transaction Get Failed');
            }
        }
    }
}
