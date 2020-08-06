<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatSetup extends Model
{
    protected $fillable = ['user_id','name','stat'];
    public function user(){
        return $this->belongsTo(User::class, 'user_id','id');
    }
}
