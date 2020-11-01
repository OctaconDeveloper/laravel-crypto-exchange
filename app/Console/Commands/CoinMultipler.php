<?php

namespace App\Console\Commands;

use App\Jobs\OrderMultiplier;
use Illuminate\Console\Command;

class CoinMultipler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orderroll:start';
 
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Multipler trade';

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
       OrderMultiplier::dispatch();
    }
}
