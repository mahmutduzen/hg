<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FavoriUrun extends Model
{
    protected $table = "favoriurun";
    protected $guarded = [];

    public function urun(){
        return $this->hasOne('App\Urun','id','urun_id');
    }
}
