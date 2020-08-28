<?php

use Illuminate\Database\Seeder;

class TokenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Token::insert([
            [
                'name' => 'Bitcoin',
                'type' => 'token',
                'ticker' => 'BTC',
                'base' => 'bitcoin',
                'address' => '1DuuTA9vbdNYEadwCewvsL7cePWSc86q1m',
                'withdrawal_fee' => '0.002',
                'withdraw_stat' => '1',
                'deposit_stat' => '1',
                'image' => config('app.url').'storage/token/bitcoin.svg',
                'created_at' => now(),
                'updated_at' => now(),
                'circulation'=> '8million',
                'description'=> null,
                'url'=> null,
                'white_paper'=> null,
            ],
            [
                'name' => 'Ethereum',
                'type' => 'token',
                'ticker' => 'ETH',
                'base' => 'ethereum',
                'address' => '1DuuTA9vbdNYEadwCewvsL7cePWSc86q1m',
                'withdrawal_fee' => '0.002',
                'withdraw_stat' => '1',
                'deposit_stat' => '1',
                'image' => config('app.url').'storage/token/ethereum.svg',
                'created_at' => now(),
                'updated_at' => now(),
                'circulation'=> '7milllion',
                'description'=> null,
                'url'=> null,
                'white_paper'=> null,
            ],
        ]);
    }
}
