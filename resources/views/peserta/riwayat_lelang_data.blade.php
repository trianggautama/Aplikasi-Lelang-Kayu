@extends('layouts.peserta')

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
                <h2>Data Riwayat Lelang Saya</h2>
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
                <div class="card-body">
                        <h4 class="card-title">Tabel Data</h4>
                        <div class="table-responsive">
                          <table class="table table-striped "  id="myTable">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Nama Lelang</th>
                                <th>Tanggal Lelang</th>
                                <th>Harga Awal</th>
                                <th>Status Bid Saya</th>
                                <th>Harga Bid Saya</th>
                                <th>Status</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <?php $no = 0 ?>
                                @foreach ($hasil_lelang as $d)
                                <td>{{$no = $no + 1}}</td>
                                <td>{{$d->lelang->nama}}</td>
                                <td>{{$d->lelang->tanggal_mulai}}</td>
                                <td>{{$d->lelang->harga_awal}}</td>
                                <td>Bid ke - {{$d->status_bid}}</td>
                                <td>{{$d->bid_harga}}</td>

                                @if($d->status==1)
                                    <td  class="text-center"><label class="badge badge-primary">Lelang Sedang Berlangsung</label></td>
                                @else
                                    <td  class="text-center"><label class="badge badge-info">Lelang Sudah Selesai</label></td>
                                @endif
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
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
