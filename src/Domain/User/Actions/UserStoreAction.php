<?php

namespace Domain\User\Actions;

use Domain\User\DataTransferObjects\UserData;
use Domain\User\Models\User;
use Illuminate\Support\Facades\Hash;

class UserStoreAction
{

    public function __invoke(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
        ]);

        $user->setAdmin();

        return $user;
    }
}
