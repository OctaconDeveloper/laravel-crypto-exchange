<?php

namespace App\Console\Commands;

use App\Jobs\ProcessWithdrawalJob;
use Illuminate\Console\Command;

class ProcessWithdrawal extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wallet:withdrawal';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process wallet withdrawals';

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
        ProcessWithdrawalJob::dispatch();
    }
}
