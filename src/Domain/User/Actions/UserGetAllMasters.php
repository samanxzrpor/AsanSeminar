<?php

namespace Domain\User\Actions;

use Domain\User\Models\User;

class UserGetAllMasters
{

    public function __invoke()
    {
        $masters = User::role('Master')->get();
        return $masters;
    }
}
