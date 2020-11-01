<?php

namespace App\Console\Commands;

use App\Jobs\RobotChat;
use Illuminate\Console\Command;

class AddChat extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cryptochat:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Begins the command to populate the chat troll box';

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
      RobotChat::dispatch();
    }
}
