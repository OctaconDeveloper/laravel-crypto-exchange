<?php

namespace App\Console\Commands;

use App\Jobs\UpdateSystemWalletBalanceJob;
use Illuminate\Console\Command;

class UpdateSystemWallet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wallet:system';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update System Wallet';

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
        UpdateSystemWalletBalanceJob::dispatch();
    }
}
