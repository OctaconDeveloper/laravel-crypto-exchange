<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WalletTransaction extends Model
{
    protected $fillable = [
        'user_id',
        'withdraw_address',
        'withdraw_amount',
        'withdraw_fee',
        'ticker',
        'type',
        'transID',
        'status'
    ];

    public function trans_type(){
        return $this->belongsTo(\App\TransactionType::class,'status' ,'id');
    }
}
