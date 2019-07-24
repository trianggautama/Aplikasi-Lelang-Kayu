@extends('layouts.app')
@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Berita</h4>
                        <div class="text-right" style="margin-bottom:20px;">
                        <a href="{{ route('berita-tambah') }}" class="btn btn-sm btn-primary mt-2 mt-xl-0"> <i
                                class=" mdi mdi-plus "></i> Tambah Data</a>
                        <a href="{{Route('berita_cetak')}}" class="btn btn-sm btn-info" > <i class=" mdi mdi-printer "></i> Cetak Data</a>
                        <a href="{{Route('berita_cetak_periode')}}" class="btn btn-sm btn-info" > <i class=" mdi mdi-printer "></i> Cetak Data / Periode</a>
                    </div>
                        <div class="table-responsive">
                            <table class="table table-striped " id="myTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Penulis</th>
                                        <th>Judul</th>
                                        <th>Tanggal Dibuat</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <?php $no = 0 ?>
                                    @foreach ($berita as $beritas)
                                    <td>{{$no = $no + 1}}</td>
                                    <td>{{$beritas->karyawan->user->name}}</td>
                                    <td>{{$beritas->judul}}</td>
                                    <td>{{$beritas->created_at}}</td>
                                    <td class="text-center">
                                        <a href="{{ route('berita-detail', ['id' => IDCrypt::Encrypt( $beritas->id)])}}"class="btn btn-inverse-success" style="padding:6px !important;"> <i class=" mdi mdi-eye "></i></a>
                                        <a href="{{ route('berita-hapus', ['id' => IDCrypt::Encrypt( $beritas->id)])}}" class="btn btn-inverse-danger" style="padding:6px !important;"> <i class="mdi mdi-delete"></i></a>
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
