<!doctype html>
<html class="no-js"  lang="en">

	<head>
		<!-- META DATA -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Rufina:400,700" rel="stylesheet" />

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet" />

		<!-- TITLE OF SITE -->
		<title>Aplikasi Lelang Kayu</title>

		<!-- favicon img -->
		<link rel="shortcut icon" type="image/icon" href="{{ asset('') }}vendor/logo/favicon.png"/>

		<!--font-awesome.min.css-->
		<link rel="stylesheet" href="{{ asset('vendor/css/font-awesome.min.css') }}" />

		<!--animate.css-->
		<link rel="stylesheet" href="{{ asset('vendor/css/animate.css') }}" />

		<!--hover.css-->
		<link rel="stylesheet" href="{{ asset('vendor/css/hover-min.css') }}"/>

		<!--datepicker.css-->
		<link rel="stylesheet"  href="{{ asset('vendor/css/datepicker.css') }}" />

		<!--owl.carousel.css-->
        <link rel="stylesheet" href="{{ asset('vendor/css/owl.carousel.min.css') }}">
		<link rel="stylesheet" href="{{ asset('') }}vendor/css/owl.theme.default.min.css"/>

		<!-- range css-->
        <link rel="stylesheet" href="{{ asset('vendor/css/jquery-ui.min.css') }}" />

		<!--bootstrap.min.css-->
		<link rel="stylesheet" href="{{ asset('vendor/css/bootstrap.min.css') }}" />

		<!-- bootsnav -->
		<link rel="stylesheet" href="{{ asset('vendor/css/bootsnav.css') }}"/>

		<!--style.css-->
		<link rel="stylesheet" href="{{ asset('vendor/css/style.css') }}" />

		<!--responsive.css-->
		<link rel="stylesheet" href="{{ asset('vendor/css/responsive.css') }}" />

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

		<!--[if lt IE 9]>
		<script src="{{ ('') }}https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="{{ ('') }}https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>

	<body>
		<!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade
			your browser</a> to improve your experience and security.</p>
		<![endif]-->

		<!-- main-menu Start -->
		<header class="top-area">
			<div class="header-area">
				<div class="container">
					<div class="row">
						<div class="col-sm-3">
							<div class="logo">
								<a href="{{ url('/') }}">
									Dinas <span>Kehutanan</span>
								</a>
							</div><!-- /.logo-->
						</div><!-- /.col-->
						<div class="col-sm-9">
							<div class="main-menu">

								<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header">
									<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
										<i class="fa fa-bars"></i>
									</button><!-- / button-->
								</div><!-- /.navbar-header-->
								<div class="collapse navbar-collapse">
									<ul class="nav navbar-nav navbar-right">
										<li class="smooth-menu"><a href="#home">home</a></li>
										<li class="smooth-menu"><a href="#gallery">Informasi Kayu</a></li>
										<li class="smooth-menu"><a href="#pack">Daftar Lelang </a></li>
										<li class="smooth-menu"><a href="#spo">Tentang Kami</a></li>
										<li class="smooth-menu"><a href="#blog">Berita</a></li>
                                        <li class="smooth-menu"><a href="#subs">kontak</a></li>
                                        <li class=""><a href="{{ route('login') }}">login</a></li>


									</ul>
								</div><!-- /.navbar-collapse -->
							</div><!-- /.main-menu-->
						</div><!-- /.col-->
					</div><!-- /.row -->
					<div class="home-border"></div><!-- /.home-border-->
				</div><!-- /.container-->
			</div><!-- /.header-area -->

		</header><!-- /.top-area-->
		<!-- main-menu End -->
        <section id="home" class="about-us">
                <div class="container">
                    <div class="about-us-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="single-about-us">
                                    <div class="about-us-txt">
                                        <h2>
                                        Aplikasi Lelang Kayu
                                        Dishut Provinsi Kalsel
                                        </h2>
                                        <div class="about-btn">
                                        </div><!--/.about-btn-->
                                    </div><!--/.about-us-txt-->
                                </div><!--/.single-about-us-->
                            </div><!--/.col-->
                            <div class="col-sm-0">
                                <div class="single-about-us">

                                </div><!--/.single-about-us-->
                            </div><!--/.col-->
                        </div><!--/.row-->
                    </div><!--/.about-us-content-->
                </div><!--/.container-->

            </section><!--/.about-us-->
            <!--about-us end -->



<!-- partial -->
<section  class="travel-box">
        <div class="container">
        		<div class="row">
        			<div class="col-md-12">
                <div class="d-flex align-items-end flex-wrap">
					@if(isset($nama))
                    <h2 style="text-center">Detail Hasil Lelang {{ $nama->lelang->nama }}</h2>
					@else
					<h2 style="text-center">Detail Hasil Lelang belum tersedia</h2>
					@endif
                  <hr>
                </div>
              </div>
            </div>
          </div>
                            <div class="table-responsive">
                              <table class="table table-striped "  id="myTable">
                                <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>Nama Peserta</th>
                                    <th>Status Bid</th>
                                    <th>Bid Harga</th>
                                  </tr>
                                </thead>
                                <tbody>
                                        <?php $no = 0 ?>
                                        @foreach ($hasil_lelang as $d)
                                  <tr>

                                    <td>{{$no = $no + 1}}</td>
                                    <td>{{$d->peserta->user->name}}</td>
                                    <td>Bid Ke - {{$d->status_bid}}</td>
                                    <td>Rp.{{$d->bid_harga}},-</td>

                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                            </div>


</section>

		<!-- footer-copyright start -->
		<footer  class="footer-copyright">
			<div class="container">
				<div class="footer-content">
					<div class="row">

						

						<div class="col-sm-3">
							<div class="single-footer-item text-center">
								<h2 class="text-left">contacts</h2>
								<div class="single-footer-txt text-left">
									<p>+1 (300) 1234 6543</p>
									<!-- <p class="foot-email"><a href="#">info@tnest.com</a></p> -->
									<p>Dinas Kehutanan</p>
									<p>Kalimantan Selatan</p>
								</div><!--/.single-footer-txt-->
							</div><!--/.single-footer-item-->
						</div><!--/.col-->

					</div><!--/.row-->

				</div><!--/.footer-content-->
				<hr>
				<div class="foot-icons ">
					<ul class="footer-social-links list-inline list-unstyled">
		                <li><a href="#" target="_blank" class="foot-icon-bg-1"><i class="fa fa-facebook"></i></a></li>
		                <li><a href="#" target="_blank" class="foot-icon-bg-2"><i class="fa fa-twitter"></i></a></li>
		                <li><a href="#" target="_blank" class="foot-icon-bg-3"><i class="fa fa-instagram"></i></a></li>
		        	</ul>
		        	<p>&copy; 2017 <a href="https://www.themesine.com">ThemeSINE</a>. All Right Reserved</p>

		        </div><!--/.foot-icons-->
				<div id="scroll-Top">
					<i class="fa fa-angle-double-up return-to-top" id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
				</div><!--/.scroll-Top-->
			</div><!-- /.container-->

		</footer><!-- /.footer-copyright-->
		<!-- footer-copyright end -->




		<script src="{{ ('vendor/js/jquery.js') }}"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->

		<!--modernizr.min.js-->
		<script  src="{{ ('https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js') }}"></script>


		<!--bootstrap.min.js-->
		<script  src="{{ ('vendor/js/bootstrap.min.js') }}"></script>

		<!-- bootsnav js -->
		<script src="{{ ('vendor/js/bootsnav.js') }}"></script>

		<!-- jquery.filterizr.min.js -->
		<script src="{{ ('vendor/js/jquery.filterizr.min.js') }}"></script>

		<script  src="{{ ('https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js') }}"></script>

		<!--jquery-ui.min.js-->
        <script src="{{ ('vendor/js/jquery-ui.min.js') }}"></script>

        <!-- counter js -->
		<script src="{{ ('vendor/js/jquery.counterup.min.js') }}"></script>
		<script src="{{ ('vendor/js/waypoints.min.js') }}"></script>

		<!--owl.carousel.js-->
        <script  src="{{ ('vendor/js/owl.carousel.min.js') }}"></script>

        <!-- jquery.sticky.js -->
		<script src="{{ ('vendor/js/jquery.sticky.js') }}"></script>

        <!--datepicker.js-->
        <script  src="{{ ('vendor/js/datepicker.js') }}"></script>

		<!--Custom JS-->
		<script src="{{ ('vendor/js/custom.js') }}"></script>


	</body>

</html>
