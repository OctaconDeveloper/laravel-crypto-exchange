<?php

use Illuminate\Database\Seeder;

class SocialMediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\SocialMedia::create(
            [
                'facebook_handle' => 'https://www.facebook_handle.com/'.strtolower(env('APP_NAME')),
                'twitter_handle' => 'https://www.twitter_handle.com/'.strtolower(env('APP_NAME')),
                'instagram_handle' => 'https://www.instagram_handle.com/'.strtolower(env('APP_NAME')),
                'discord_handle' => 'https://www.discord_handle.com/'.strtolower(env('APP_NAME')),
            ]
        );
    }
}
