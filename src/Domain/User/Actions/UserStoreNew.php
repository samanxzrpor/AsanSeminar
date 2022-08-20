<?php

namespace Domain\User\Actions;

use Domain\User\Models\User;
use Illuminate\Support\Facades\Hash;

class UserStoreNew
{

    public function __invoke(UserData $data)
    {
        // TODO: Implement __invoke() method.
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'phone' => $data['phone'],
            'wallet_amount' => $data['wallet_amount']
        ]);
    }
}
