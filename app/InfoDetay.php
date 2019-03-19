<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoDetay extends Model
{
    protected $table = "infodetay";
    protected $guarded = [];

    public function info(){
        return $this->hasMany('App\Info','id','info_id');
    }
}
