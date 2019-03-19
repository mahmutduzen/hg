<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sepet extends Model
{
    protected $table = "sepet";
    protected $guarded = [];

    public function sepeturun(){
        return $this->hasMany('App\SepetUrun','sepet_id');
    }

    public function kullanici(){
        return $this->hasOne('App\User','id','kullanici_id');
    }

}
