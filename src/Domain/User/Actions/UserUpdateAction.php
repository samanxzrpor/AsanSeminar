<?php

namespace Domain\User\Actions;

use Domain\User\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserUpdateAction
{

    public function __invoke(array $data , User $user)
    {
        $roleId = Role::where('name' , $data['role'])->first()->id;
        $updatedUser = $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => $data['password'] ? Hash::make($data['password']) : $user->password
        ]);
        if ($user->roles[0]->name != $data['role'])
            $user->roles()->sync([$roleId]);

        return $user;
    }
}
