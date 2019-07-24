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
                <h2>Profile peserta,</h2>
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
                                <p class="card-title">Foto peserta</p>
                               <img src="{{asset('/images/peserta/'.$peserta->user->foto)}}" alt="" width="100%">
                              </div>
                            </div>
                          </div>
                    <div class="col-md-8 grid-margin stretch-card">
                      <div class="card">
                            <div class="card-body">
                                    <h4 class="card-title">Biodata Peserta</h4>

                                    <div class="template-demo">
                                      <h4 class="card-title">Nama Peserta &nbsp;                    : {{$peserta->user->name}}</h4>
                                      <h4 class="card-title">Alamat &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;: {{$peserta->alamat}} </h4>
                                      <h4 class="card-title">No Telp &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;: {{$peserta->telepon}}</h4>
                                      <h4 class="card-title">Email &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; :  {{ $peserta->user->email }}</h4>
                                      <h4 class="card-title">Pekerjaan &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$peserta->pekerjaan}}</h4>
                                      @if($peserta->user->status==0)
                                      <h4 class="card-title">Status Akun &nbsp;&nbsp;  &nbsp; &nbsp;:  <label class="badge badge-danger">Akun Belum Aktif</label></h4>
                                      @else
                                      <h4 class="card-title">Status Akun  &nbsp;&nbsp; &nbsp; &nbsp;: <label class="badge badge-primary">Akun Aktif</label></h4>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="card-footer">
                                  <div class="text-right">
                                            <a href="{{ route('peserta-lelang-edit', ['id' => IDCrypt::Encrypt( $peserta->id)])}}" class="btn btn-inverse-info"><i class=" mdi mdi-printer "></i> Cetak data</a>
                                            <a href="{{ route('peserta-lelang-edit', ['id' => IDCrypt::Encrypt( $peserta->id)])}}" class="btn btn-inverse-primary"><i class=" mdi mdi-pencil "></i> Ubah data</a>
                                            <a href="{{ route('peserta-lelang-index') }}" class="btn btn-inverse-danger"><i class=" mdi mdi-arrow-left-thick "></i> Kembali</a>
                                       </div>
                                  </div>
                      </div>
                    </div>

                  </div>
      </div>
@endsection
