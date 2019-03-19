<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Urun extends Model
{
    protected $table = "urun";
    protected $guarded = [];

    public function marka(){
        return $this->belongsToMany('App\Marka','urunmarka', 'urun_id', 'marka_id');
    }

    public function dosya(){
        return $this->belongsToMany('App\Dosya','urundosya', 'urun_id', 'dosya_id');
    }

    public function etiket(){
        return $this->belongsToMany('App\Etiket','urunetiket', 'urun_id', 'etiket_id');
    }

    public function yorum(){
        return $this->belongsToMany('App\Yorum','urunyorum', 'urun_id', 'yorum_id');
    }

    public function ozellik(){
        return $this->belongsToMany('App\Ozellik','urunozellik', 'urun_id', 'ozellik_id');
    }

    public function info(){
        return $this->hasOne('App\Info','urun_id');
    }

}
