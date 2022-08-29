<?php

namespace Application\User\Wallet\Controllers;

use Domain\Wallet\Actions\WalletAmountAction;

class WalletController extends \Core\Http\Controllers\Controller
{

    public function index()
    {
        $walletAmount = (new WalletAmountAction())();
        return view('user.wallet' , [
            'walletAmount' => $walletAmount
        ]);
    }

}
