<?php

namespace Domain\User\Actions;

use Domain\User\Models\User;

class WalletChargeAction
{

    public function __invoke($user , $amount)
    {
        $user = User::find($user->id);
        $user->update([
            'wallet_amount' => $user->wallet_amount + $amount,
        ]);
    }
}
