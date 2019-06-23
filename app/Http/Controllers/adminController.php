<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Kayu;
use App\Lelang;
use App\Berita;
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
      }//fungsi menambahkan data karyawan

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
    }//fungsi menghapus data karyawan

    //fungsi kayu
    public function kayu_index(){
        $kayu = kayu::all();
        return view('admin.kayu_data',compact('kayu'));
    }

// fungsi kayu tambah
    public function kayu_tambah_store(Request $request){

        $kayu = new kayu;

        if ($request->foto) {
            $FotoExt  = $request->foto->getClientOriginalExtension();
            $FotoName = 'kayu-'. $request->nama_kayu;
            $foto     = $FotoName.'.'.$FotoExt;
            $request->foto->move('images/kayu', $foto);
            $kayu->foto= $foto;
        }else {
            $kayu->foto = 'default.png';
          }
        $kayu->nama_kayu  = $request->nama_kayu;
        $kayu->keterangan = $request->keterangan;


        $kayu->save();

          return redirect(route('kayu-index'))->with('success', 'Data kayu '.$request->nama_kayu.' Berhasil di Tambahkan');
      }//fungsi menambahkan data kayu

    public function kayu_detail($id){
        $id = IDCrypt::Decrypt($id);
        $kayu = kayu::find($id);

        return view('admin.kayu_detail',compact('kayu'));
    }//menampilkan halaman detail  kayu

    public function kayu_edit($id){
        $id = IDCrypt::Decrypt($id);
        $kayu = kayu::findOrFail($id);
        return view('admin.kayu_edit', compact('kayu'));
    }//menampilkan halaman edit  kayu

    public function kayu_update(Request $request, $id){
        $id = IDCrypt::Decrypt($id);
        $kayu = kayu::findOrFail($id);

        if ($request->foto) {
            if ($kayu->foto != 'default.png') {
           // dd('foto dihapus');
              File::delete('images/kayu/'.$kayu->foto);
            }
            //dd('foto tidak dihapus');
            $FotoExt  = $request->foto->getClientOriginalExtension();
            $FotoName = 'kayu-'. $request->nama_kayu;
            $foto     = $FotoName.'.'.$FotoExt;
            $request->foto->move('images/kayu', $foto);
            $kayu->foto= $foto;
          }
        $kayu->nama_kayu          = $request->nama_kayu;
        $kayu->keterangan         = $request->keterangan;

        $kayu->update();
        return redirect(route('kayu-index'))->with('success', 'Data kayu '.$request->nama.' Berhasil di ubah');
         }

        public function kayu_hapus($id){
        $id = IDCrypt::Decrypt($id);
        $kayu=kayu::findOrFail($id);
        File::delete('images/kayu/'.$kayu->gambar);
        $kayu->delete();

        return redirect(route('kayu-index'))->with('success', 'Data kayu Berhasil di hapus');
    }//fungsi menghapus data kayu

    //fungsi lelang
    public function lelang_index(){
        $lelang = lelang::all();
        return view('admin.lelang_data',compact('lelang'));
    }

    public function lelang_tambah(){
        $kayu = kayu::all();
        return view('admin.lelang_tambah',compact('kayu'));
    }

// fungsi lelang tambah
    public function lelang_tambah_store(Request $request){

        $lelang = new lelang;

        $lelang->nama  = $request->nama;
        $lelang->tanggal_mulai  = $request->tanggal_mulai;
        $lelang->tempat  = $request->tempat;
        $lelang->harga_awal  = $request->harga_awal;
        $lelang->kayu_id  = $request->kayu_id;
        $status=1;
        $lelang->status = $status;


        $lelang->save();

          return redirect(route('lelang-index'))->with('success', 'Data lelang '.$request->nama_lelang.' Berhasil di Tambahkan');
      }//fungsi menambahkan data lelang

    public function lelang_detail($id){
        $id = IDCrypt::Decrypt($id);
        $lelang = lelang::find($id);
        $kayu = kayu::find($lelang->kayu_id);

        return view('admin.lelang_detail',compact('lelang','kayu'));
    }//menampilkan halaman detail  lelang

    public function lelang_edit($id){
        $id = IDCrypt::Decrypt($id);
        $lelang = lelang::findOrFail($id);
        $kayu = kayu::all();
        return view('admin.lelang_edit', compact('lelang','kayu'));
    }//menampilkan halaman edit  lelang

    public function lelang_update(Request $request, $id){
        $id = IDCrypt::Decrypt($id);
        $lelang = lelang::findOrFail($id);

        $lelang->nama  = $request->nama;
        $lelang->tanggal_mulai  = $request->tanggal_mulai;
        $lelang->tempat  = $request->tempat;
        $lelang->harga_awal  = $request->harga_awal;
        $lelang->kayu_id  = $request->kayu_id;
        $status=1;
        $lelang->status = $status;

        $lelang->update();
        return redirect(route('lelang-index'))->with('success', 'Data lelang '.$request->nama.' Berhasil di ubah');
         }

        public function lelang_hapus($id){
        $id = IDCrypt::Decrypt($id);
        $lelang=lelang::findOrFail($id);
        $lelang->delete();

        return redirect(route('lelang-index'))->with('success', 'Data lelang Berhasil di hapus');
    }//fungsi menghapus data lelang

    //fungsi berita
    public function berita_index(){
        $berita = berita::all();
        return view('admin.berita_data',compact('berita'));
    }

    public function berita_tambah(){
        $kayu = kayu::all();
        return view('admin.berita_tambah',compact('kayu'));
    }

// fungsi berita tambah
    public function berita_tambah_store(Request $request){

        $berita = new berita;

        $berita->nama  = $request->nama;
        $berita->tanggal_mulai  = $request->tanggal_mulai;
        $berita->tempat  = $request->tempat;
        $berita->harga_awal  = $request->harga_awal;
        $berita->kayu_id  = $request->kayu_id;
        $status=1;
        $berita->status = $status;


        $berita->save();

          return redirect(route('berita-index'))->with('success', 'Data berita '.$request->nama_berita.' Berhasil di Tambahkan');
      }//fungsi menambahkan data berita

    public function berita_detail($id){
        $id = IDCrypt::Decrypt($id);
        $berita = berita::find($id);
        $kayu = kayu::find($berita->kayu_id);

        return view('admin.berita_detail',compact('berita','kayu'));
    }//menampilkan halaman detail  berita

    public function berita_edit($id){
        $id = IDCrypt::Decrypt($id);
        $berita = berita::findOrFail($id);
        $kayu = kayu::all();
        return view('admin.berita_edit', compact('berita','kayu'));
    }//menampilkan halaman edit  berita

    public function berita_update(Request $request, $id){
        $id = IDCrypt::Decrypt($id);
        $berita = berita::findOrFail($id);

        $berita->nama  = $request->nama;
        $berita->tanggal_mulai  = $request->tanggal_mulai;
        $berita->tempat  = $request->tempat;
        $berita->harga_awal  = $request->harga_awal;
        $berita->kayu_id  = $request->kayu_id;
        $status=1;
        $berita->status = $status;

        $berita->update();
        return redirect(route('berita-index'))->with('success', 'Data berita '.$request->nama.' Berhasil di ubah');
         }

        public function berita_hapus($id){
        $id = IDCrypt::Decrypt($id);
        $berita=berita::findOrFail($id);
        $berita->delete();

        return redirect(route('berita-index'))->with('success', 'Data berita Berhasil di hapus');
    }//fungsi menghapus data berita
}
