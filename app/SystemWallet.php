<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SystemWallet extends Model
{
    //status 1 => active 2 => inactive
    protected $hidden = ['created_at','updated_at'];
    protected $fillable = [
        'ticker',
        'name',
        'address',
        'public_key',
        'private_key',
        'amount',
        'url',
        'status',
    ];
}
