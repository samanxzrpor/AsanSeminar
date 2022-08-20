<?php

namespace Domain\User\DataTransferObjects;

use Application\Auth\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;

class UserData extends \DataTransferObject
{
    public string $name;

    public string $email;

    public string $password;

    public string $number;

    public int $wallet_amount;


    public static function CreateFromRequest(RegisterRequest $request)
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
