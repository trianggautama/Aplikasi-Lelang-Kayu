@extends('layouts.app')
@section('content')
<!-- partial -->
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
                <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Edit Data Karyawan</h4>
                            <p class="card-description">
                                <hr>
                            </p>
                            <form  method="post" action="" enctype="multipart/form-data">
                              {{method_field('PUT') }}
                              {{ csrf_field() }}
                              <div class="form-group">
                                <label for="exampleInputUsername1">Username</label>
                              <input type="text" class="form-control" name="name" id="name" placeholder="Username" value="{{ $User->name }}">
                        </div>
                        <div class="form-group">
                                <label for="exampleInputUsername1">Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ $User->email }}">
                        </div>
                        <div class="form-group">
                                <label for="exampleInputUsername1">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                             <label for="exampleInputUsername1">NIP </label>
                             <input type="text" class="form-control" name="NIP" id="NIP" placeholder="NIP" value="{{ $Karyawan->NIP }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" value="{{ $Karyawan->nama }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="{{ $Karyawan->tempat_lahir }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Tanggal Lahir  </label>
                            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="{{ $Karyawan->tanggal_lahir }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" rows="4" >{{ $Karyawan->alamat }}</textarea>
                        </div>
                        <div class="form-group">
                                <label for="exampleInputUsername1">Nomor Telepon</label>
                                <input type="text" class="form-control" name="telepon" id="telepon" placeholder="Nomor Telepon" value="{{ $Karyawan->telepon }}" >
                        </div>
                        <div class="form-group">
                            <label>Foto</label>
                             <input type="file" name="gambar" class="file-upload-default">
                                 <div class="input-group col-xs-12">
                                     <input type="text" name class="form-control file-upload-info" disabled placeholder="isi jika ingin mengubah gambar">
                                    <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>
                        </div>
                         <div class="form-group">
                            <label for="exampleSelectGender">Status</label>
                                <select class="form-control" name="status" id="exampleSelectGender">
                                  <option @if(isset($Karyawan->status) && $Karyawan->status == 'Menikah')  {{'selected'}} @endif value="Menikah">Menikah</option>
                                  <option @if(isset($Karyawan->status) && $Karyawan->status == 'Belum Menikah')  {{'selected'}} @endif value="Belum Menikah">Belum Menikah</option>
                                </select>
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
