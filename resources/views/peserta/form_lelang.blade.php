@extends('layouts.peserta')
@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Form  Lelang</h4>
                        <p class="card-description">
                            <hr>
                        </p>
                        <form method="post" action="" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Penawaran</label>
                                <input type="text" class="form-control" name="harga_awal" id="harga_awal"
                                    placeholder="Harga Awal" value="">
                            </div>
                            <div class="form-group">
                                <label>Berkas Penawaran</label>
                                <input type="file" name="foto" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" name clas="form-control file-upload-info" disabled
                                        placeholder="isi jika ingin mengubah gambar">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>
                            {{ csrf_field() }}
                            <br>
                        </form>
                    </div>
                </div>
                <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary mr-2">Buat Penawaran</button>
                            <a class="btn btn-danger" href="{{ route('kayu-index') }}">Batal</a>
                            </div>
            </div>
        </div>

        @endsection
