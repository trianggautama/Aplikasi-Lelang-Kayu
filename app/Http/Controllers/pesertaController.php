<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pesertaController extends Controller
{

    public function index(){

        return view('peserta.index');
    }

    public function lelang_berlangsung(){

        return view('peserta.lelang_berlangsung ');
    }


}
