<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yazi extends Model
{
    protected $table = "yazi";
    protected $guarded = [];

    public function kategori(){
        return $this->belongsToMany('App\Kategori','yazikategori', 'yazi_id', 'kategori_id');
    }

    public function dosya(){
        return $this->belongsToMany('App\Dosya','yazidosya', 'yazi_id', 'dosya_id');
    }

    public function etiket(){
        return $this->belongsToMany('App\Etiket','yazietiket', 'yazi_id', 'etiket_id');
    }

    public function users(){
        return $this->hasOne('App\User','id','users_id');
    }

    public function yorum(){
        return $this->hasMany('App\Yorum','yazi_id');
    }

}
