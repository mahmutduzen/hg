<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = "slider";
    protected $guarded = [];

    public function dosya(){
        return $this->hasOne('App\Dosya','id','dosya_id');
    }
}
