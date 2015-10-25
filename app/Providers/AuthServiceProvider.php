<?php

namespace App\Providers;

use App\Awesome;
use App\Job;
use App\Meetup;
use App\Policies\JobPolicy;
use App\Policies\ListPolicy;
use App\Policies\MeetupPolicy;
use App\Policies\ProjectPolicy;
use App\Project;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Meetup::class => MeetupPolicy::class,
        Awesome::class => ListPolicy::class,
        Project::class => ProjectPolicy::class,
        Job::class => JobPolicy::class,
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        //
    }
}
