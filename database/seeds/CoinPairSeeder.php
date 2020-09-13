<?php

use Illuminate\Database\Seeder;

class CoinPairSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\CoinPair::insert([
            [
                'pair' => 'ETH_BTC',
                'target_id' => 'ETH',
                'base_id' => 'BTC',
                'stat' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
