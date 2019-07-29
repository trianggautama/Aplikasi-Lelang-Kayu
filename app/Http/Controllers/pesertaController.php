<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\User;
use App\Lelang;
use App\Peserta;
use App\Hasil_lelang;
use App\Pendapatan_lelang;
use View;
use IDCrypt;
Use File;
use Auth;
use Hash;

class pesertaController extends Controller
{

    public function index(){
        $user_id = auth::user()->id;

        $peserta = Peserta::where('user_id',$user_id)->first();
        // $peserta = peserta::all()->pluck('user_id');
        // dd($peserta);
        return view('peserta.index',compact('user_id','peserta'));
    }

    // fungsi route peserta lelang tambah
    public function peserta_lelang_tambah(){
            return view('peserta.peserta_lelang_tambah');
    }

    // fungsi peserta tambah
    public function peserta_lelang_tambah_store(Request $request){

        $user_id = Auth::user()->id;
        $user = user::findOrfail($user_id);
        $peserta = new peserta;

        if ($request->foto != null) {
            $FotoExt  = $request->foto->getClientOriginalExtension();
            $FotoName = 'peserta'.$request->user_id.'-'. $request->name;
            $foto     = $FotoName.'.'.$FotoExt;
            $request->foto->move('images/peserta', $foto);
            $user->foto= $foto;
        }else {
            $user->foto = 'default.png';
          }

        $peserta->alamat       = $request->alamat;
        $peserta->telepon      = $request->telepon;
        $peserta->pekerjaan      = $request->pekerjaan;
        $peserta->user_id      = $user_id;

        $user->update();
        $peserta->save();

          return redirect(route('peserta-index'))->with('success', 'Data peserta '.$peserta->user->name.' Berhasil di Tambahkan');
      }//fungsi menambahkan data peserta

      public function peserta_lelang_detail($id){
        $id = IDCrypt::Decrypt($id);
        $peserta = peserta::find($id);
        // dd($peserta);

        return view('peserta.peserta_lelang_detail',compact('peserta'));
    }//menampilkan halaman detail  peserta

    public function peserta_lelang_edit($id){
        $id = IDCrypt::Decrypt($id);
        $peserta = peserta::findOrFail($id);
        return view::make('peserta.peserta_lelang_edit', compact('peserta'));
    }//menampilkan halaman edit  peserta

    public function peserta_lelang_update(Request $request, $id){
        $id = IDCrypt::Decrypt($id);
        $peserta = peserta::findOrFail($id);
        $user = auth::user();

        $user->name     = $request->name;
        $user->email    = $request->email;
        if($request->password != null){
            $Password       = Hash::make($request->password);
        }else{
            $Password = $user->password;
        }

        $user->password = $Password;

        if ($request->foto) {
            if ($user->foto != 'default.png') {
           // dd('foto dihapus');
              File::delete('images/peserta/'.$peserta->foto);
            }
            //dd('foto tidak dihapus');
            $FotoExt  = $request->foto->getClientOriginalExtension();
            $FotoName = 'peserta-'.$request->$id.'-'. $request->name;
            $foto     = $FotoName.'.'.$FotoExt;
            $request->foto->move('images/peserta', $foto);
            $user->foto= $foto;
          }

        $peserta->alamat       = $request->alamat;
        $peserta->telepon      = $request->telepon;
        $peserta->pekerjaan= $request->pekerjaan;
        $peserta->user_id          = $user->id;


        $user->update();
        $peserta->update();
        return redirect(route('peserta-index'))->with('success', 'Data peserta '.$request->name.' Berhasil di ubah');
         }

    public function lelang_berlangsung(){
        $lelang=lelang::where('status',1)->get();
        // dd($lelang);

        return view('peserta.lelang_berlangsung ',compact('lelang'));
    }

    public function lelang_proses($id){
        $id = IDCrypt::Decrypt($id);
        $peserta_id = auth::user()->peserta->id;
        $lelang = lelang::findOrFail($id);
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
        // dd($bid_tertinggi);
        // dd($value_hasil_lelang);
        if(isset($hasil_lelang)){
            $harga_bid = $bid_tertinggi+5000000;
        }else{
            $harga_bid = $lelang->harga_awal + 5000000;
        }

        // dd($peserta_id);
        $bid_peserta = Hasil_lelang::where('peserta_id',$peserta_id)->where('lelang_id',$id)->max('status_bid');

        // dd($bid_peserta);


        // dd($harga_bid);

        return view('peserta.lelang_proses ',compact('lelang','harga_bid','bid_tertinggi','bid_peserta','value_hasil_lelang'));
    }

    public function lelang_hasil_tambah(Request $request, $id){
        $id = IDCrypt::Decrypt($id);
        // dd($id);

        $user_id = Auth::user()->peserta->id;
        // dd($user_id);
        $user = User::findOrfail(Auth::User()->id);
        $peserta_id = $user->peserta->id;
        // dd($user);
        $count_hasil = Hasil_lelang::where('peserta_id',$peserta_id)->where('lelang_id',$id)->first();
        // $count_hasil = $user->peserta->hasil_lelang;
        // dd($count_hasil);

        // dd($peserta_id);
        if(isset($count_hasil)){
            // $count_bid = $count_hasil->max('status_bid');
            // dd($count_bid);
            $count_status_bid = Hasil_lelang::where('peserta_id',$peserta_id)->where('lelang_id',$id)->max('status_bid');
            // dd($count_status_bid);

            $hasil_lelang = new Hasil_lelang;
            // dd($hasil_lelang);

            $hasil_lelang->peserta_id = $user_id;
            $hasil_lelang->lelang_id = $id;
            $hasil_lelang->bid_harga = $request->bid_harga;
            $hasil_lelang->status_bid = $count_status_bid+1;

            $hasil_lelang->save();
        }else{
            $hasil_lelang = new Hasil_lelang;

            $hasil_lelang->peserta_id = $user_id;
            $hasil_lelang->lelang_id = $id;
            $hasil_lelang->bid_harga = $request->bid_harga;
            $hasil_lelang->status_bid = 1;

            $hasil_lelang->save();
        }


        $id = Crypt::encryptString($id);
        // $id = IDCrypt::crypt($id);
        return redirect()->route('lelang_proses', ['id' => $id]);

    }

    public function lelang_berlangsung_detail($id){
        $id = IDCrypt::Decrypt($id);
        $lelang = lelang::findOrFail($id)->sortByDesc();

        return view('peserta.lelang_detail',compact('lelang'));
    }

    public function riwayat_pemenang_lelang(){
        $pendapatan = Pendapatan_lelang::all()->sortByDesc('id');

        return view('peserta.riwayat_pemenang_lelang_data',compact('pendapatan'));
    }

    public function riwayat_lelang(){
        $peserta_id = Auth::user()->peserta->id;
        $hasil_lelang = hasil_lelang::where('peserta_id',$peserta_id)->get()->sortByDesc('bid_harga');

        return view('peserta.riwayat_pemenang_lelang_data',compact('hasil_lelang'));
    }

    public function form_lelang(){

        return view('peserta.form_lelang');
    }


}
