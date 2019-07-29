<?php

namespace App\Http\Controllers;

use IDCrypt;

use App\Kayu;
use App\Berita;
use App\Lelang;
use App\Hasil_lelang;

use Illuminate\Http\Request;
use App\Helpers\IDCryptHelper;

class welcomeController extends Controller
{
    public function index()
    {
        $berita = berita::all();
        // dd($berita);
        $lelang = lelang::where('status',1)->get();
        // dd($lelang);
        $kayu = kayu::all();
        $hasil_lelang = hasil_lelang::all();
        // dd($kayu);
        return view('welcome',compact('berita','lelang','kayu','hasil_lelang'));
    }
    public function hasil_lelang_detail($id)
    {
        $id = IDCrypt::Decrypt($id);
        // dd($id);
        $hasil_lelang = Hasil_lelang::where('lelang_id',$id)->get()->sortByDesc('bid_harga');
        $nama = Hasil_lelang::where('lelang_id',$id)->first();
        // $nama_lelang = $nama->lelang->nama;
        // dd($nama_lelang);
        return view('hasil_lelang_detail',compact('hasil_lelang','nama'));
    }

    public function berita_tampil($id)
    {
        $id = IDCrypt::Decrypt($id);
        $berita = Berita::findOrFail($id);
        // dd($nama_lelang);
        return view('berita_tampil',compact('berita'));
    }


}
