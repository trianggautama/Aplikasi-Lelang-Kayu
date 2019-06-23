@extends('layouts.app')
@section('content')
<!-- partial -->
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
                <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Edit Data Berita</h4>
                            <p class="card-description">
                                <hr>
                            </p>
                            <form  method="post" action="" enctype="multipart/form-data">
                              {{method_field('PUT') }}
                              {{ csrf_field() }}
                              <div class="form-group">
                                <label for="exampleInputUsername1">Nama Penulis</label>
                              <input type="text" class="form-control" id="name" placeholder="Nama Penulis" value="{{ $berita->karyawan->nama }}" disabled>
                        </div>
                        <div class="form-group">
                             <label for="exampleInputUsername1">Judul</label>
                             <input type="text" class="form-control" name="judul" id="NIP" placeholder="Judul" value="{{ $berita->judul }}">
                        </div>
                        <div class="form-group">
                          <label>Foto</label>
                          <input type="file" name="foto" class="file-upload-default">
                          <div class="input-group col-xs-12">
                              <input type="text" name class="form-control file-upload-info" disabled
                                  placeholder="isi jika ingin mengubah gambar">
                              <span class="input-group-append">
                                  <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                              </span>
                          </div>
                          {{ csrf_field() }}
                      </div>
                        <div class="form-group">
                          <label for="exampleInputDescription">Isi Berita:</label>
                          <textarea id="tinyMCE" name="isi">{{ $berita->isi }}</textarea>
                        </div>
                                {{ csrf_field() }}
                              <button type="submit" class="btn btn-primary mr-2">Ubah</button>
                              <a class="btn btn-danger" href="{{ route('karyawan-index') }}">Batal</a>
                            </form>
                          </div>
                        </div>
                      </div>
        </div>
@endsection
