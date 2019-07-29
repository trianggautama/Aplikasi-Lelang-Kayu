@extends('layouts.peserta')
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
                        </div>
                        <div class="table-responsive">
                          <table class="table striped "  id="myTable">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Nama Lelang</th>
                                <th>Peserta</th>
                                <th>Penawaran Terakhir</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0?>
                                @foreach ($pendapatan as $d)
                            <tr>
                                    <td>{{$no = $no + 1}}</td>
                                <td>{{ $d->hasil_lelang->lelang->nama }}</td>
                                <td>{{ $d->hasil_lelang->peserta->user->name }}</td>
                                <td>Rp.{{ $d->pendapatan }},-</td>


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
