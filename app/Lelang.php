<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lelang extends Model
{
    public function kayu(){
        return $this->belongsTo('App\kayu', 'kayu_id');
      }
}
