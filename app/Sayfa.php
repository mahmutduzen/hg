<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sayfa extends Model
{
    protected $table = "sayfa";
    protected $guarded = [];

    public function kategori(){
        return $this->belongsToMany('App\Kategori','sayfakategori', 'sayfa_id', 'kategori_id');
    }

    public function dosya(){
        return $this->belongsToMany('App\Dosya','sayfadosya', 'sayfa_id', 'dosya_id');
    }

    public function etiket(){
        return $this->belongsToMany('App\Etiket','sayfaetiket', 'sayfa_id', 'etiket_id');
    }

    public function marka(){
        return $this->belongsToMany('App\Marka','sayfamarka', 'sayfa_id', 'marka_id');
    }

    public function resKategori(){
        return $this->belongsToMany('App\resKategori','sayfareskategori', 'sayfa_id', 'resKategori_id');
    }

    public function sitil(){
        return $this->hasOne('App\Sitil','id','sitil_id');
    }

    public function tip(){
        return $this->hasOne('App\Tip','id', 'tip_id');
    }

}
