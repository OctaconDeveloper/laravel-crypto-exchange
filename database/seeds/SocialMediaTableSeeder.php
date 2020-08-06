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
                'facebook_handle' => 'facebook_handle',
                'twitter_handle' => 'twitter_handle',
                'instagram_handle' => 'instagram_handle',
                'discord_handle' => 'discord_handle'
            ]
        );
    }
}
