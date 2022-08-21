<?php

namespace Domain\User\DataTransferObjects;

use Application\Auth\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use ReflectionClass;

class UserData extends \Core\DataTransferObjects\DataTransferObject
{
    public string $name;

    public string $email;

    public string $password;

    public string $phone;

    public int $wallet_amount;
}
