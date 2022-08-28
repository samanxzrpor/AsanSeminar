<?php

namespace Application\Transaction\Controllers;

use Application\Transaction\Exceptions\InvalidTransactionException;
use Core\Http\Controllers\Controller;
use Domain\Transaction\Actions\TransactionStoreAction;
use Domain\Transaction\DataTransferObjects\TransactionData;
use Domain\User\Actions\WalletChargeAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TransactionController extends Controller
{

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $transactionData = TransactionData::fromRequest($request);
            $transaction = (new TransactionStoreAction())($transactionData , $request->get('type'));
            if ($transaction->status == 'failed')
                throw new InvalidTransactionException('Transaction Get Failed');
            if ($request->get('type') == 'deposit')
                (new WalletChargeAction())(Auth::user() , $transactionData['amount']);
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
        return redirect()->route('user.webinars.index',Auth::user())->with('success' , 'پزداخت با موفقیت انجام شد.');
    }
}
