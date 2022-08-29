<?php

namespace Application\User\Wallet\Controllers;

class WalletController extends \Core\Http\Controllers\Controller
{

    public function index()
    {
        return view('user.wallet');
    }

}
