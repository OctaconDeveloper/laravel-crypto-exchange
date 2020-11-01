<?php

namespace App\Console\Commands;

use App\Jobs\VerifyCoinDepositJob;
use Illuminate\Console\Command;

class VerifyCoinDeposit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wallet:processdeposit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process deposit status';

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
        VerifyCoinDepositJob::dispatch();
    }
}
