<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    protected $fillable = [
        'facebook_handle',
        'twitter_handle',
        'instagram_handle',
        'discord_handle'
    ];
}
