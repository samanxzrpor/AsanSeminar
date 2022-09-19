<?php

namespace Domain\Wallet\Rules;

use Domain\Wallet\Actions\WalletAmountAction;
use Illuminate\Contracts\Validation\Rule;

class CheckWalletForWithdrawRule implements Rule
{
    public $wallet ;
    private $withdraw;

    public function __construct($withdraw)
    {
        $this->wallet = (new WalletAmountAction)();
        $this->withdraw = $withdraw;
    }

    public function passes($attribute , $value )
    {
        if ($this->withdraw && $this->wallet < $value)
            return false;
        return true;
    }

    public function message()
    {
        return 'Your Wallet Charge Not Enough';
    }
}
