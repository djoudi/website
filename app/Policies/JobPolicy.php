<?php

namespace App\Policies;

use App\Jobs\Job;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobPolicy
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

    public function update(User $user, Job $job)
    {
        return $user->id === $job->user_id;
    }
}
