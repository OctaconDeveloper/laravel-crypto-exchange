<?php

use App\UserType;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create(
            [
                'name' => null,
                'email' => 'admin@spetrex.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'refCode' => 'newRefCode',
                'referral' => null,
                'tradeStat' => 0,
                'chatStat' => 0,
                'picture' => 'hello',
                'is_active' => 1,
                'tfa_stat' => 0,
                'secret' => null,
                'location' => '/block/home',
                'qrcode_url' => null,
                'wallet_id' => 'SUW-'.sprintf("%0.6s", str_shuffle(rand(40,5000)*time())),
                'activation_code'=> 'ACT-'.sprintf("%0.6s", str_shuffle(rand(40,5000)*time())),
                'user_type_id' => UserType::whereName('Super Admin')->first()->id
            ]
        );
    }
}
