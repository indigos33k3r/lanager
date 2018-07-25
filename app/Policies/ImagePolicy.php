<?php

namespace Zeropingheroes\Lanager\Policies;

use Zeropingheroes\Lanager\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ImagePolicy extends BasePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can list all pages.
     *
     * @param  \Zeropingheroes\Lanager\User $user
     * @return mixed
     */
    public function view(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can create pages.
     *
     * @param  \Zeropingheroes\Lanager\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the page.
     *
     * @param  \Zeropingheroes\Lanager\User $user
     * @return mixed
     */
    public function delete(User $user)
    {
        return false;
    }
}