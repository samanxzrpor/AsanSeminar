<?php

namespace Application\User\Wallet\Controllers;

use Application\User\Wallet\Requests\ChargeWalletRequest;
use Core\Traits\CurlPostRequest;
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

    public function walletProcess(ChargeWalletRequest $request)
    {

        $data = [
            'amount' => $request->amount ,
            'user_id' => Auth::id(),
            'callback' => route('transaction.store')
        ];

        if ($request->has('withdraw'))
            $data['type'] = 'withdraw';

        if ($request->has('deposit'))
            $data['type'] = 'deposit';


        $jwt = JWT::encode($data, 'SaMaN', 'HS256');

        return Http::post('http://127.0.0.1:8001/api/shaparak' , [
            'token' => $jwt
        ]);
    }

    private function checkWalletForWithdraw()
    {

    }

}
