<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kullanici extends Model
{
    protected $table = "kullanici";
    //protected $guarded = [];

    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'sifre',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'sifre', 'remember_token',
    ];


    public function yorum(){
        return $this->belongsTo('App\Yorum','kullanici_id');
    }

    public function adres(){
        return $this->belongsTo('App\Adres','kullanici_id');
    }

    public function ip(){
        return $this->belongsTo('App\Ip','kullanici_id');
    }

    public function favori(){
        return $this->belongsTo('App\Favori','kullanici_id');
    }

    public function sepet(){
        return $this->belongsTo('App\Sepet','kullanici_id');
    }
}
