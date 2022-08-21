<?php

namespace Domain\User\Actions;

use Domain\User\DataTransferObjects\UserData;
use Domain\User\Models\User;
use Illuminate\Support\Facades\Hash;

class UserStoreAction
{

    public function __invoke(UserData $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'phone' => $data['phone'],
            'wallet_amount' => $data['wallet_amount']
        ]);
        $user->email == config('permission.admin_email')
            ? $user->assignRole('Admin')
            : $user->assignRole('User');

        return $this;
    }
}
