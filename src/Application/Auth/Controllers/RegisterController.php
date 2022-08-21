<?php

namespace Application\Auth\Controllers;

use Application\Auth\Requests\RegisterRequest;
use Core\Http\Controllers\Controller;
use Domain\User\Actions\UserStoreAction;
use Domain\User\DataTransferObjects\UserData;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }



}
