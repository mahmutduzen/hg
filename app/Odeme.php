<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Odeme extends Model
{
    protected $table = "odeme";
    protected $guarded = [];

    public function sepet(){
        return $this->hasOne('App\Sepet','id','sepet_id');
    }

    public function adres(){
        return $this->hasOne('App\Adres','id','adres_id');
    }

}
