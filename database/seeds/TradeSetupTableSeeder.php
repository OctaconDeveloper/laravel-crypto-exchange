<?php

use Illuminate\Database\Seeder;

class TradeSetupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\TradeSetup::create(
            [
                'trade_fee' => '0.005',
                'trade-mode' => 'testnet'
            ]
        );
    }
}
