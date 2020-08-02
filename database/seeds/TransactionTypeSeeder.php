<?php

use Illuminate\Database\Seeder;

class TransactionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\TransactionType::insert([
            [
                'name' => 'Pending',
            ],
            [
                'name' => 'Confirmed',
            ],
            [
                'name' => 'In Progress',
            ],
            [
                'name' => 'Completed',
            ],
            [
                'name' => 'Rejected',
            ],
        ]);
    }
}
