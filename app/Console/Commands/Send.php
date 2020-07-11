<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ClientService;

class Send extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send post to URL: https://atomic.incfile.com/fakepost';

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
        $ClientService = new ClientService;
        print_r($ClientService->Get());
    }
}
