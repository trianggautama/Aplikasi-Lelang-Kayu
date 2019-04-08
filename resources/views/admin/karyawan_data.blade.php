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
                <h2>Data Karyawan,</h2>
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
                          <table class="table table-striped " id="myTable">
                            <thead>
                              <tr>
                                <th>Nama</th>
                                <th>Nip</th>
                                <th>Alamat</th>
                                <th>No Tlp</th>
                                <th class="text-center">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Dedy</td>
                                <td>1997 654 90 01</td>
                                <td>Mataraman</td>
                                <td>081326543xxx</td>
                                <td class="text-center">
                                        <a href="{{ route('karyawan_detail') }}" class="btn btn-secondary "> <i class=" mdi mdi-eye "></i></a>
                                        <a href="{{ route('karyawan_edit') }}" class="btn btn-info"> <i class="mdi mdi-pencil"></i></a>
                                        <a href="" class="btn btn-danger"> <i class="mdi mdi-delete"></i></a>
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
