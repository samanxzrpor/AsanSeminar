<?php

namespace Application\Wallet\Controllers;

use Domain\Transaction\Actions\TransactionStoreAction;
use Domain\Transaction\DataTransferObjects\TransactionData;
use Domain\User\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WalletController extends \Core\Http\Controllers\Controller
{

    public function index()
    {
        return view('user.wallet');
    }

}
