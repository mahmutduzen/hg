<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ozellik extends Model
{
    protected $table = "ozellik";
    protected $guarded = [];

    public function urun(){
        return $this->belongsToMany('App\Urun','urunozellik', 'ozellik_id', 'urun_id');
    }

    public function secenek(){
        return $this->hasMany('App\Secenek','ozellik_id');
    }
}
