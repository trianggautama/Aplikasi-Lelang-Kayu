<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Peserta;
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
        $peserta = new peserta;

        if ($request->foto) {
            $FotoExt  = $request->foto->getClientOriginalExtension();
            $FotoName = 'peserta'.$request->user_id.'-'. $request->name;
            $foto     = $FotoName.'.'.$FotoExt;
            $request->foto->move('images/peserta', $foto);
            $peserta->foto= $foto;
        }else {
            $peserta->foto = 'default.png';
          }

        $peserta->alamat       = $request->alamat;
        $peserta->telepon      = $request->telepon;
        $peserta->pekerjaan      = $request->pekerjaan;
        $peserta->user_id      = $user_id;


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
        $Password       = Hash::make($request->password);
        $user->password = $Password;

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
        
        $peserta->alamat       = $request->alamat;
        $peserta->telepon      = $request->telepon;
        $peserta->pekerjaan= $request->pekerjaan;
        $peserta->user_id          = $user->id;
        

        $user->update();
        $peserta->update();
        return redirect(route('peserta-index'))->with('success', 'Data peserta '.$request->name.' Berhasil di ubah');
         }

    public function lelang_berlangsung(){

        return view('peserta.lelang_berlangsung ');
    }

    public function lelang_berlangsung_detail(){

        return view('peserta.lelang_detail');
    }

    public function form_lelang(){

        return view('peserta.form_lelang');
    }


}
