<?php

namespace Application\Auth\Controllers;

use Application\Auth\Requests\RegisterRequest;
use Core\Http\Controllers\Controller;
use Domain\User\Actions\UserStoreAction;
use Domain\User\DataTransferObjects\UserData;

class RegisterController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function showRegisterForm()
    {
        $user_data = UserData::fromRequest(request());
        dd($user_data);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(RegisterRequest $request)
    {
        $user_data = UserData::fromRequest($request);

        (new UserStoreAction)($user_data);
    }

}
