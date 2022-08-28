<?php

namespace Application\Accountant\Users\Controllers;

use Application\Admin\Users\Requests\UpdateUserRequest;
use Domain\User\Actions\UserGetAllAction;
use Domain\User\Actions\UserUpdateAction;
use Domain\User\DataTransferObjects\UserData;
use Domain\User\Models\User;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class UsersController extends \Core\Http\Controllers\Controller
{

    public function index()
    {
        $users = (new UserGetAllAction())();
        return view('admin.users.list' , [
            'users' => $users
        ]);
    }
}
