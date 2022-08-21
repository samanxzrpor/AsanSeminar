<?php

namespace Domain\User\Policies;

use Domain\User\Models\User;
use Domain\Webinar\Models\Webinar;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function create(User $user , Webinar $webinar)
    {
        return $user->isAdmin();
    }
    
}
