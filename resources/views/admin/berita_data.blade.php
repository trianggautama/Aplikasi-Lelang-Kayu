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
                            <h2>Data Berita,</h2>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-end flex-wrap">
                        <a href="{{ route('berita_tambah') }}" class="btn btn-primary mt-2 mt-xl-0"> <i
                                class=" mdi mdi-plus "></i> Tambah Data</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tabel Berita</h4>
                        <div class="table-responsive">
                            <table class="table table-striped " id="myTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Judul</th>
                                        <th>Author</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>1 Apr 2019</td>
                                        <td>Pembalakan Hutan di Kandangan</td>
                                        <td>Supriadi</td>
                                        <td class="text-center">
                                            <a href="" class="btn btn-primary"><i class="mdi mdi-eye"></i></a>
                                            <a href="" class="btn btn-warning"><i class="mdi mdi-pencil"></i></a>
                                            <a href="" class="btn btn-danger"><i class="mdi mdi-delete"></i></a>
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
