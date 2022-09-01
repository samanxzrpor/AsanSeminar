<?php

namespace Application\User\Transactions\Controllers;

use Domain\Transaction\Actions\TransactionGetCurrentUser;
use Domain\User\Models\User;
use Domain\Webinar\Actions\WebinarGetCurrentUserAction;
use Domain\Webinar\Models\Webinar;
use Illuminate\Support\Facades\Auth;

class TransactionsController extends \Core\Http\Controllers\Controller
{

    public function index()
    {
        $usersTranslation = (new TransactionGetCurrentUser())();
        return view('user.transactions' , [
            'transactions' => $usersTranslation
        ]);
    }
}
