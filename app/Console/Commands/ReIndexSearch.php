<?php

namespace App\Console\Commands;

use App\Awesome;
use App\Job;
use App\Meetup;
use App\Project;
use Illuminate\Console\Command;
use Vinkla\Algolia\Facades\Algolia;

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
        foreach ($lists as $item) {
            $item->pushToIndex();
        }
        $this->info('Lists successfully updated');

        $meetups = Meetup::approved()->get();
        foreach ($meetups as $item) {
            $item->pushToIndex();
        }
        $this->info('Meetups successfully updated');

        $jobs = Job::approved()->get();
        foreach ($jobs as $item) {
            $item->pushToIndex();
        }
        $this->info('Jobs successfully updated');

        $pojects = Project::approved()->get();
        foreach ($pojects as $item) {
            $item->pushToIndex();
        }
        $this->info('Projects successfully updated');

    }
}
