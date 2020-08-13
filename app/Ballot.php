<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ballot extends Model
{
    protected $hidden = ['created_at','updated_at'];
    protected $fillable = [
        'ballot_hash',
        'token_name',
        'token_ticker',
        'token_image',
        'start_date',
        'end_date'
    ];


}
