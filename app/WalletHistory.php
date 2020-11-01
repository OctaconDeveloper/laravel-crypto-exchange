<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WalletHistory extends Model
{
    protected $hidden = ['updated_at'];
    protected $fillable = [
        'user_id',
        'trackID',
        'address',
        'amount',
        'fee',
        'ticker',
        'type',
        'transID',
        'status'
    ];

    public function trans_type(){
        return $this->belongsTo(\App\TransactionType::class,'status' ,'id');
    }
}
