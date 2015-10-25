<?php

namespace App\Policies;

use App\Meetup;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MeetupPolicy
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

    public function update(User $user, Meetup $meetup)
    {
        return $user->id === $meetup->user_id;
    }
}
