<?php

namespace Application\Transaction\Controllers;

use Application\Transaction\Exceptions\InvalidTransactionException;
use Core\Http\Controllers\Controller;
use Domain\Transaction\Actions\TransactionStoreAction;
use Domain\Transaction\DataTransferObjects\TransactionData;
use Domain\Wallet\Actions\WalletAmountAction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TransactionController extends Controller
{

    public function store( $data)
    {
        DB::beginTransaction();
        try {
            $transactionData = TransactionData::fromRequest($data);
            $transaction = (new TransactionStoreAction())($transactionData , $data['type']);
            if ($transaction->status == 'failed')
                throw new InvalidTransactionException('Transaction Get Failed');
//            if ($data['type'] == 'buy' , '')
//            if ($data['type'] == 'deposit' || $data['type'] == 'refund')
//                (new WalletAmountAction())(Auth::user() , $transactionData['amount']);
//            if ($data['type'] == 'buy' || $data['type'] == 'refund')
//                (new WalletAmountAction())(Auth::user() , $transactionData['amount']);
            DB::commit();
        }
        catch (InvalidTransactionException $e) {
            DB::rollBack();
            Log::error('Transaction Exception: ' . $e->getMessage());
            return redirect()->route('user.webinars.index',Auth::user())->with('failed' , 'پرداخت با مشکل مواجه شد دوباره تلاش کنید.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Transaction Exception: ' . $e->getMessage());
            return redirect()->route('user.webinars.index',Auth::user())->with('failed' , 'پرداخت با مشکل مواجه شد دوباره تلاش کنید.');
        }
        return redirect()->route('user.webinars.index',Auth::user())->with('success' , 'پرداخت با موفقیت انجام شد.');
    }
}
