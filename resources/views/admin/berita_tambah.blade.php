@extends('layouts.app')
@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">form tambah Berita</h4>
                        <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputUsername1">Judul</label>
                                <input type="text" class="form-control" name="judul"
                                    placeholder="Judul Berita">
                            </div>
                            <div class="form-group">
                                <label>File upload</label>
                                <input type="file" name="foto" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled
                                        placeholder="Foto Berita">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputDescription">Isi Berita:</label>
                                <textarea id="tinyMCE" name="isi"></textarea>
                            </div>
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
