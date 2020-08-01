<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoinPair extends Model
{
    protected $hidden = ['created_at','updated_at'];
    protected $fillable = ['pair','target','base','stat'];

    public function coinbase()
    {
        return $this->belongsTo(Token::class,'base_id','ticker');
    }

    public function cointarget()
    {
        return $this->belongsTo(Token::class, 'target_id','ticker');
    }


}
