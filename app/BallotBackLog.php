<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BallotBackLog extends Model
{
    protected $hidden = ['updated_at','created_at'];
    protected $fillable = [
        'name',
        'ticker',
        'base',
        'address',
        'image',
        'circulation',
        'description',
        'url',
        'white_paper'
    ];
}
