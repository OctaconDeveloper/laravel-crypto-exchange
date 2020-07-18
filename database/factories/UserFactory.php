<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\UserType;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
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
        'location' => null,
        'qrcode_url' => $faker->url,
        'wallet_id' => 'SUW-'.sprintf("%0.6s", str_shuffle(rand(40,5000)*time())),
        'activation_code'=> 'ACT-'.sprintf("%0.6s", str_shuffle(rand(40,5000)*time())),
        'user_type_id' => UserType::inRandomOrder()->first()->id
    ];
});
