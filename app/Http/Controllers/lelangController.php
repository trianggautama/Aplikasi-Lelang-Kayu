<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class lelangController extends Controller
{
    //fungsi lelang
    public function lelang_index(){

        return view('admin.lelang_data');
    } // menampilkan data  lelang



    // fungsi peserta lelang

    public function peserta_lelang_index(){

        return view('admin.peserta_lelang_data');
    } // menampilkan data peserta lelang

}
