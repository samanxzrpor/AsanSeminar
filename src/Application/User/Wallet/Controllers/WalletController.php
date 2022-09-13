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

    public function walletProcess(ChargeWalletRequest $request)
    {
        $data = [
            'amount' => $request->amount ,
            'user_id' => Auth::id(),
            'type' => 'withdraw',
            'callback' => route('transaction.store')
        ];

        if ($request->has('withdraw'))
            $data[] = ['type' => 'withdraw'];

        if ($request->has('deposit'))
            $data[] = ['type' => 'deposit'];

        $jwt = JWT::encode($data, 'SaMaN', 'HS256');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"http://127.0.0.1:8001/api/shaparak");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,
            'token='.$jwt);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close ($ch);

        return $server_output;
    }

}
