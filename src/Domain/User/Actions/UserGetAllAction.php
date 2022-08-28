<?php

namespace Domain\User\Actions;

use Domain\User\Models\User;

class UserGetAllAction
{

    public function __invoke()
    {
        $users = User::with(['roles' => fn($query) =>
            $query->select('name')
        ])->get();

        return $users;
    }
}
