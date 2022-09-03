<?php

namespace Application\Admin\Users\Controllers;

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

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', [
            'user' => $user ,
            'roles' => $roles
        ]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $request->validated();
        try {
            $userData = UserData::fromRequest($request);
            $updatedUser = (new UserUpdateAction())($userData , $user);
        } catch (\Exception $e) {
            Log::error('User Update'. $e->getMessage());
            return back()->with('failed' , 'بروزرسانی کاربر با مشکل مواجه شد.');
        }
        return redirect()->route('admin.users.index')->with('success' , 'کاربر بروزرسانی شد .');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'کاربر '. $user->name .'  حذف شد.');
    }
}
