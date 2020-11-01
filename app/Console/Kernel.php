<?php

namespace App\Console;

use App\Jobs\RobotChat;
use Illuminate\Console\Command;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        commands\AddChat::class,
        commands\CoinMultipler::class,
        commands\ProcessDeposit::class,
        commands\ProcessWithdrawal::class,
        commands\ProcessConfirmation::class,
        commands\UpdateSystemWallet::class,
        commands\VerifyCoinDeposit::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        // $schedule->job(new RobotChat)
        // ->cron('*/5 * * * *');
        $schedule->command('cryptochat:start')
        ->cron('*/5 * * * *');
        $schedule->command('orderroll:start')
        ->cron('*/5 * * * *');
        $schedule->command('wallet:deposit')
        ->everyThreeMinutes();
        $schedule->command('wallet:withdrawal')
        ->everyThreeMinutes();
        $schedule->command('wallet:verifywithdraw')
        ->everyThreeMinutes();
        $schedule->command('wallet:system')
        ->everyThreeMinutes();
        $schedule->command('wallet:processdeposit')
        ->everyThreeMinutes();
    } 

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
