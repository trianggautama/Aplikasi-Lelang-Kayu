@extends('layouts.app')
@section('content')
  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
              <div class="mr-md-3 mr-xl-5">
                <h2>Data Lelang,</h2>
              </div>
            </div>
            <div class="d-flex justify-content-between align-items-end flex-wrap">
              <a href="{{ route('lelang-tambah') }}" class="btn btn-primary mt-2 mt-xl-0"> <i class=" mdi mdi-plus "></i> Tambah Data</a>
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
                                <th>Nama</th>
                                <th>Tanggal Lelang</th>
                                <th>Tempat</th>
                                <th>Harga Awal</th>
                                <th>Status</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <?php $no = 0 ?>
                                @foreach ($lelang as $lelangs)
                                <td>{{$no = $no + 1}}</td>
                                <td>{{$lelangs->nama}}</td>
                                <td>{{$lelangs->tanggal_mulai}}</td>
                                <td>{{$lelangs->tempat}}</td>
                                <td>{{$lelangs->harga_awal}}</td>

                                @if($lelangs->status==1)
                                    <td  class="text-center"><label class="badge badge-primary">Lelang Sedang Berlangsung</label></td>
                                @else
                                    <td  class="text-center"><label class="badge badge-info">Lelang Sudah Selesai</label></td>
                                @endif
                                <td class="text-center">
                                        <a href="{{ route('lelang-detail', ['id' => IDCrypt::Encrypt( $lelangs->id)])}}" class="btn btn-secondary "> <i class=" mdi mdi-eye "></i></a>

                                        <a href="{{ route('lelang-hapus', ['id' => IDCrypt::Encrypt( $lelangs->id)])}}" class="btn btn-danger"> <i class="mdi mdi-delete"></i></a>
                                    </td>
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
@endsection
