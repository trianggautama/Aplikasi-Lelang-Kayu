<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Karyawan;
use IDCrypt;
Use File;
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

        $user_id = $User->id;
        $Karyawan = new Karyawan;

        if ($request->gambar) {
            $FotoExt  = $request->gambar->getClientOriginalExtension();
            $FotoName = 'karyawan'.$request->user_id.'-'. $request->name;
            $gambar     = $FotoName.'.'.$FotoExt;
            $request->gambar->move('images/karyawan', $gambar);
            $Karyawan->gambar= $gambar;
        }else {
            $Karyawan->gambar = 'default.png';
          }
        // if ($request->gambar != "") {
        //     $FotoExt  = $request->gambar->getClientOriginalExtension();
        //     $FotoName = $request->user_id.' - '.$request->name;
        //     $gambar     = $FotoName.'.'.$FotoExt;
        //     $request->gambar->move('images/karyawan', $gambar);
        //     $Karyawan->gambar= $gambar;
        // }else {
        //     $Karyawan->gambar = 'default.png';
        //   }

        $Karyawan->NIP          = $request->NIP;
        $Karyawan->nama         = $request->nama;
        $Karyawan->tempat_lahir = $request->tempat_lahir;
        $Karyawan->alamat       = $request->alamat;
        $Karyawan->tanggal_lahir= $request->tanggal_lahir;
        $Karyawan->telepon      = $request->telepon;
        $Karyawan->status      = $request->status;
        $Karyawan->user_id      = $user_id;


        $Karyawan->save();

          return redirect(route('karyawan-index'))->with('success', 'Data karyawan '.$request->nama.' Berhasil di Tambahkan');
      }//fungsi menambahkan data rambu

    public function karyawan_detail($id){
        $id = IDCrypt::Decrypt($id);
        $Karyawan = Karyawan::find($id);
        $User = User::find($Karyawan->user_id);

        return view('admin.karyawan_detail',compact('Karyawan','User'));
    }//menampilkan halaman detail  karyawan

    public function karyawan_edit($id){
        $id = IDCrypt::Decrypt($id);
        $Karyawan = Karyawan::findOrFail($id);
        $User = User::find($Karyawan->user_id);
        return view('admin.karyawan_edit', compact('Karyawan','User'));
    }//menampilkan halaman edit  karyawan

    public function karyawan_update(Request $request, $id){
        $id = IDCrypt::Decrypt($id);
        $Karyawan = Karyawan::findOrFail($id);
        $User = User::find($Karyawan->user_id);

        $User->name     = $request->name;
        $User->email    = $request->email;
        $Password       = Hash::make($request->password);
        $User->password = $Password;

        if ($request->gambar) {
            if ($Karyawan->gambar != 'default.png') {
           // dd('gambar dihapus');
              File::delete('images/karyawan/'.$Karyawan->gambar);
            }
            //dd('gambar tidak dihapus');
            $FotoExt  = $request->gambar->getClientOriginalExtension();
            $FotoName = 'karyawan-'.$request->$id.'-'. $request->name;
            $gambar     = $FotoName.'.'.$FotoExt;
            $request->gambar->move('images/karyawan', $gambar);
            $Karyawan->gambar= $gambar;
          }
        $Karyawan->NIP          = $request->NIP;
        $Karyawan->nama         = $request->nama;
        $Karyawan->tempat_lahir = $request->tempat_lahir;
        $Karyawan->alamat       = $request->alamat;
        $Karyawan->tanggal_lahir= $request->tanggal_lahir;
        $Karyawan->status          = $request->status;
        $Karyawan->telepon      = $request->telepon;

        $User->update();
        $Karyawan->update();
        return redirect(route('karyawan-index'))->with('success', 'Data Karyawan '.$request->nama.' Berhasil di ubah');
         }

        public function karyawan_hapus($id){
        $id = IDCrypt::Decrypt($id);
        $karyawan=karyawan::findOrFail($id);
        File::delete('images/karyawan/'.$karyawan->gambar);
        $karyawan->delete();

        return redirect(route('karyawan-index'))->with('success', 'Data karyawan Berhasil di hapus');
    }//fungsi menghapus data rambu

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

    public function berita_tambah(){

        return view('admin.berita_tambah');
    }//halaman Tambah Berita
}
