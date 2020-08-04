<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ballot extends Model
{
    protected $hidden = ['created_at','updated_at'];
    protected $fillable = [
        'first_token',
        'second_token',
        'third_token',
        'fourth_token',
        'first_file',
        'second_file',
        'third_file',
        'fourth_file',
        'start_date',
        'end_date'
    ];

    public function firstcount()
    {
        return $this->belongsTo(Vote::class, 'first_token','name');
    }
    public function secondcount()
    {
        return $this->belongsTo(Vote::class, 'second_token','name');
    }
    public function thirdcount()
    {
        return $this->belongsTo(Vote::class, 'third_token','name');
    }
    public function fourthcount()
    {
        return $this->belongsTo(Vote::class, 'fourth_token','name');
    }
}
