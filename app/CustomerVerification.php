<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerVerification extends Model
{
    protected $fillable = ['residence','user_id','surname','othernames','email','phone','passport','idcard','stat'];
}

