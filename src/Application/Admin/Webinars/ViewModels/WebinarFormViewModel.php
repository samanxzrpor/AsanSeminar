<?php

namespace Application\Admin\Webinars\ViewModels;

use Domain\Webinar\Models\Webinar;

class WebinarFormViewModel
{
    public User $user;

    public Webinar $webinar;

    public function __construct(
        User $user,
        Webinar $webinar = null
    ){
        $this->user = $user;
        $this->webinar = $webinar;
    }

}
