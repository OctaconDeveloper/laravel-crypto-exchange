<?php

namespace App\Console\Commands;

use App\Jobs\ProcessDepositJob;
use Illuminate\Console\Command;

class ProcessDeposit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wallet:deposit';

    /**
     * The console command description.
     *
     * @var string 
     */
    protected $description = 'Process wallet deposits';

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
     * @return int
     */
    public function handle()
    {
        ProcessDepositJob::dispatch();
    }
}
