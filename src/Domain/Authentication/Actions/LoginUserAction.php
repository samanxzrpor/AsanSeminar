<?php

namespace Domain\Authentication\Actions;

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
            return redirect()->route('home');
        }
    }
}
