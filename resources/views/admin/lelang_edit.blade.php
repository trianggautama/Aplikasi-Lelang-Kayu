@extends('layouts.app')
@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Data Lelang</h4>
                        <p class="card-description">
                            <hr>
                        </p>
                        <form method="post" action="" enctype="multipart/form-data">
                            {{method_field('PUT') }}
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="exampleInputUsername1">Nama Lelang </label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lelang"
                                    value="{{ $lelang->nama}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Tanggal Mulai</label>
                                <input type="date" class="form-control" name="tanggal_mulai" id="tanggal_mulai"
                                    value="{{ $lelang->tanggal_mulai}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Tanggal Selesai</label>
                                <input type="date" class="form-control" name="tanggal_selesai" id="tanggal_selesai"
                                    value="{{ $lelang->tanggal_selesai}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Tempat </label>
                                <input type="text" class="form-control" name="tempat" id="tempat" placeholder="Tempat"
                                    value="{{ $lelang->tempat}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Harga Awal</label>
                                <input type="text" class="form-control" name="harga_awal" id="harga_awal"
                                    placeholder="Harga Awal" value="{{ $lelang->harga_awal}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectGender">Jenis Kayu</label>
                                <select class="form-control" name="kayu_id">
                                    @foreach ($kayu as $j)
                                    <option value="{{ $j->id}}" {{ $lelang->kayu_id == $j->id ? 'selected' : ''}}>
                                        {{$j->nama_kayu}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectGender">Status</label>
                                <select class="form-control" name="status">)
                                    <option value="1" {{ $lelang->status == 1 ? 'selected' : ''}}>
                                        Lelang Sedang Berlangsung</option>
                                    <option value="2" {{ $lelang->status == 2 ? 'selected' : ''}}>
                                        Lelang Sudah Selesai</option>
                                </select>
                            </div>
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-primary mr-2">Ubah</button>
                            <a class="btn btn-danger" href="{{ route('kayu-index') }}">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @endsection
