@extends('layouts.app')
@section('content')
  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
              <div class="mr-md-3 mr-xl-5">
                <h2>Detail Berita,</h2>
              </div>
            </div>
            <div class="d-flex justify-content-between align-items-end flex-wrap">
            </div>
          </div>
        </div>
      </div>
            <div class="row">
                    <div class="col-md-4 grid-margin stretch-card">
                            <div class="card">
                              <div class="card-body text-center">
                                <p class="card-title">Foto berita</p>
                               <img src="{{asset('/images/berita/'.$berita->foto)}}" alt="" width="100%">
                              </div>
                            </div>
                          </div>
                    <div class="col-md-8 grid-margin stretch-card">
                      <div class="card">
                            <div class="card-body">
                                    <h4 class="card-title">Detail Berita</h4>

                                    <div class="template-demo">
                                      <h4 class="card-title">Nama Penulis     : {{$berita->karyawan->user->name}}</h4>
                                      <h4 class="card-title">Judul            : {{$berita->judul}}</h4>
                                      <h4 class="card-title">Isi              : {{$berita->isi}}</h4>
                                      <h4 class="card-title">Tanggal Dibuat   : {{$berita->created_at}} </h4>
                                    </div>
                                  </div>
                                  <div class="card-footer">
                                  <div class="text-right">
                                            <a href="{{ route('berita-edit', ['id' => IDCrypt::Encrypt( $berita->id)])}}" class="btn btn-inverse-info"><i class=" mdi mdi-printer "></i> Cetak data</a>
                                            <a href="{{ route('berita-edit', ['id' => IDCrypt::Encrypt( $berita->id)])}}" class="btn btn-inverse-primary"><i class=" mdi mdi-pencil "></i> Ubah data</a>
                                            <a href="{{ route('berita-index') }}" class="btn btn-inverse-danger"><i class=" mdi mdi-arrow-left-thick "></i> Kembali</a>
                                       </div>
                                  </div>
                      </div>
                    </div>

                  </div>
      </div>
@endsection
