<?php

namespace Application\User\Profile\Controllers;

use Core\Http\Controllers\Controller;
use Domain\User\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function index()
    {
        $user = User::find(Auth::id());
        return view('user.profile' , ['user' => $user]);
    }
}
