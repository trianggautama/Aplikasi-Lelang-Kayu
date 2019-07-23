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
                <h2>Detail Lelang yang sedang berlangsung,</h2>
              </div>
            </div>
            <div class="d-flex justify-content-between align-items-end flex-wrap">
            </div>
          </div>
        </div>
      </div>

      <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body dashboard-tabs p-0">
                  <ul class="nav nav-tabs px-4" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Detail Lelang</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="sales-tab" data-toggle="tab" href="#sales" role="tab" aria-controls="sales" aria-selected="false">Peserta</a>
                    </li>
                  </ul>
                  <div class="tab-content py-0 px-0">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                      <div class="d-flex flex-wrap justify-content-xl-between">
                        <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                        <div class="row">
            <div class="col-md-5 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="{{asset('/images/kayu/default.png')}}" alt="" width="100%">
                    </div>
                </div>
            </div>
            <div class="col-md-7 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-primary">Detail Kayu</h4>

                        <div class="template-demo">
                            <h4 class="card-title">Nama &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;: {{ $lelang->kayu->nama_kayu }}</h4>
                            <h4 class="card-title">keterangan &nbsp;: {{ $lelang->kayu->keterangan }}</h4>
                        </div>
                        <hr>
                        <br>
                        <h4 class="card-title text-primary">Detail Lelang</h4>
                        <div class="template-demo">
                            <h4 class="card-title">Harga Awal &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;: {{$lelang->harga_awal}}</h4>
                            <h4 class="card-title">Tanggal Lelang &nbsp;: {{$lelang->tanggal_mulai}}</h4>
                            @if($lelang->status==1)
                            <h4 class="card-title">Status &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;: <label class="badge badge-primary">Lelang Sedang Berlangsung</label></h4>
                            @else
                            <h4 class="card-title">Status &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;: <label class="badge badge-primary">Lelang Sudah Selesai</label></h4>
                            @endif
                        </div>
                        <div class="card-footer text-right">
                            <a href="{{route ('lelang_berlangsung') }}" class="btn btn-danger">Kembali</a>
                            <a href="{{route ('lelang_proses', ['id' => IDCrypt::Encrypt( $lelang->id)]) }}" class="btn btn-primary">Ikut Lelang</a>

                        </div>
                    </div>
                </div>
            </div>

        </div>

                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="sales" role="tabpanel" aria-labelledby="sales-tab">
                      <div class="d-flex flex-wrap justify-content-xl-between">
                        <div class="d-none d-xl-flex border-md-right flex-grow-1  justify-content-center p-3 item">
                        <table class="table table-striped " id="myTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Peserta</th>
                                        <th>No Telepon</th>
                                        <th>Pekerjaan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>

                                    </tr>
                                </tbody>
                            </table>
                      </div>
                    </div>
                  </div>
                </div>
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
