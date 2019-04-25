<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Karyawan;
use IDCrypt;
use Auth;
use Hash;


class adminController extends Controller
{
    public function index(){

        return view('admin.index');
    }




    //fungsi karyawan

    public function karyawan_index(){
        $data = Karyawan::with('user')->get();
        return view('admin.karyawan_data', ['data' => $data]);
    }

// fungsi route karyawan tambah
    public function karyawan_tambah(){
        return view('admin.karyawan_tambah');
    }
// fungsi karyawan tambah
    public function karyawan_tambah_store(Request $request){

        $User           = new User;
        $User->name     = $request->name;
        $User->email    = $request->email;
        $Password       = Hash::make($request->password);
        $User->password = $Password;
        $User->role     = $request->role;
        $User->save();

        $id_user = $User->id;
        $karyawan = new karyawan;

        if($request->foto != null){
        $FotoExt  = $request->gambar->getClientOriginalExtension();
        $FotoName = $request->id_user.' - '.$request->nama_karyawan;
        $gambar   = $FotoName.'.'.$FotoExt;
        $request->gambar->move('images/karyawan', $gambar);
        $karyawan->gambar       = $gambar;
        }
        $karyawan->NIP          = $request->NIP;
        $karyawan->nama         = $request->nama;
        $karyawan->tempat_lahir = $request->tempat_lahir;
        $karyawan->alamat       = $request->alamat;
        $karyawan->tanggal_lahir= $request->tanggal_lahir;
        $karyawan->telepon      = $request->telepon;
        $karyawan->id_user      = $id_user;


        $karyawan->save();
       
          return redirect(route('karyawan_index'))->with('success', 'Data karyawan '.$request->nama.' Berhasil di Tambahkan');
      }//fungsi menambahkan data rambu

    public function karyawan_detail($id){
        $id = IDCrypt::Decrypt($id);
        $Karyawan = Karyawan::find($id);
        $User = User::find($Karyawan->id_user);
        return view('admin.karyawan_detail',compact('Karyawan','User'));
        // return view('admin.karyawan_detail', ['karyawan' => $Karyawan, 'user' => $User]);
    }//menampilkan halaman detail  karyawan

    public function karyawan_edit($id){
        $id = IDCrypt::Decrypt($id);
        $Karyawan = Karyawan::findOrFail($id);
        $User = User::find($Karyawan->id_user);

        // // return view('rambu.ubah_jenis_rambu',compact('jenis_rambu'));
        // $Karyawan = Karyawan::find($id);
        // $User = User::find($Karyawan->id_user);
        // // dd($User);
        return view('admin.karyawan_edit', ['karyawan' => $Karyawan, 'user' => $User]);
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

}
