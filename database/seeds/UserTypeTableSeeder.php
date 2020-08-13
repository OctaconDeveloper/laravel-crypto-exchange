<?php

use Illuminate\Database\Seeder;

class UserTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\UserType::insert([
            [
                'name' => 'Super Admin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Admin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Chat Admin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Customer',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Api',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
