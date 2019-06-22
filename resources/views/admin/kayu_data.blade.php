@extends('layouts.app')

@section('title', __('outlet.list'))

@section('content')
  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
              <div class="mr-md-3 mr-xl-5">
                <h2>Data Jenis Kayu</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
                <div class="card-body">
                        <h1 class="card-title">Tabel Data</h1>
                        <div class="text-right" style="margin-bottom:20px;">
                          <a href="/" class="btn btn-sm btn-primary mt-2 mt-xl-0" data-toggle="modal" data-target="#exampleModalCenter"> <i class=" mdi mdi-plus "></i> Tambah Data</a>
                        </div>
                        <div class="table-responsive">
                          <table class="table striped "  id="myTable">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Nama Kayu</th>
                                <th class="text-center">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <?php $no = 0 ?>
                                @foreach ($kayu as $kayus)
                                <td>{{$no = $no + 1}}</td>
                                <td>{{$kayus->nama_kayu}}</td>
                                <td class="text-center">
                                        <a href="{{ route('kayu-detail', ['id' => IDCrypt::Encrypt( $kayus->id)])}}"class="btn btn-inverse-info" style="padding:6px !important;"> <i class=" mdi mdi-eye "></i></a>
                                        <a href="{{ route('kayu-hapus', ['id' => IDCrypt::Encrypt( $kayus->id)])}}" class="btn btn-inverse-danger" style="padding:6px !important;"> <i class="mdi mdi-delete"></i></a>
                                    </td>
                              </tr>
                              @endforeach
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
          </div>
        </div>
      </div>

    </div>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
                    {{ csrf_field() }}
                            <div class="form-group">
                              <label for="exampleInputUsername1">Nama Kayu</label>
                              <input type="text" name="nama_kayu" class="form-control" id="exampleInputUsername1" placeholder="Nama Kayu">
                            </div>
                            <div class="form-group">
                                    <label>File upload</label>
                                    <input type="file" name="foto" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                      <input type="text" class="form-control file-upload-info" disabled placeholder="Foto Kayu">
                                      <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                      </span>
                                    </div>
                                  </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">Keterangan</label>
                                <textarea name="keterangan" class="form-control" id="exampleTextarea1" rows="4"></textarea>
                            </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
              {{csrf_field() }}
            </form>
            </div>
          </div>
        </div>
      </div>
    <!-- content-wrapper ends -->
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
