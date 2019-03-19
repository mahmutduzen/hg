<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResKategori extends Model
{
    protected $table = "resKategori";
    protected $guarded = [];

    public function dosya(){
        return $this->hasOne('App\Dosya','id','dosya_id');
    }

    public function fotograf(){
        return $this->belongsToMany('App\Fotograf','fotoreskategori',  'resKategori_id','fotograf_id')->orderBy('baslik');
    }

    public function sayfa(){
        return $this->belongsToMany('App\Sayfa','sayfareskategori',  'resKategori_id','sayfa_id');
    }

}
