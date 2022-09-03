<?php

namespace Application\Admin\Payments\Controllers;

use Core\Http\Controllers\Controller;
use Domain\Transaction\Actions\TransactionGetAll;

class TransactionsController extends Controller
{

    public function index()
    {
        $transactions = (new TransactionGetAll())();

        return view('admin.transactions.list' , ['transactions' => $transactions]);
    }
}
