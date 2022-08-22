<?php

namespace Application\Auth\Controllers;

use Application\Auth\Requests\LoginRequest;
use Application\Auth\Requests\RegisterRequest;
use Core\Http\Controllers\Controller;
use Core\Providers\RouteServiceProvider;
use Domain\Authentication\Actions\LoginUserAction;
use Domain\User\Actions\UserStoreAction;
use Domain\User\DataTransferObjects\UserData;
use Domain\User\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $request->validated();
        try {
            if (Auth::attempt([
                'email' =>$request->input('email'),
                'password' => $request->input('password')
            ])) {
                $request->session()->regenerate();
            }
        }catch (\Exception $e) {
            Log::error('login-exception' .':'. $e->getMessage());
            return back()->with('failed' , 'اطلاعات ورودی اشتباه است لطفا دوباره تلاش کنید.');
        }
        return redirect()->route('webinars.list');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    protected function create(RegisterRequest $request)
    {
        try {
            $user_data = UserData::fromRequest($request);
            $user = (new UserStoreAction)($user_data);
        } catch (\Exception $e) {
            Log::error('register-exception' .':'. $e->getMessage());
            return back()->with('failed' , 'ثیت نام شما با مشکل مواجه شد . لطفا دوباره نلاش کنید');
        }
        return redirect()->route('showLoginForm');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('showLoginForm');
    }
}
