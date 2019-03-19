<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = "kategori";
    protected $guarded = [];

    public function sayfa(){
        return $this->belongsToMany('App\Sayfa','sayfakategori',  'kategori_id','sayfa_id');
    }
    public function yazi(){
        return $this->belongsToMany('App\Yazi','yazikategori', 'kategori_id', 'yazi_id');
    }
}
