<?php

namespace App\Policies;

use App\Awesome;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ListPolicy
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

    public function update(User $user, Awesome $awesome)
    {
        return $user->id === $awesome->user_id;
    }
}
