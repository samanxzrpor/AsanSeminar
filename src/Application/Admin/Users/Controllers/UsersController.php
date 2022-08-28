<?php

namespace Application\Admin\Users\Controllers;

use Domain\User\Actions\UserGetAllAction;
use Spatie\Permission\Models\Role;

class UsersController extends \Core\Http\Controllers\Controller
{

    public function index()
    {
        $roles = Role::all();
        $users = (new UserGetAllAction())();
        return view('admin.users.list' , [
            'users' => $users,
            'roles' => $roles
        ]);
    }

}
