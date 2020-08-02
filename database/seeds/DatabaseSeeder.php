<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTypeTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(TokenSeeder::class);
        $this->call(TransactionTypeSeeder::class);
        $this->call(TradeSetupTableSeeder::class);
        $this->call(SystemWalletTableSeeder::class);

    }
}
