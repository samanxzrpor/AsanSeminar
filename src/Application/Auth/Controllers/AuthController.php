<?php

namespace Application\Auth\Controllers;

use Application\Auth\Requests\LoginRequest;
use Application\Auth\Requests\RegisterRequest;
use Core\Http\Controllers\Controller;
use Core\Providers\RouteServiceProvider;
use Domain\User\Actions\UserStoreAction;
use Domain\User\DataTransferObjects\UserData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controllers
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
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

        if (Auth::attempt([$request->input('email'), $request->input('password')])) {

            $request->session()->regenerate();
            return redirect()->route('home');
        }

        return back()->with('failed' , 'اطلاعات ورودی اشتباه است لطفا دوباره تلاش کنید.');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    protected function create(RegisterRequest $request)
    {
        try {
            $user_data = UserData::fromRequest($request);
            (new UserStoreAction)($user_data);
        } catch (\Exception $e) {
            Log::alert('register-exception' .':'. $e->getMessage());
            return back()->with('failed' , 'ثیت نام شما با مشکل مواجه شد . لطفا دوباره نلاش کنید');
        }
    }
}
