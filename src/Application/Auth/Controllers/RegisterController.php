<?php

namespace Application\Auth\Controllers;

use Application\Auth\Requests\RegisterRequest;
use Core\Http\Controllers\Controller;
use Core\Providers\RouteServiceProvider;
use Domain\User\Actions\UserStoreNew;
use Domain\User\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(RegisterRequest $request)
    {

    }
}
