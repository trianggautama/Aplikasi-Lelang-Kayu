<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hasil_lelang extends Model
{
    public function peserta(){
        return $this->belongsTo('App\peserta');
      }

    public function lelang(){
        return $this->belongsTo('App\lelang');
      }
}
