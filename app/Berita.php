<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    public function karyawan(){
        return $this->belongsTo('App\karyawan');
    }
}
