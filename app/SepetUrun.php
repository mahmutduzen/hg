<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SepetUrun extends Model
{
    protected $table = "sepeturun";
    protected $guarded = [];

    public function urun(){
        return $this->hasMany('App\Urun','id','urun_id');
    }

    public function sepet(){
        return $this->hasOne('App\Sepet','id','sepet_id');
    }

    public function secenek(){
        return $this->hasOne('App\Secenek','id','secenek_id');
    }
}
