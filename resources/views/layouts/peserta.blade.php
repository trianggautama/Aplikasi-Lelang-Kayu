<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Aplikasi Lelang Kayu</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('/admin/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/vendors/base/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('/admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('admin/images/favicon.png') }}" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
          <a class="navbar-brand brand-logo" href="{{Route('peserta-index')}}" style="margin-right:22px !important;"><img src="{{asset('admin/images/logo_pemprov.png')}}" alt="logo"/>Dishut &nbsp</a>
          <a class="navbar-brand brand-logo-mini" href="/halaman_admin" ><img src="{{asset('admin/images/logo-mini.svg')}}" alt="logo"/></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-4 w-100">
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown mr-4">
            <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center notification-dropdown" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-bell mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                  <div class="item-icon bg-info">
                    <i class="mdi mdi-account-box mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">New user registration</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    2 days ago
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="admin/images/faces/face5.jpg" alt="profile"/>
              <span class="nav-profile-name">{{ Auth::user()->name }}</span>
              {{-- {{ Auth::user()->name }} --}}
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="mdi  mdi-account-circle  text-primary"></i>
                Profil
              </a>
              <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('peserta-index') }}">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          @if(auth::user()->status==0)
          <li class="nav-item">
                <a class="nav-link" href="#">
                  <i class="mdi mdi-circle-outline menu-icon"></i>
                  <span class="menu-title">Menu belum tersedia</span>
                </a>
              </li>
          @else
          <li class="nav-item">
            <a class="nav-link" href="{{ route('lelang_berlangsung') }}">
              <i class="mdi mdi-circle-outline menu-icon"></i>
              <span class="menu-title">Lelang yang Berlangsung</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('riwayat_lelang') }}">
              <i class="mdi mdi-circle-outline menu-icon"></i>
              <span class="menu-title">Riwayat Saya</span>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
              {{-- <li class="nav-item"> <a class="nav-link" href="{{ route('karyawan_index') }}">Riwayat Lelang</a></li> --}}
              </ul>
            </div>
          </li>
          @endif
        </ul>
      </nav>
      @yield('content')
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
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{asset('/admin/vendors/base/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{asset('/admin/vendors/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('/admin/vendors/datatables.net/jquery.dataTables.js')}}"></script>
  <script src="{{asset('/admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{asset('/admin/js/off-canvas.js')}}"></script>
  <script src="{{asset('/admin/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('/admin/js/template.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('/admin/js/dashboard.js')}}"></script>
  <script src="{{asset('/admin/js/data-table.js')}}"></script>
  <script src="{{asset('/admin/js/jquery.dataTables.js')}}"></script>
  <script src="{{asset('/admin/js/dataTables.bootstrap4.js')}}"></script>
  <script src="{{asset('/admin/js/file-upload.js')}}"></script>
  <!-- End custom js for this page-->
  <script>
        $(document).ready( function () {
          $('#myTable').DataTable();
      } );
      </script>
@stack('scripts')
</body>

</html>
