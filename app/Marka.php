<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marka extends Model
{
    protected $table = "marka";
    protected $guarded = [];

    public function dosya(){
        return $this->hasOne('App\Dosya','id','dosya_id');
    }

    public function ustMarka(){
        return $this->hasOne('App\Marka','id','ust_id');
    }

    public function urun(){
        return $this->belongsToMany('App\Urun','urunmarka',  'marka_id','urun_id')->orderBy('baslik');
    }

    public function sayfa(){
        return $this->belongsToMany('App\Sayfa','sayfamarka',  'marka_id','sayfa_id');
    }

}
