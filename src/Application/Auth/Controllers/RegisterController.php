<?php

namespace Application\Auth\Controllers;

use Application\Auth\Requests\RegisterRequest;
use Core\Http\Controllers\Controller;
use Domain\User\Actions\UserStoreAction;
use Domain\User\DataTransferObjects\UserData;

class RegisterController extends Controller
{


    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    protected function create(RegisterRequest $request)
    {
        $user_data = UserData::fromRequest($request);

        (new UserStoreAction)($user_data);
    }

}
