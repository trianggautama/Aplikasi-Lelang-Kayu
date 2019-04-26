<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index(){

        return view('admin.index');
    }




    //fungsi karyawan

    public function karyawan_index(){

        return view('admin.karyawan_data');
    }

    public function karyawan_detail( /* isi parameter id*/ ){


        return view('admin.karyawan_detail');
    }//menampilkan halaman detail  karyawan

    public function karyawan_edit( /* isi parameter id*/ ){


        return view('admin.karyawan_edit');
    }//menampilkan halaman edit  karyawan


    //fungsi kayu

    public function kayu_index(){

        return view('admin.kayu_data');
    }//halaman data kayu

    public function kayu_tambah( Request $request){


        return view('admin.kayu_data');
    }//tambah data kayu

    public function kayu_edit( /* isi parameter id*/ ){


        return view('admin.kayu_edit');
    }//menampilkan halaman edit  kayu

    //fungsi berita

    public function berita_index(){

        return view('admin.berita_data');
    }//halaman data Berita
}
