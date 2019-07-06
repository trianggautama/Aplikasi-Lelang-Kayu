<?php

namespace App\Http\Controllers;

use App\Kayu;
use App\Berita;
use App\Lelang;

use Illuminate\Http\Request;

class welcomeController extends Controller
{
    public function index()
    {
        $berita = berita::all();
        // dd($berita);
        $lelang = lelang::where('status',1)->get();
        // dd($lelang);
        $kayu = kayu::all();
        // dd($kayu);
        return view('welcome',compact('berita','lelang','kayu'));
    }
}
