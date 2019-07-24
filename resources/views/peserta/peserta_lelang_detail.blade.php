@extends('layouts.peserta')
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
                                      <h4 class="card-title">Nama Peserta                    : {{$peserta->user->name}}</h4>
                                      <h4 class="card-title">Alamat                  : {{$peserta->alamat}} </h4>
                                      <h4 class="card-title">No Telp                 : {{$peserta->telepon}}</h4>
                                      <h4 class="card-title">Email                :  {{ $peserta->user->email }}</h4>
                                      <h4 class="card-title">Pekerjaan                :  {{ $peserta->pekerjaan }}</h4>
                                    </div>
                                  </div>
                                  <div class="card-footer">
                                  <div class="text-right">
                                            <a href="{{ route('peserta-edit', ['id' => IDCrypt::Encrypt( $peserta->id)])}}" class="btn btn-inverse-info"><i class=" mdi mdi-printer "></i> Cetak data</a>
                                            <a href="{{ route('peserta-edit', ['id' => IDCrypt::Encrypt( $peserta->id)])}}" class="btn btn-inverse-primary"><i class=" mdi mdi-pencil "></i> Ubah data</a>
                                            <a href="{{ route('peserta-index') }}" class="btn btn-inverse-danger"><i class=" mdi mdi-arrow-left-thick "></i> Kembali</a>
                                       </div>
                                  </div>
                      </div>
                    </div>

                  </div>
      </div>
@endsection
