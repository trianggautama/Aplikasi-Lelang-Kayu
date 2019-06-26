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
                <h2>Beranda Peserta Lelang</h2>
                <p class="mb-md-0">Selamat datang di Aplikasi Lelang Online </p>
              </div>
            </div>
            <div class="d-flex justify-content-between align-items-end flex-wrap">
              <button type="button" class="btn btn-light bg-white btn-icon mr-3 d-none d-md-block " title="profil">
                <i class="mdi mdi-account-circle  text-muted"></i>
              </button>
              <a href="/" class="btn btn-primary mt-2 mt-xl-0">Halaman Depan</a>
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
                  <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Tahap 1</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="sales-tab" data-toggle="tab" href="#sales" role="tab" aria-controls="sales" aria-selected="false">Tahap 2</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="purchases-tab" data-toggle="tab" href="#purchases" role="tab" aria-controls="purchases" aria-selected="false">Catatan</a>
                </li>
              </ul>
              <div class="tab-content py-0 px-0">
              <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                  <div class="d-flex flex-wrap justify-content-xl-between">
                    <div class="d-flex py-3 border-md-right flex-grow-1  p-3 item">
                      <div class="d-flex flex-column ">
                        <h5 class="mb-1 text-muted">Melengkapi data profil anda</h5>
                        <br>
                        <ol>
                        <li>Pastikan Profil Anda Sudah Lengkap </li>
                        <li>Apabila Profil Anda Sudah Lengkap maka Admin akan memverifikas akun anda , apabila akun anda belum tervirifikasi maka anda tidak dapat mengikuti proses lelang</li>
                        <li>Anda dapat melihat Status Verifikasi Akun Anda pada menu disamping, atau pada halaman progil anda</li>           
                        </ol>       
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-right" style="width:100%">
                    @if(isset($peserta->user_id) && $peserta->user_id == $user_id)
                        <a href="{{ route('peserta-detail', ['id' => IDCrypt::Encrypt( $peserta->id )])}}" class="btn btn-primary mt-xl-0">Klik Disini Untuk Melihat Detail Profil Anda</a>
                        @else
                        <a href="{{ route('peserta-tambah')}}" class="btn btn-primary">Klik Disini Untuk Melengkapi Profil Anda</a>
                        @endif
                        {{-- <a href="{{ route('peserta-tambah')}}" class="btn btn-primary mt-xl-0">Klik Disini Untuk Melengkapi Profil Anda</a> --}}
                     
                    </div> 
                </div>
                <div class="tab-pane fade" id="sales" role="tabpanel" aria-labelledby="sales-tab">
                  <div class="d-flex flex-wrap justify-content-xl-between">
                  <div class="d-flex py-3 border-md-right flex-grow-1  p-3 item">
                      <div class="d-flex flex-column ">
                        <h5 class="mb-1 text-muted">Mengikuti Proses Lelang</h5>
                        <br>
                        <ol>
                        <li>Anda Dapat Mengikuti Lelang yang ada di Menu "Lelang yang Berlangsung"</li>
                        <li>Apabila sudah menentukan lelang yang ingin diikuti maka klik "ikut lelang" dan lengkapi form yang sudah di sediakan</li>
                        <li>Ikuti Petunjuk Pembayaran Registrasi yang ada saat mengisi fom pembayaran</li>
                        <li>Tunggu Verifikasi Pembayaran dari Admin, ketika sudah terverifikasi maka anda dapat mengajukan penawaran pada lelang yang dipilih</li>
                        </ol>
                      </div>
                    </div>  
                  </div>
                </div>
                <div class="tab-pane fade" id="purchases" role="tabpanel" aria-labelledby="purchases-tab">
                  <div class="d-flex flex-wrap justify-content-xl-between">
                   
                    <div class="d-flex py-3 border-md-right flex-grow-1  p-3 item">
                      <div class="d-flex flex-column ">
                      <h5 class="mb-1 text-muted">Ketentuan Proses Lelang</h5>
                        <br>
                        <ol>
                        <li>Penawaran Hanya dapat dilakukan maksimal 3 kali pada 1 lelang</li>
                        <li>Apabila Anda Memenangkan Lelang Maka Anda Akan Di Hubngi Oleh Admin Dari Dinas Kehutanan Provinsi Kalsel</li>
                        <li>Apabila Anda Kalah Lelang, maka uang pendaftaran yang sudah di bayarkan akan dikembalikan via tranfer</li>
                        </ol>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
