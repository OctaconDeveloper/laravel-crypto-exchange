<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
   protected $hidden = ['updated_at'];
   protected $fillable = ['tag','wallet_id','pair','type','target_coin','price','amount','total','base_coin','stat'];

    // stat => 0 block, 1 unblock
    public function user(){
        return $this->belongsTo(User::class, 'wallet_id','wallet_id');
    }
}
