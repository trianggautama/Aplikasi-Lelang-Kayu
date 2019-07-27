<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendapatan_lelang extends Model
{
    public function hasil_lelang(){
        return $this->belongsTo('App\hasil_lelang');
      }
}
