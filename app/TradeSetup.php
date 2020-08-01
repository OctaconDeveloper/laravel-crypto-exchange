<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TradeSetup extends Model
{
    protected $hidden = ['created_at','updated_at'];
    protected $fillable = ['trade_fee','trade_mode'];
}
