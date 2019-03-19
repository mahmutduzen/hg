<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'yetki','surname','dogum_tarihi','parabirimi','phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function yetki(){
        return $this->yetki;
    }

    public function favori(){
        return $this->hasOne('App\Favori','kullanici_id');
    }
    public function sepet(){
        return $this->hasMany('App\Sepet','kullanici_id','id');
    }

    public function adres(){
        return $this->hasMany('App\Adres','kullanici_id');
    }

}
