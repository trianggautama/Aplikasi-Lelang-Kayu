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
                <h2>Data Lelang yang sedang berlangsung,</h2>
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
                                <th>Nama</th>
                                <th>Kayu</th>
                                <th  class="text-center">Harga Awal</th>
                                <th  class="text-center">Batas Lelang</th>
                                <th  class="text-center">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>5 kg</td>
                                <td> Kayu Jati</td>
                                <td  class="text-center"><label class="badge badge-warning">Rp.6 Jt</label></td>
                                <td  class="text-center"> 20 Mei 2019</td>
                                <td class="text-center"><a href="{{Route('lelang_berlangsung_detail')}}" class="btn  btn-primary" style="padding:6px !important;"><i class=" mdi mdi-eye "> </i></a></td>
                              </tr>
                              <tr>
                                <td>10 kg</td>
                                <td>Kayu Ulin</td>
                                <td  class="text-center"><label class="badge badge-danger">Rp.8 Jt</label></td>
                                <td  class="text-center"> 25 Mei 2019</td>
                                <td class="text-center"><a href="{{Route('lelang_berlangsung_detail')}}" class="btn  btn-primary" style="padding:6px !important;"> <i class=" mdi mdi-eye "> </i></a></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
          </div>
        </div>
      </div>

    </div>
@endsection
