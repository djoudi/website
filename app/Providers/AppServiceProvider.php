<?php

namespace App\Providers;

use App\Meetup;
use App\User;
use Illuminate\Support\ServiceProvider;
use Thujohn\Twitter\Facades\Twitter;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::created(function ($user) {
            //
        });

        Meetup::created(function ($meetup) {
            //return Twitter::postTweet(['status' => 'New #meetup: ' . $meetup->title . ' - ' . url('meetups/meetup/'.$meetup->getSlug()), 'format' => 'json']);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
