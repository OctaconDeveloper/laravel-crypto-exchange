<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WalletDeposit extends Model
{
    protected $fillable = [
        'user_id',
        'address',
        'amount',
        'ticker',
        'status',
        'trackID',
        'transID'

    ];
    public function trans_type()
    {
        return $this->belongsTo(\App\TransactionType::class,'status' ,'id');
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class,);
    }
}
