<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email_verified_at', 'activation_code','wallet_id', 'name', 'email', 'qrcode_url', 'password','refCode','referral','tradeStat','chatStat','picture','is_active','tfa_stat','secret','location','user_type_id'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','updated_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user_type(){
        return $this->belongsTo(UserType::class, );
    }

    public function kyc(){
        return $this->belongsTo(CustomerVerification::class, 'id','user_id');
    }


    public function chatsetup(){
        return $this->belongsTo(ChatSetup::class, 'id', 'user_id');
    }
}
