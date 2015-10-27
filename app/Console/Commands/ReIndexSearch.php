<?php

namespace App\Console\Commands;

use App\Awesome;
use App\Job;
use App\Meetup;
use Illuminate\Console\Command;

class ReIndexSearch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'search:reindex';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Flushes all items on Algolia and perform a re-index';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $lists = Awesome::approved()->get();
        //Job::approved()->reindex();
        $meetups = Meetup::approved()->get();

        foreach ($lists as $list) {
            $list->reindex();
        }

        foreach ($meetups as $meetup) {
            $meetup->reindex();
        }

    }
}
