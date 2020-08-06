<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stake extends Model
{
    protected $fillable = [
        'token_id',
        'minimum_deposit',
        'minimum_annual',
        'maximum_annual',
        'keywords'
    ];

    public function token(){
        return $this->belongsTo(Token::class);
    }
}
