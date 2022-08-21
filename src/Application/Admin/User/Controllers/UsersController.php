<?php

namespace Application\Admin\User\Controllers;

use Domain\User\Actions\UserGetAllAction;

class UsersController extends \Core\Http\Controllers\Controller
{

    public function index()
    {
        $users = (new UserGetAllAction());

        return view('users.users' , compact('users'));
    }

}
