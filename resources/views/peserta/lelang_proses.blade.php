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
                <h2>Proses Lelang {{ $lelang->kayu->nama_kayu }}</h2>
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
                      <a class="nav-link" id="sales-tab" data-toggle="tab" href="#sales" role="tab" aria-controls="sales" aria-selected="false">Detail Data Proses Lelang</a>
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
                    {{-- <div class="card-body">
                    <h4 class="card-title text-primary">Bid Harga</h4>

                        <div class="template-demo">
                            <h4 class="card-title">Nama &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;: {{ $lelang->kayu->nama_kayu }}</h4>
                            <h4 class="card-title">keterangan &nbsp;: {{ $lelang->kayu->keterangan }}</h4>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="col-md-7 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @if($bid_peserta==3)
                        <h4 class="card-title text-primary">Anda telah melakukan 3 bid, Silahkan tunggu informasi dari admin</h4>
                        @else
                        <h4 class="card-title text-primary">Silahkan Bid Harga</h4>
                        @endif
                        <div class="template-demo">
                            <h4 class="card-title">Harga Awal &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;: Rp.{{$lelang->harga_awal}},-</h4>
                            <h4 class="card-title">Harga Tertinggi &nbsp;: Rp.{{$bid_tertinggi}},-</h4>
                            {{-- @if($lelang->status==1)
                            <h4 class="card-title">Status &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;: <label class="badge badge-primary">Lelang Sedang Berlangsung</label></h4>
                            @else
                            <h4 class="card-title">Status &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;: <label class="badge badge-primary">Lelang Sudah Selesai</label></h4>
                            @endif --}}
                            @if($bid_peserta==3)
                            @else
                            <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
                                {{method_field('PUT') }}
                            {{ csrf_field() }}
                            <div class="form-group">
                                    <h4 class="card-title">Bid Harga &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;:</h4>
                                    <input type="text" class="form-control" name="bid_harga" id="harga_awal"
                                        placeholder="Silahkan Bid Harga" value="{{ $harga_bid }}">
                            </div>
                            @endif
                        </div>

                        <div class="card-footer text-right">
                            <a href="{{route ('lelang_berlangsung') }}" class="btn btn-danger">Kembali</a>
                            @if($bid_peserta==3)
                            @else
                            <button type="submit" value="submit" class="btn btn-primary">Bid Harga</button>
                            @endif
                            {{-- <button type="submit" class="btn btn-primary mr-2">Simpan</button> --}}
                            <hr>
                        </form>

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
                                        <th>Bid Status</th>
                                        <th>Bid Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php $no = 0 ?>
                                @foreach ($value_hasil_lelang as $d)
                                    <td>{{$no = $no + 1}}</td>
                                    <td>{{$d->peserta->user->name}}</td>
                                    <td>Bid Ke - {{$d->status_bid}}</td>
                                    <td>Rp.{{$d->bid_harga}},-</td>
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
