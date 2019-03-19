<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etiket extends Model
{
    protected $table = "etiket";
    protected $guarded = [];

    public function sayfa(){
        return $this->belongsToMany('App\Sayfa','sayfaetiket', 'etiket_id', 'sayfa_id');
    }
}
