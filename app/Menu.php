<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = "menu";
    protected $guarded = [];

    public function sayfa(){
        return $this->hasOne('App\Sayfa','id','sayfa_id');
    }

    public function anaMenu(){
        return $this->belongsTo('App\Menu','id');
    }

    public function altMenu(){
        return $this->hasMany('App\Menu','ust_id','id');
    }
}
