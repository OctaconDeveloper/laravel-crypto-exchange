<?php

use Illuminate\Database\Seeder;

class SystemWalletTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\SystemWallet::insert([
            [
                'ticker' => 'BTC',
                'name' => 'Bitcoin',
                'address' => 'default_address',
                'public_key' => 'default_public_key',
                'private_key' => 'default_private_key',
                'amount' => 0.000000,
                'url' => env('APP_URL'),
                'status' => '1',
            ],
            [
                'ticker' => 'ETH',
                'name' => 'Ethereum',
                'address' => 'default_address',
                'public_key' => 'default_public_key',
                'private_key' => 'default_private_key',
                'amount' => 0.000000,
                'url' => env('APP_URL'),
                'status' => '1',
            ],
        ]);
    }
}
