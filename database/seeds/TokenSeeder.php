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
                'base' => 'BTC',
                'address' => 'default_address',
                'withdrawal_fee' => '0.002',
                'withdraw_stat' => '1',
                'deposit_stat' => '1',
                'image' => config('app.url').'/bitcoin.svg',
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
                'base' => 'ETH',
                'address' => 'default_address',
                'withdrawal_fee' => '0.002',
                'withdraw_stat' => '1',
                'deposit_stat' => '1',
                'image' => config('app.url').'/ethereum.svg',
                'created_at' => now(),
                'updated_at' => now(),
                'circulation'=> '7milllion',
                'description'=> null,
                'url'=> null,
                'white_paper'=> null,
            ],
            [
                'name' => 'Test Token',
                'type' => 'token',
                'ticker' => 'TTK',
                'base' => 'ETH',
                'address' => 'default_address',
                'withdrawal_fee' => '0.002',
                'withdraw_stat' => '1',
                'deposit_stat' => '1',
                'image' => config('app.url').'/ethereum.svg',
                'created_at' => now(),
                'updated_at' => now(),
                'circulation'=> '7milllion',
                'description'=> null,
                'url'=> null,
                'white_paper'=> null,
            ],
            [
                'name' => 'Two Token',
                'type' => 'token',
                'ticker' => 'TWK',
                'base' => 'ETH',
                'address' => 'default_address',
                'withdrawal_fee' => '0.002',
                'withdraw_stat' => '1',
                'deposit_stat' => '1',
                'image' => config('app.url').'/ethereum.svg',
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
