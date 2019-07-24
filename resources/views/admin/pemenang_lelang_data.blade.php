@extends('layouts.app')
@section('content')
  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
                <div class="card-body">
                        <h1 class="card-title">Data Pemenang Lelang</h1>
                        <div class="text-right" style="margin-bottom:20px;">
                          <a href="" class="btn btn-sm btn-info" > <i class=" mdi mdi-printer "></i> Cetak Pendapatan Lelang</a>
                          <a href="{{Route('pendapatan_lelang_filter_cetak')}}" class="btn btn-sm  btn-info" > <i class=" mdi mdi-printer "></i> Cetak Pendapatan Lelang / Periode</a>
                        </div>
                        <div class="table-responsive">
                          <table class="table striped "  id="myTable">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Nama Lelang</th>
                                <th>Peserta</th>
                                <th>Penawaran Terakhir</th>
                                <th class="text-center">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <?php $no = 0 ?>
                                <td>{{$no = $no + 1}}</td>
                                <td>Lelang Kayu Hasil Razia di tanjung</td>
                                <td>Tri Angga</td>
                                <td>Rp.8.000.000</td>
                                <td class="text-center">
                                        <a href=""class="btn btn-inverse-success" style="padding:6px !important;"> <i class=" mdi mdi-eye "></i></a>
                                    </td>
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
