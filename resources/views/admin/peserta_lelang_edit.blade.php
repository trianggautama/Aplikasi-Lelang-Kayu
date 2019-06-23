@extends('layouts.app')
@section('content')
<!-- partial -->
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
                <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Edit Data Peserta Lelang</h4>
                            <p class="card-description">
                                <hr>
                            </p>
                            <form  method="post" action="" enctype="multipart/form-data">
                              {{method_field('PUT') }}
                              {{ csrf_field() }}
                              <div class="form-group">
                                <label for="exampleInputUsername1">Nama</label>
                              <input type="text" class="form-control" name="name" id="name" placeholder="Nama" value="{{ $peserta->user->name }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ $peserta->user->email }}">
                        </div>
                        <div class="form-group">
                                <label for="exampleInputUsername1">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Isi Jika Ingin Mengubah Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" rows="4" >{{ $peserta->alamat }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Nomor Telepon</label>
                            <input type="text" class="form-control" name="telepon" id="telepon" placeholder="Nomor Telepon" value="{{ $peserta->telepon }}" >
                    </div>
                        <div class="form-group">
                                <label for="exampleInputUsername1">Pekerjaan</label>
                                <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" value="{{ $peserta->pekerjaan }}" >
                        </div>
                        <div class="form-group">
                            <label>Foto</label>
                             <input type="file" name="foto" class="file-upload-default">
                                 <div class="input-group col-xs-12">
                                     <input type="text" name class="form-control file-upload-info" disabled placeholder="isi jika ingin mengubah gambar">
                                    <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>
                                {{ csrf_field() }}
                        </div>
                        
                              <button type="submit" class="btn btn-primary mr-2">Ubah</button>
                              <a class="btn btn-danger" href="{{ route('karyawan-index') }}">Batal</a>
                            </form>
                          </div>
                        </div>
                      </div>
        </div>
@endsection
