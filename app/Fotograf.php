<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fotograf extends Model
{
    protected $table = "fotograf";
    protected $guarded = [];

    public function dosya(){
        return $this->hasOne('App\Dosya','id','dosya_id');
    }

    public function resKategori(){
        return $this->belongsToMany('App\resKategori','fotoreskategori', 'fotograf_id', 'resKategori_id');
    }

}
