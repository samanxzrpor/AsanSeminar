<?php

namespace Domain\User\DataTransferObjects;

use Application\Auth\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;

class UserData
{
    public string $name;

    public string $email;

    public string $password;

    public string $number;

    public int $wallet_amount;


    public function getStoreUser(RegisterRequest $request)
    {
        return new self([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'number' => $request->get('number'),
            'wallet_amount' => 0 ,
        ]);
    }
}
