<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $table = "info";
    protected $guarded = [];

    public function urun(){
        return $this->hasMany('App\Urun','id','urun_id');
    }
    public function infodetay(){
        return $this->hasMany('App\InfoDetay','info_id');
    }
}
