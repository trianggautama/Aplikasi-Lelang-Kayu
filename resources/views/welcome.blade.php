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
		<link rel="shortcut icon" type="image/icon" href="{{asset('vendor/logo/favicon.png')}}"/>

		<!--font-awesome.min.css-->
		<link rel="stylesheet" href="{{asset('vendor/css/font-awesome.min.css')}}" />

		<!--animate.css-->
		<link rel="stylesheet" href="{{asset('vendor/css/animate.css')}}" />

		<!--hover.css-->
		<link rel="stylesheet" href="{{asset('vendor/css/hover-min.css')}}">

		<!--datepicker.css-->
		<link rel="stylesheet"  href="{{asset('vendor/css/datepicker.css')}}" >

		<!--owl.carousel.css-->
        <link rel="stylesheet" href="{{asset('vendor/css/owl.carousel.min.css')}}">
		<link rel="stylesheet" href="{{asset('vendor/css/owl.theme.default.min.css')}}"/>

		<!-- range css-->
        <link rel="stylesheet" href="{{asset('vendor/css/jquery-ui.min.css')}}" />

		<!--bootstrap.min.css-->
		<link rel="stylesheet" href="{{asset('vendor/css/bootstrap.min.css')}}" />

		<!-- bootsnav -->
		<link rel="stylesheet" href="{{asset('vendor/css/bootsnav.css')}}"/>

		<!--style.css-->
		<link rel="stylesheet" href="{{asset('vendor/css/style.css')}}" />

		<!--responsive.css-->
		<link rel="stylesheet" href="{{asset('vendor/css/responsive.css')}}" />

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
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


		<!--about-us start -->
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
										<button  class="about-view">
											Bergabung
										</button>
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

        <!--service start-->
		<section id="service" class="service">
			<div class="container">

				<div class="service-counter text-center">

					<div class="col-md-4 col-sm-4">
						<div class="single-service-box">
							<div class="service-img">
								<img src="vendor/images/service/s1.png" alt="service-icon" />
							</div><!--/.service-img-->
							<div class="service-content">
								<h2>
									<a href="#">
									Infomasi Terupdate
									</a>
								</h2>
								<p>Duis aute irure dolor in  velit esse cillum dolore eu fugiat nulla.</p>
							</div><!--/.service-content-->
						</div><!--/.single-service-box-->
					</div><!--/.col-->

					<div class="col-md-4 col-sm-4">
						<div class="single-service-box">
							<div class="service-img">
								<img src="vendor/images/service/s2.png" alt="service-icon" />
							</div><!--/.service-img-->
							<div class="service-content">
								<h2>
									<a href="#">
										Transaksi aman
									</a>
								</h2>
								<p>Duis aute irure dolor in  velit esse cillum dolore eu fugiat nulla.</p>
							</div><!--/.service-content-->
						</div><!--/.single-service-box-->
					</div><!--/.col-->

					<div class="col-md-4 col-sm-4">
						<div class="single-service-box">
							<div class="statistics-img">
								<img src="vendor/images/service/s3.png" alt="service-icon" />
							</div><!--/.service-img-->
							<div class="service-content">

								<h2>
									<a href="#">
										kualitas terjamin
									</a>
								</h2>
								<p>Duis aute irure dolor in  velit esse cillum dolore eu fugiat nulla.</p>
							</div><!--/.service-content-->
						</div><!--/.single-service-box-->
					</div><!--/.col-->

				</div><!--/.statistics-counter-->
			</div><!--/.container-->

		</section><!--/.service-->
		<!--service end-->

		<!--galley start-->
		<section id="gallery" class="gallery">
			<div class="container">
				<div class="gallery-details">
					<div class="gallary-header text-center">
						<h2>
							Informasi Kayu
						</h2>
						<p>
							macam-macam kayu memiliki keunikan masing-masing
						</p>
					</div><!--/.gallery-header-->
					<div class="gallery-box">
						<div class="gallery-content">
						  	<div class="filtr-container">
						  		<div class="row">
                                    @foreach ($kayu as $kayus)
						  			<div class="col-md-6">
						  				<div class="filtr-item">
											<img src="{{ asset('/images/kayu/'.$kayus->foto) }}" alt="portfolio image"/>
											<div class="item-title">
												<a href="#">
													{{ $kayus->nama_kayu }}
												</a>
												{{-- <p><span>20 tours</span><span>15 places</span></p> --}}
											</div><!-- /.item-title -->
										</div><!-- /.filtr-item -->
                                      </div><!-- /.col -->
                                      @endforeach

						  		</div><!-- /.row -->

						  	</div><!-- /.filtr-container-->
						</div><!-- /.gallery-content -->
					</div><!--/.galley-box-->
				</div><!--/.gallery-details-->
			</div><!--/.container-->

		</section><!--/.gallery-->
		<!--gallery end-->

		<!--packages start-->
		<section id="pack" class="packages">
			<div class="container">
				<div class="gallary-header text-center">
					<h2>
						Daftar Lelang
					</h2>
					<p>
						Berikut adalah daftar lelang yang masih berjalan
					</p>
				</div><!--/.gallery-header-->
				<div class="packages-content">
					<div class="row">
                        @foreach ($lelang as $lelangs)
						<div class="col-md-4 col-sm-6">
							<div class="single-package-item">
								<img src="{{ asset('/images/kayu/'.$lelangs->kayu->foto) }}" alt="package-place">
								<div class="single-package-item-txt">
									<h3>{{ $lelangs->kayu->nama_kayu }}<span class="pull-right">IDR {{ $lelangs->harga_awal }}</span></h3>
									<div class="packages-para">
										<p>
											<span>
												<i class="fa fa-angle-right"></i>Dimulai Tanggal {{ $lelangs->tanggal_mulai }}
                                            </span>
                                            <span>
                                            <i class="fa fa-angle-right"></i>  Selesai Tanggal {{ $lelangs->tanggal_selesai }}
                                            </span>
										</p>
										{{-- <p>
											<span>
												<i class="fa fa-angle-right"></i>  transportation
											</span>
											<i class="fa fa-angle-right"></i>  food facilities
										 </p> --}}
									</div><!--/.packages-para-->
									<div class="packages-review">
										<p>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<span>2544 review</span>
										</p>
									</div><!--/.packages-review-->
									<div class="about-btn" >
										{{-- <button  class="about-view packages-btn" href="{{ route('hasil_lelang_detail', ['id' => IDCrypt::Encrypt( $lelangs->id)])}}"> --}}
										@if(isset($hasil_lelang))
                                                <a href="{{ route('hasil_lelang_detail', ['id' => IDCrypt::Encrypt( $lelangs->id)])}}" class="about-view packages-btn ">Detail</a>
										@else
										<a href="#" class="about-view packages-btn ">Belum ada peserta lelang</a>
										@endif
										{{-- </button> --}}
									</div><!--/.about-btn-->
								</div><!--/.single-package-item-txt-->
							</div><!--/.single-package-item-->

                        </div><!--/.col-->
                        @endforeach

					</div><!--/.row-->
				</div><!--/.packages-content-->
			</div><!--/.container-->

		</section><!--/.packages-->
		<!--packages end-->



		<!--special-offer start-->
		<section id="spo" class="special-offer">
			<div class="container">
				<div class="special-offer-content">
					<div class="row">
						<div class="col-sm-8">
							<div class="single-special-offer">
								<div class="single-special-offer-txt">
                                    <h2>Dinas Kehutanan <small style="color:white;">Provinsi Kalimantan Selatan</small></h2>
                                    <h4></h4>
									<div class="packages-review special-offer-review">

									</div><!--/.packages-review-->
									<div class="packages-para special-offer-para">
										<p>
											<span>
											 diisi alamat
										</p>

										<p class="offer-para">
											Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tem ut labore et dolore magna  aliqua. Ut enim ad minim veniam, quis nostrud exercitation una <br> ullamco laboris nisi ut aliquip ex ea commodo consequat.
										</p>
									</div><!--/.packages-para-->
									<div class="offer-btn-group">
										<div class="about-btn">
											<button  class="about-view packages-btn offfer-btn">
												make tour
											</button>
										</div><!--/.about-btn-->
										<div class="about-btn">
											<button  class="about-view packages-btn">
												book now
											</button>
										</div><!--/.about-btn-->
									</div><!--/.offer-btn-group-->
								</div><!--/.single-special-offer-txt-->
							</div><!--/.single-special-offer-->
						</div><!--/.col-->
						<div class="col-sm-4">
							<div class="single-special-offer">
								<div class="single-special-offer-bg">
									<img src="vendor/images/offer/offer-shape.png" alt="offer-shape">
								</div><!--/.single-special-offer-bg-->
								<div class="single-special-shape-txt">
									<h3>special offer</h3>
									<h4><span>40%</span><br>off</h4>
									<p><span>$999</span><br>reguler $ 1450</p>
								</div><!--/.single-special-shape-txt-->
							</div><!--/.single-special-offer-->
						</div><!--/.col-->
					</div><!--/.row-->
				</div><!--/.special-offer-content-->
			</div><!--/.container-->

		</section><!--/.special-offer end-->
		<!--special-offer end-->

		<!--blog start-->
		<section id="blog" class="blog">
			<div class="container">
				<div class="blog-details">
						<div class="gallary-header text-center">
							<h2>
								Berita Terbaru
							</h2>
							<p>
								Kumpulan berita seputar lelang kayu
                            </p>

						</div><!--/.gallery-header-->
						<div class="blog-content">
                                @foreach ($berita as $beritas)
							<div class="row">


								<div class="col-sm-4 col-md-4">
									<div class="thumbnail">

                                            <h2>trending news <span>{{ $beritas->created_at }}</span></h2>
                                            <div class="thumbnail-img">
                                                    {{-- <img src="{{asset('/images/berita/'.$berita->foto)}}" alt="" width="100%"> --}}
                                                <img src="{{ asset('/images/berita/'.$beritas->foto) }}" alt="blog-img">
                                                <div class="thumbnail-img-overlay"></div><!--/.thumbnail-img-overlay-->

                                            </div><!--/.thumbnail-img-->

                                            <div class="caption">
                                                <div class="blog-txt">
                                                    <h3>
                                                        <a href="#">
                                                            {{ $beritas->judul }}
                                                        </a>
                                                    </h3>
                                                    <p>
                                                        {{ $beritas->isi }}
                                                    </p>
                                                    <a href="{{ route('berita_tampil', ['id' => IDCrypt::Encrypt( $beritas->id)])}}">Read More</a>
                                                </div><!--/.blog-txt-->
                                            </div><!--/.caption-->
                                        </div><!--/.thumbnail-->



                                </div><!--/.col-->
                                @endforeach



							</div><!--/.row-->
						</div><!--/.blog-content-->
					</div><!--/.blog-details-->
				</div><!--/.container-->

		</section><!--/.blog-->
		<!--blog end-->

		<!-- footer-copyright start -->
		<footer  class="footer-copyright">
			<div class="container">
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




		<script src="{{asset('vendor/js/jquery.js')}}"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->

		<!--modernizr.min.js-->
		<script  src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>


		<!--bootstrap.min.js-->
		<script  src="{{asset('vendor/js/bootstrap.min.js')}}"></script>

		<!-- bootsnav js -->
		<script src="{{asset('vendor/js/bootsnav.js')}}"></script>

		<!-- jquery.filterizr.min.js -->
		<script src="{{asset('vendor/js/jquery.filterizr.min.js')}}"></script>

		<script  src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

		<!--jquery-ui.min.js-->
        <script src="{{asset('vendor/js/jquery-ui.min.js')}}"></script>

        <!-- counter js -->
		<script src="{{asset('vendor/js/jquery.counterup.min.js')}}"></script>
		<script src="{{asset('vendor/js/waypoints.min.js')}}"></script>

		<!--owl.carousel.js-->
        <script  src="{{asset('vendor/js/owl.carousel.min.js')}}"></script>

        <!-- jquery.sticky.js -->
		<script src="{{asset('vendor/js/jquery.sticky.js')}}"></script>

        <!--datepicker.js-->
        <script  src="{{asset('vendor/js/datepicker.js')}}"></script>

		<!--Custom JS-->
		<script src="{{asset('vendor/js/custom.js')}}	"></script>


	</body>

</html>
