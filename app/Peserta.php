<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    public function user(){
        return $this->belongsTo('App\user');
      }

    public function hasil_lelang(){
        return $this->HasOne('App\hasil_lelang');
      }
}
