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
                'image' => 'token/bitcoin.svg',
                'created_at' => now(),
                'updated_at' => now()
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
                'image' => config('app.url').'token/ethereum.svg',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
