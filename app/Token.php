<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $hidden = ['updated_at','created_at'];
    protected $fillable = ['name','type','ticker','base','address','withdrawal_fee','withdraw_stat','deposit_stat','image'];
}
