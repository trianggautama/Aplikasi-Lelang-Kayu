<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Kayu;
use App\Lelang;
use App\Berita;
use App\Peserta;
use App\Karyawan;
use App\Hasil_lelang;
use App\Pendapatan_lelang;

use Carbon\Carbon;
use IDCrypt;
Use File;
use Auth;
use Hash;
use PDF;

class adminController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

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
        if ($request->foto) {
            $FotoExt  = $request->foto->getClientOriginalExtension();
            $FotoName = 'karyawan'.$request->user_id.'-'. $request->name;
            $foto     = $FotoName.'.'.$FotoExt;
            $request->foto->move('images/karyawan', $foto);
            $User->foto= $foto;
        }else {
            $User->foto = 'default.png';
          }
        $User->save();

        $user_id = $User->id;
        $Karyawan = new Karyawan;

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
        $Karyawan->tempat_lahir = $request->tempat_lahir;
        $Karyawan->alamat       = $request->alamat;
        $Karyawan->tanggal_lahir= $request->tanggal_lahir;
        $Karyawan->telepon      = $request->telepon;
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
        if($request->password!=null){
            $Password       = Hash::make($request->password);
        }else{
            $Password = $User->password;
        }

        $User->password = $Password;

        if ($request->foto !=null) {
            if ($User->foto != 'default.png') {
           // dd('foto dihapus');
              File::delete('images/karyawan/'.$User->foto);
            }
            //dd('foto tidak dihapus');
            $FotoExt  = $request->foto->getClientOriginalExtension();
            $FotoName = 'karyawan-'.$request->$id.'-'. $request->name;
            $foto     = $FotoName.'.'.$FotoExt;
            $request->foto->move('images/karyawan', $foto);
            $User->foto= $foto;
          }
        $Karyawan->NIP          = $request->NIP;
        $Karyawan->tempat_lahir = $request->tempat_lahir;
        $Karyawan->alamat       = $request->alamat;
        $Karyawan->tanggal_lahir= $request->tanggal_lahir;
        $Karyawan->telepon      = $request->telepon;

        $User->update();
        $Karyawan->update();
        return redirect(route('karyawan-index'))->with('success', 'Data Karyawan '.$request->nama.' Berhasil di ubah');
         }

        public function karyawan_hapus($id){
        $id = IDCrypt::Decrypt($id);
        $karyawan=karyawan::findOrFail($id);
        if($karyawan->gambar != 'default.png'){
            File::delete('images/karyawan/'.$karyawan->gambar);
            $karyawan->delete();
        }else{
            $karyawan->delete();
        }

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
        if($kayu->foto != 'default.png'){
            File::delete('images/kayu/'.$kayu->foto);
            $kayu->delete();
        }else{
            $kayu->delete();
        }

        return redirect(route('kayu-index'))->with('success', 'Data kayu Berhasil di hapus');
    }//fungsi menghapus data kayu

    //fungsi lelang
    public function lelang_index(){
        $lelang = lelang::all()->sortByDesc('id');
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
        $lelang->tanggal_selesai  = $request->tanggal_selesai;
        $lelang->tempat  = $request->tempat;
        $lelang->harga_awal  = $request->harga_awal;
        $lelang->kayu_id  = $request->kayu_id;
        $status=1;
        $lelang->status = $status;


        $lelang->save();

          return redirect(route('lelang-index'))->with('success', 'Data lelang '.$request->nama.' Berhasil di Tambahkan');
      }//fungsi menambahkan data lelang

    public function lelang_detail($id){
        $id = IDCrypt::Decrypt($id);
        $lelang = lelang::findOrFail($id);
        $kayu = kayu::find($lelang->kayu_id);
        // dd($lelang->harga_awal);
        $hasil_lelang = hasil_lelang::where('lelang_id',$id)->first();
        // dd($hasil_lelang);
        if(isset($hasil_lelang)){
            $bid_tertinggi = hasil_lelang::where('lelang_id',$id)->max('bid_harga');
            // dd($bid_tertinggi);

        }else{
            $bid_tertinggi = $lelang->harga_awal;
            // $value_hasil_lelang = hasil_lelang::where('peserta_id',$peserta_id)->where('lelang_id',$id)->get()->sortByDesc('bid_harga');
        }

        $value_hasil_lelang = hasil_lelang::where('lelang_id',$id)->where('lelang_id',$id)->get()->sortByDesc('bid_harga');


        // dd($peserta_id);

        return view('admin.lelang_detail',compact('lelang','kayu','hasil_lelang','bid_tertinggi','value_hasil_lelang'));
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
        $lelang->tanggal_selesai  = $request->tanggal_selesai;
        $lelang->tempat  = $request->tempat;
        $lelang->harga_awal  = $request->harga_awal;
        $lelang->kayu_id  = $request->kayu_id;
        $lelang->status = $request->status;

        if($request->status==2){
        $pendapatan = new Pendapatan_lelang;
        $pendapatan->hasil_lelang_id = $lelang->hasil_lelang->id;
        $pendapatan->pendapatan = $lelang->hasil_lelang->bid_harga;
        // $tes = $lelang->hasil_lelang->id;
        // dd($tes);
        $pendapatan->save();
        }
        $lelang->update();
        return redirect(route('lelang-index'))->with('success', 'Data lelang '.$request->nama.' Berhasil di ubah');
         }

        public function lelang_hapus($id){
        $id = IDCrypt::Decrypt($id);
        $lelang=lelang::findOrFail($id);
        $lelang->delete();

        return redirect(route('lelang-index'))->with('success', 'Data lelang Berhasil di hapus');
    }//fungsi menghapus data lelang

    public function lelang_filter_status(){

        return view('admin.lelang_filter_status');
    }//fungsi filter lelang status


    public function lelang_status_cetak(Request $Request){

        $status = $Request->status;
        // dd($status);

        $lelang =lelang::where('status',$status)->get();
        $statusp =lelang::where('status',$status)->first();

        $tgl= Carbon::now()->format('d-m-Y');

        $pdf =PDF::loadView('laporan.lelang_berdasarkan_status', ['lelang' => $lelang,'tgl'=>$tgl,'statusp'=>$statusp]);
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('Laporan lelang berdasarkan status.pdf');
    }

    public function lelang_filter_periode(){

        return view('admin.lelang_filter_periode');
    }//fungsi filter lelang periode

    public function lelang_periode_cetak(Request $request){

        $periode = carbon::parse($request->tanggal_mulai);
        $bulan = carbon::parse($request->tanggal_mulai)->format('F');
        // dd($periode);
        // $bulan = $request->tanggal_mulai;
        $lelang =lelang::whereMonth('tanggal_mulai',$periode)->get();
        $tgl= Carbon::now()->format('d-m-Y');

        $pdf =PDF::loadView('laporan.lelang_berdasarkan_periode', ['bulan'=> $bulan,'lelang' => $lelang,'tgl'=>$tgl]);
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('Laporan Lelang berdasarkan periode.pdf');
    }

    public function pemenang_lelang(){
        $pendapatan = Pendapatan_lelang::all()->sortByDesc('id');

        return view('admin.pemenang_lelang_data',compact('pendapatan'));
    }//fungsi pemenang lelang

    public function pendapatan_cetak(){
        // $permohonan_kalibrasi=permohonan_kalibrasi::all();
            // $pejabat =pejabat::where('jabatan','Kepala Dinas')->get();
            $pendapatan = Pendapatan_lelang::all();
            $tgl= Carbon::now()->format('d F Y');
            $pdf =PDF::loadView('laporan.pendapatan_keseluruhan', ['tgl'=>$tgl,'pendapatan'=>$pendapatan]);
            $pdf->setPaper('a4', 'potrait');
            return $pdf->stream('Data Berita Keseluruhan.pdf');
        }//mencetak  data karyawan}

    public function pendapatan_periode_cetak(Request $request){

        $periode = carbon::parse($request->created_at);
        $bulan = carbon::parse($request->created_at)->format('F');
        // dd($periode);
        // $bulan = $request->created_at;
        $pendapatan =Pendapatan_lelang::whereMonth('created_at',$periode)->get();
        $total =  $pendapatan->sum('pendapatan');
        // dd($total);
        $tgl= Carbon::now()->format('d-m-Y');

        $pdf =PDF::loadView('laporan.pendapatan_berdasarkan_periode', ['bulan'=> $bulan,'pendapatan' => $pendapatan,'tgl'=>$tgl,'total'=>$total]);
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('Laporan pendapatan berdasarkan periode.pdf');
    }

    public function pemenang_lelang_filter_cetak(){

        return view('admin.pemenang_lelang_filter');
    }//fungsi pemenang lelang filter

    //fungsi berita
    public function berita_index(){
        $berita = berita::all()->sortByDesc('id');
        return view('admin.berita_data',compact('berita'));
    }

    public function berita_tambah(){
        return view('admin.berita_tambah');
    }

// fungsi berita tambah
    public function berita_tambah_store(Request $request){

        $berita = new berita;
        $path     = str_replace("?", "", $request->judul);
    	$path     = explode(" ", $path);
        $path     = implode("-", $path);

        $id     = Auth::user()->id;

        if ($request->foto) {
            $FotoExt  = $request->foto->getClientOriginalExtension();
            $FotoName = 'berita-'. $request->judul;
            $foto     = $FotoName.'.'.$FotoExt;
            $request->foto->move('images/berita', $foto);
            $berita->foto= $foto;
        }else {
            $berita->foto = 'default.png';
          }

        $berita->karyawan_id  = $id;
        $berita->judul  = $request->judul;
        $berita->isi  = $request->isi;
        $berita->path  = $path;


        $berita->save();

          return redirect(route('berita-index'))->with('success', 'Data berita '.$request->judul.' Berhasil di Tambahkan');
      }//fungsi menambahkan data berita

    public function berita_detail($id){
        $id = IDCrypt::Decrypt($id);
        $berita = berita::find($id);
        // $kayu = kayu::find($berita->kayu_id);

        return view('admin.berita_detail',compact('berita'));
    }//menampilkan halaman detail  berita

    public function berita_edit($id){
        $id = IDCrypt::Decrypt($id);
        $berita = berita::findOrFail($id);
        // $kayu = kayu::all();
        return view('admin.berita_edit', compact('berita'));
    }//menampilkan halaman edit  berita

    public function berita_update(Request $request, $id){
        $id = IDCrypt::Decrypt($id);
        $berita = berita::findOrFail($id);

        $path     = str_replace("?", "", $request->judul);
    	$path     = explode(" ", $path);
        $path     = implode("-", $path);

        $karyawan_id     = Auth::user()->id;

        if ($request->foto) {
            if ($berita->foto != 'default.png') {
           // dd('foto dihapus');
              File::delete('images/berita/'.$berita->foto);
            }
            //dd('foto tidak dihapus');
            $FotoExt  = $request->foto->getClientOriginalExtension();
            $FotoName = 'berita-'. $request->judul;
            $foto     = $FotoName.'.'.$FotoExt;
            $request->foto->move('images/berita', $foto);
            $berita->foto= $foto;
          }

        $berita->karyawan_id  = $karyawan_id;
        $berita->judul  = $request->judul;
        $berita->isi  = $request->isi;
        $berita->path  = $path;

        $berita->update();
        return redirect(route('berita-index'))->with('success', 'Data berita '.$request->judul.' Berhasil di ubah');
         }

        public function berita_hapus($id){
        $id = IDCrypt::Decrypt($id);
        $berita=berita::findOrFail($id);
        if($berita->foto != 'default.png'){
            File::delete('images/berita/'.$berita->foto);
            $berita->delete();
        }else{
            $berita->delete();
        }

        return redirect(route('berita-index'))->with('success', 'Data berita Berhasil di hapus');
    }//fungsi menghapus data berita

    public function berita_cetak_periode(){

        return view('admin.berita_filter_periode');
    }//menampilkan halaman edit  berita

    //fungsi peserta
    public function peserta_lelang_index(){
        $data = peserta::with('user')->get();
        return view('admin.peserta_lelang_data', ['data' => $data]);
    }

    public function status_update(Request $request, $id){
        $id = IDCrypt::Decrypt($id);
        $user = user::findOrFail($id);


        $user->status       = $request->status;

        $user->update();
        return redirect(route('peserta-lelang-index'))->with('success', 'Data status '.$request->name.' Berhasil di ubah');
         }

// fungsi route peserta tambah
    public function peserta_lelang_tambah(){
        return view('admin.peserta_lelang_tambah');
    }
// fungsi peserta tambah
    public function peserta_lelang_tambah_store(Request $request){

        $User           = new User;
        $User->name     = $request->name;
        $User->email    = $request->email;
        $Password       = Hash::make($request->password);
        $User->password = $Password;
        $User->role     = $request->role;
        if ($request->foto!= null) {
            $FotoExt  = $request->foto->getClientOriginalExtension();
            $FotoName = 'peserta'.$request->user_id.'-'. $request->name;
            $foto     = $FotoName.'.'.$FotoExt;
            $request->foto->move('images/peserta', $foto);
            $User->foto= $foto;
        }else {
            $User->foto = 'default.png';
          }
        $User->save();

        $user_id = $User->id;
        $peserta = new peserta;



        $peserta->alamat          = $request->alamat;
        $peserta->telepon         = $request->telepon;
        $peserta->pekerjaan = $request->pekerjaan;
        $peserta->user_id      = $user_id;


        $peserta->save();

          return redirect(route('peserta-lelang-index'))->with('success', 'Data peserta '.$request->name.' Berhasil di Tambahkan');
      }//fungsi menambahkan data peserta

    public function peserta_lelang_detail($id){
        $id = IDCrypt::Decrypt($id);
        $peserta = peserta::find($id);

        return view('admin.peserta_lelang_detail',compact('peserta'));
    }//menampilkan halaman detail  peserta

    public function peserta_lelang_edit($id){
        $id = IDCrypt::Decrypt($id);
        $peserta = peserta::findOrFail($id);
        return view('admin.peserta_lelang_edit', compact('peserta'));
    }//menampilkan halaman edit  peserta

    public function peserta_lelang_update(Request $request, $id){
        $id = IDCrypt::Decrypt($id);
        $peserta = peserta::findOrFail($id);
        $User = User::find($peserta->user_id);

        $User->name     = $request->name;
        $User->email    = $request->email;
        $Password       = Hash::make($request->password);
        $User->password = $Password;

        if ($request->foto) {
            if ($peserta->foto != 'default.png') {
           // dd('foto dihapus');
              File::delete('images/peserta/'.$peserta->foto);
            }
            //dd('foto tidak dihapus');
            $FotoExt  = $request->foto->getClientOriginalExtension();
            $FotoName = 'peserta-'.$request->$id.'-'. $request->name;
            $foto     = $FotoName.'.'.$FotoExt;
            $request->foto->move('images/peserta', $foto);
            $peserta->foto= $foto;
          }

        $peserta->alamat        = $request->alamat;
        $peserta->telepon       = $request->telepon;
        $peserta->pekerjaan     = $request->pekerjaan;

        $User->update();
        $peserta->update();
        return redirect(route('peserta-lelang-index'))->with('success', 'Data peserta '.$request->name.' Berhasil di ubah');
         }

        public function peserta_lelang_hapus($id){
        $id = IDCrypt::Decrypt($id);
        $peserta=peserta::findOrFail($id);
        if($peserta->foto != 'default.png'){
            File::delete('images/peserta/'.$peserta->foto);
            $peserta->delete();
        }else{
            $peserta->delete();
        }

        return redirect(route('peserta-lelang-index'))->with('success', 'Data peserta Berhasil di hapus');
    }//fungsi menghapus data peserta

    public function karyawan_cetak(){
       // $permohonan_kalibrasi=permohonan_kalibrasi::all();
        // $pejabat =pejabat::where('jabatan','Kepala Dinas')->get();
        $karyawan = Karyawan::all();
        $tgl= Carbon::now()->format('d F Y');
        $pdf =PDF::loadView('laporan.karyawan_keseluruhan', ['tgl'=>$tgl,'karyawan'=>$karyawan]);
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('Karyawan Keseluruhan.pdf');
       }//mencetak  data karyawan

    public function lelang_cetak(){
        // $permohonan_kalibrasi=permohonan_kalibrasi::all();
            // $pejabat =pejabat::where('jabatan','Kepala Dinas')->get();
            $lelang = lelang::all();
            $tgl= Carbon::now()->format('d F Y');
            $pdf =PDF::loadView('laporan.lelang_keseluruhan', ['tgl'=>$tgl,'lelang'=>$lelang]);
            $pdf->setPaper('a4', 'potrait');
            return $pdf->stream('Data lelang Keseluruhan.pdf');
        }//mencetak  data karyawan}

    public function kayu_cetak(){
        // $permohonan_kalibrasi=permohonan_kalibrasi::all();
         // $pejabat =pejabat::where('jabatan','Kepala Dinas')->get();
         $kayu = kayu::all();
         $tgl= Carbon::now()->format('d F Y');
         $pdf =PDF::loadView('laporan.kayu', ['tgl'=>$tgl,'kayu'=>$kayu]);
         $pdf->setPaper('a4', 'potrait');
         return $pdf->stream('Data Kayu.pdf');
        }//mencetak  data karyawan

    public function peserta_lelang_cetak(){
        // $permohonan_kalibrasi=permohonan_kalibrasi::all();
            // $pejabat =pejabat::where('jabatan','Kepala Dinas')->get();
            $peserta = peserta::all();
            $tgl= Carbon::now()->format('d F Y');
            $pdf =PDF::loadView('laporan.peserta_lelang_keseluruhan', ['tgl'=>$tgl,'peserta'=>$peserta]);
            $pdf->setPaper('a4', 'potrait');
            return $pdf->stream('Data Peserta Lelang.pdf');
        }//mencetak  data karyawan}

    public function berita_cetak(){
        // $permohonan_kalibrasi=permohonan_kalibrasi::all();
            // $pejabat =pejabat::where('jabatan','Kepala Dinas')->get();
            $berita = berita::all();
            $tgl= Carbon::now()->format('d F Y');
            $pdf =PDF::loadView('laporan.berita_keseluruhan', ['tgl'=>$tgl,'berita'=>$berita]);
            $pdf->setPaper('a4', 'potrait');
            return $pdf->stream('Data Berita Keseluruhan.pdf');
        }//mencetak  data karyawan}

    public function berita_periode_cetak(Request $request){

        $periode = carbon::parse($request->created_at);
        $bulan = carbon::parse($request->created_at)->format('F');
        // dd($periode);
        // $bulan = $request->tanggal_mulai;
        $berita =berita::whereMonth('created_at',$periode)->get();
        $tgl= Carbon::now()->format('d-m-Y');

        $pdf =PDF::loadView('laporan.berita_berdasarkan_periode', ['bulan'=> $bulan,'berita' => $berita,'tgl'=>$tgl]);
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('Laporan berita berdasarkan periode.pdf');
    }
}


