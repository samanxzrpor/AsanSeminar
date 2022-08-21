<?php

namespace Application\Admin\Webinars\User\Controllers;

class UsersController extends \Core\Http\Controllers\Controller
{

    public function index()
    {
        return view('users.users');
    }
}
