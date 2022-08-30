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
        dd($data);
        DB::beginTransaction();
        try {
            $walletAmount = (new WalletAmountAction())();
            $transactionData = TransactionData::fromRequest($data);

            if ($data['type'] == 'wallet')
            if ($walletAmount < $data['amount'])
                throw new InvalidTransactionException('Your Wallet Amount must be greater than or equal to'.$data['amount']);

                    $transaction = (new TransactionStoreAction())($transactionData , $data['type']);
            if ($transaction->status == 'failed')
                throw new InvalidTransactionException('Transaction Get Failed');
            DB::commit();
        }
        catch (InvalidTransactionException $e) {
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
}
