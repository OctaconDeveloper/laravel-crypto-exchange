<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TradeLog extends Model
{
    //

    public function user(){
        return $this->belongsTo(User::class,);
    }
}
