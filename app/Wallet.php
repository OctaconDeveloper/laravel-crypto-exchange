<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = [
        'user_id',
        'address',
        'ticker',
        'base',
        'amount',
        'privateKey',
        'publicKey',
        'status',
        'wif'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,);
    }
}

