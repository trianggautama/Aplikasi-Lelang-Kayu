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
                            <h2>Data Peserta Lelang,</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tabel Data</h4>
                        <div class="text-right">
                        <a href="{{ route('peserta-lelang-tambah') }}" class="btn btn-primary mt-2 mt-xl-0"> <i
                            class=" mdi mdi-plus "></i> Tambah Data</a>
                        <a href="{{ route('peserta-lelang-cetak') }}" class="btn btn-info mt-2 mt-xl-0"> <i
                            class=" mdi mdi-printer "></i> Cetak Data</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped " id="myTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Peserta</th>
                                        <th>No Telepon</th>
                                        <th>Pekerjaan</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $no = 0 ?>
                                @foreach ($data as $datas)
                                    <tr>
                                    <td>{{$no = $no + 1}}</td>
                                    <td>{{$datas->user->name}}</td>
                                    <td>{{$datas->telepon}}</td>
                                    <td>{{$datas->pekerjaan}}</td>
                                    @if($datas->user->status==1)
                                    <td  class="text-center"><label class="badge badge-info">Aktif</label></td>
                                    @else
                                    <td  class="text-center"><label class="badge badge-danger">Tidak Aktif</label></td>
                                    @endif
                                    <td class="text-center">
                                            @if($datas->user->status == 0)
                                            <form action="{{ route('status_update', ['id' => IDCrypt::Encrypt( $datas->user->id)]) }}" method="POST">
                                                    {{method_field('PUT') }}
                                                    {{ csrf_field() }}
                                                    {{-- <a href="" class="btn btn-inverse-warning" data-toggle="tooltip" data-placement="top" title="Banned" ><i class="icon-close"></i></i></a> --}}
                                                    <button type="submit" class="btn btn-inverse-info" data-toggle="tooltip" data-placement="top" title="Aktif" name="status" value="1" style="padding:6px !important;"><i class=" mdi mdi-check "></i></button>
                                                </form>
                                            @else
                                            <form action="{{ route('status_update', ['id' => IDCrypt::Encrypt( $datas->user->id)]) }}" method="POST">
                                                    {{method_field('PUT') }}
                                                    {{ csrf_field() }}
                                                    {{-- <a href="" class="btn btn-inverse-warning" data-toggle="tooltip" data-placement="top" title="Banned" ><i class="icon-close"></i></i></a> --}}
                                                    <button type="submit" class="btn btn-inverse-danger" data-toggle="tooltip" data-placement="top" title="Banned" name="status" value="0" style="padding:6px !important;" ><i class="mdi mdi-close"></i></i></button>
                                                </form>
                                            @endif

                                        <a href="{{ route('peserta-lelang-detail', ['id' => IDCrypt::Encrypt( $datas->id)])}}" class="btn btn-inverse-success" style="padding:6px !important;"> <i class=" mdi mdi-eye "></i></a>
                                        <a href="{{ route('peserta-lelang-hapus', ['id' => IDCrypt::Encrypt( $datas->id)])}}" class="btn btn-inverse-danger" style="padding:6px !important;"> <i class="mdi mdi-delete"></i></a>
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
