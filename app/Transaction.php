<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $hidden = ['updated_at','created_at'];

    protected $fillable = [
        'trackID',
        'transID',
        'user_id',
        'currency',
        'type',
        'img_type',
        'amount',
        'fee',
        'status',
        'url',
    ];
}
