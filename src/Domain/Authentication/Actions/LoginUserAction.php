<?php

namespace Domain\Authentication\Actions;

use Domain\User\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginUserAction
{

    public function __invoke($request)
    {
        if (Auth::attempt([
            'email' =>$request->input('email'),
            'password' => $request->input('password')
        ])) {

            $request->session()->regenerate();
            return User::find(Auth::id());
        }
    }
}
