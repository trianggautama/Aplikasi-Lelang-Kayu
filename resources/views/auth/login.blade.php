
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Lelang Kayu</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="admin/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="admin/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="admin/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="admin/images/logo_pemprov.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo text-center">
                <img src="admin/images/logo_pemprov.png" alt="logo">
              </div>
              <div class="text-center">
              <h4>Selamat Datang</h4>
              <h6 class="font-weight-light">Silahkan Login untuk melanjutkan ke halaman beranda </h6>
              <br>
              </div>
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                  <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form-control-lg" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                  <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} form-control-lg" name="password" required  placeholder="Password">

                     @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ $errors->first('password') }}</strong>
                         </span>
                     @endif
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                                    {{ __('Login') }}
                                </button>

                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <a href="#" class="auth-link text-black">Lupa password?</a>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Belum punya akun? <a href="{{ route('register') }}" class="text-primary">buat akun</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="admin/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="admin/js/off-canvas.js"></script>
  <script src="admin/js/hoverable-collapse.js"></script>
  <script src="admin/js/template.js"></script>
  <!-- endinject -->
</body>

</html>
