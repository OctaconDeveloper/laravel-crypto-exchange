<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $hidden = ['updated_at'];
    protected $fillable = ['user_id','log'];

    public function user()
    {
        return $this->belongsTo(User::class,);
    }
}
