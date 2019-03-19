<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yorum extends Model
{
    protected $table = "yorum";
    protected $guarded = [];

    public function users(){
        return $this->hasOne('App\User','id','kullanici_id');
    }

    public function urun(){
        return $this->belongsToMany('App\Urun','urunyorum', 'yorum_id', 'urun_id');
    }

}
