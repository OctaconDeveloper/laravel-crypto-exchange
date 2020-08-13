<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarketMaker extends Model
{
    protected $fillable = [
        'pair',
       'maximum_volume'
    ];

    public function token()
    {
        return $this->belongsTo(CoinPair::class, 'pair');
    }
}
