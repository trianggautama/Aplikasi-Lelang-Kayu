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
                            <h2>Detail Lelang,</h2>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-end flex-wrap">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body text-center">
                        <p class="card-title">Foto Lelang Kayu</p>
                        <img src="{{asset('/images/kayu/'.$kayu->foto)}}" alt="" width="330">
                    </div>
                </div>
            </div>
            <div class="col-md-7 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Detail Le;ang</h4>

                        <div class="template-demo">
                            <h4>Nama Lelang : {{$lelang->nama}}</h4>
                            <h4>Jenis Kayu : {{$kayu->nama_kayu}}</h4>
                            <h4>Tanggal Mulai : {{$lelang->tanggal_mulai}}</h4>
                            <h4>Tanggal Selesai : {{$lelang->tanggal_selesai}}</h4>
                            <h4>Tempat : {{$lelang->tempat}}</h4>
                            <h4>Harga Awal : {{$lelang->harga_awal}} </h4>
                            @if($lelang->status==1)
                            <h4>Status : <label class="badge badge-primary">Lelang Sedang Berlangsung</label></h4>
                            @else
                            <h4>Status : <label class="badge badge-primary">Lelang Sudah Selesai</label></h4>
                            @endif
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="text-right">
                            {{-- <a href="{{ route('lelang_edit') }}" class="btn btn-primary"> Ubah data</a> --}}
                            <a href="{{ route('lelang-edit', ['id' => IDCrypt::Encrypt( $lelang->id)])}}"
                                class="btn btn-primary"> Ubah data</a>
                            <a href="{{ route('lelang-index') }}" class="btn btn-danger"> Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
