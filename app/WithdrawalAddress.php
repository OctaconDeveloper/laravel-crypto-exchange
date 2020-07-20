<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WithdrawalAddress extends Model
{
    protected $fillable = ['user_id','ticker','address'];
}
