<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReferalBalance extends Model
{
    protected $fillable = ['user_id','amount','currency'];
}
