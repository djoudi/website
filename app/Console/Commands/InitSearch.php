<?php

namespace App\Console\Commands;

use AlgoliaSearch\Client;
use Illuminate\Console\Command;

class InitSearch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'search:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initializes search using Algolia';

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
        $client = new Client(env('ALGOLIA_ID'), env('ALGOLIA_KEY'));

        $lists = $client->initIndex('dev_lists');
        $jobs = $client->initIndex('dev_jobs');
        $projects = $client->initIndex('dev_projects');
        $meetups = $client->initIndex('dev_meetups');

        $this->info('Indexes successfully created');
    }
}
