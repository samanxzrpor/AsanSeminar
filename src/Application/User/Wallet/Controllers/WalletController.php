<?php

namespace Application\User\Wallet\Controllers;

use Application\User\Wallet\Requests\ChargeWalletRequest;
use Domain\Wallet\Actions\WalletAmountAction;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class WalletController extends \Core\Http\Controllers\Controller
{

    public function index()
    {
        $walletAmount = (new WalletAmountAction())();
        return view('user.wallet' , [
            'walletAmount' => $walletAmount
        ]);

    }

    public function walletProccrss(ChargeWalletRequest $request)
    {
        $request->validated();

        if ($request->has('withdraw')) {
            $data = [
                'amount' => $request->amount ,
                'user_id' => Auth::id(),
                'type' => 'withdraw',
                'callback' => route('transaction.store')
            ];
        }

        if ($request->has('deposit')) {
            $data = [
                'amount' => $request->amount ,
                'user_id' => Auth::id(),
                'type' => 'deposit',
                'callback' => route('transaction.store')
            ];
        }

        $jwt = JWT::encode($data, 'SaMaN', 'HS256');

        return Http::withHeaders([
            'X-CSRF-Token' => csrf_token(),
            'Content-Type', 'application/x-www-form-urlencoded'
        ])->post('http://127.0.0.1:8001/api/shaparak', [
            'token' =>$jwt
        ]);
    }

}
