@extends('layouts.app')

@section('title', __('outlet.list'))

@section('content')
<!-- partial -->
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
                <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Edit Data kayu</h4>
                            <p class="card-description">
                                <hr>
                            </p>
                            <form  method="post" action="" enctype="multipart/form-data">
                              {{method_field('PUT') }}
                              {{ csrf_field() }}

                        <div class="form-group">
                             <label for="exampleInputUsername1">Nama Kayu </label>
                             <input type="text" class="form-control" name="nama_kayu" id="nama_kayu" placeholder="nama_kayu" value="{{ $kayu->nama_kayu }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="{{ $kayu->keterangan }}">
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
                              <a class="btn btn-danger" href="{{ route('kayu-index') }}">Batal</a>
                            </form>
                          </div>
                        </div>
                      </div>
        </div>

    <!-- partial:partials/_footer.html -->
    <footer class="footer">
      <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="https://www.urbanui.com/" target="_blank">Urbanui</a>. All rights reserved.</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
      </div>
    </footer>
    <!-- partial -->
  </div>
  <!-- main-panel ends -->
@endsection
