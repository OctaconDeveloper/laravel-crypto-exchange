<?php

namespace App\Console\Commands;

use App\Jobs\ProcessConfirmationJob;
use Illuminate\Console\Command;

class ProcessConfirmation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wallet:verifywithdraw';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process wallet transaction verification';

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
        ProcessConfirmationJob::dispatch();
    }
}
