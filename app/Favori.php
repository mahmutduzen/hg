<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favori extends Model
{
    protected $table = "favori";
    protected $guarded = [];

    public function favoriurun(){
        return $this->hasMany('App\FavoriUrun','favori_id');
    }

}
