	<!DOCTYPE html>
<!--[if lt IE 7 ]><html dir="ltr" lang="en-US" class="no-js ie ie6 lte7 lte8 lte9"><![endif]-->
<!--[if IE 7 ]><html dir="ltr" lang="en-US" class="no-js ie ie7 lte7 lte8 lte9"><![endif]-->
<!--[if IE 8 ]><html dir="ltr" lang="en-US" class="no-js ie ie8 lte8 lte9"><![endif]-->
<!--[if IE 9 ]><html dir="ltr" lang="en-US" class="no-js ie ie9 lte9"><![endif]-->
<!--[if IE 10 ]><html dir="ltr" lang="en-US" class="no-js ie ie10 lte10"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="vi">
<!--<![endif]-->

<head>
	<title>@yield('title')</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="robots" content="index,follow"/>
    <meta http-equiv="content-language" content="vi"/>
    <meta name="description" content="@yield('site_description')"/>
    <meta name="keywords" content="@yield('site_keywords')"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
    <link rel="shortcut icon" href="@yield('favicon')" type="image/x-icon"/>
    <link rel="canonical" href="{{ url()->current() }}"/>        
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="@yield('site_description')" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:site_name" content="iCho.vn" />
    <?php $socialImage = isset($socialImage) ? $socialImage : $settingArr['banner']; ?>
    <meta property="og:image" content="{{ Helper::showImage($socialImage) }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="@yield('site_description')" />
    <meta name="twitter:title" content="@yield('title')" />        
    <meta name="twitter:image" content="{{ Helper::showImage($socialImage) }}" />
	<link rel="icon" href="{{ URL::asset('assets/images/favicon.ico') }}" type="image/x-icon">
	<!-- <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}" type="image/x-icon">
	<link rel="icon" href="{{ URL::asset('assets/images/favicon.ico') }}" type="image/x-icon"> -->
	<!-- ===== Style CSS ===== -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/style.css') }}">
	<!-- ===== Responsive CSS ===== -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/responsive.css') }}">

	<!-- ===== Responsive CSS ===== -->
  <!-- <link href="{{ URL::asset('assets/css/responsive.css') }}" rel="stylesheet"> -->

  <!-- HTML5 Shim and Respond.js') }} IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js') }} doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<link href='{{ URL::asset('assets/css/animations-ie-fix.css') }}' rel='stylesheet'>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}"></script>
		<script src="https://oss.maxcdn.com/libs/respond.{{ URL::asset('assets/js/1.4.2/respond.min.js') }}"></script>
	<![endif]-->
</head>

<body>
	<section class="wrapper">

		<section class="loading-container" id="loading">
		    <div class="loading-inner">
		      <span class="loading-1"></span>
		      <span class="loading-2"></span>
		      <span class="loading-3"></span>
		    </div>
		</section>
		<!-- preloader -->
		
		<header id="header" class="header">
			
			<div class="block-banner container">
				<a href="{{ route('home') }}"><img src="http://linhkienkhanhdat.com/uploads/2017/06/28/bang-hieu-khanh-dat-1498618671.jpg" alt="banner khanh dat"></a>
			</div>
			<nav id="mainNav" class="navbar navbar-default navbar-custom fixed-header">
		        <div class="container" id="main-menu">
		        	<!-- Brand and toggle get grouped for better mobile display -->
					<div class="header-search-box search-on-mobile">
			        	<form class="form-inline mainsearch"  method="GET" action="{{ route('search') }}">            
			              <input type="text" autocomplete="off" name="keyword" placeholder="Bạn mua gì hôm nay?" maxlength="50" value="{{ isset($tu_khoa) ? $tu_khoa : "" }}">

			              <button type="submit"><i class="fa fa-search"></i></button>
			            </form>
		            </div>
			        <div class="navbar-header">
			            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			              <span class="sr-only">Toggle navigation</span><i class="fa fa-bars"></i>
			            </button>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse menu" id="bs-example-navbar-collapse-1">
						<div class="text-center logo-menu-res">
							<a title="Logo" href="index.html"><img src="{{ URL::asset('assets/images/logo.png') }}" alt="Logo"></a>
						</div>
						<ul class="nav navbar-nav navbar-left">
							<li><a href="{!! route('home') !!}">Trang chủ</a></li>
							
							<li class="level0 parent">
								<a href="" title="Danh mục sản phẩm">Danh mục sản phẩm</a>
								<ul class="level0 submenu submenu-white">
									@foreach($loaiSpList as $loaiSp)
									<li class="level1"><a href="{{ route('danh-muc', [$loaiSp->slug])}}" title="{!! $loaiSp->name !!}">{!! $loaiSp->name !!}</a></li>
									@endforeach
									
								</ul>
							</li>
											
							<li><a class="" href="{{ route('si') }}">Báo giá bán sỉ</a></li>
						</ul>
					</div><!-- /.navbar-collapse -->
		        </div>
	    	</nav><!-- END NAVIGATION -->
		</header><!-- /header -->

		<section class="container">
			
			@yield('slider')

			@yield('content')

		</section><!-- /container -->

		<footer class="footer">
			<section class="block-ft">
				<div class="container">
					<ul class="row">
						<li class="col-sm-5 col-xs-12 block-contact-ft">
							<p>CTY TNHH TM XNK Khánh Đạt</p>
						</li>
						<li class="col-sm-5 col-xs-12 block-phone-ft">
							<p>Hotline: <span style="color:#FFF;font-size:20px">0909.900.862</span> (7:30 - 22:00)</p>
						</li>
						<li class="col-sm-2 col-xs-12 box-accordion block-accordion-ft">
							<p class="accordion-header">
								Thông Tin Khác
								<a href="javascript:void(0);" class="btn-opened" title="Down Up"></a>
							</p>
						</li>
					</ul>
				</div>
			</section><!-- /block-ft -->
			<section class="container-fluid box-collapse">
				<div class="block-ftm row">
					<div class="container">
						<div class="row">
							<div class="col-sm-5 col-xs-12">
								<img src="{{ URL::asset('assets/images/bct.png') }}" alt="Đã đăng ký bộ công thương">
								<p class="registered-bct">
									GPĐKKD số 0314444704<br>
									do sở KHĐT Tp.HCM cấp ngày 20/05/2017
								</p>
							</div>
							<div class="col-sm-4 col-xs-12">
								<ul class="menu-ft">
									<li><a href="#" title="">Chính sách giao hàng</a></li>
									<li><a href="#" title="">7 ngày đổi trả miễn phí</a></li>
									<li><a href="#" title="">Hướng dẵn mua hàng</a></li>
								</ul><!-- /menu-ft -->
							</div>
							<div class="col-sm-3 col-xs-12">
								<ul class="menu-ft">
									<li><a href="#" title="">Tìm trung tâm bảo hành</a></li>
									<li><a href="contact.html" title="">Liên hệ góp ý</a></li>
									<li><a href="#" title="">Quy chế chung</a></li>
								</ul><!-- /menu-ft -->
							</div>	
						</div>
					</div>
				</div><!-- /block-ftm -->
			</section><!-- /block-ftm -->
			<section class="container-fluid block-ftb">
				<div class="container">
					<p>54 Lũy Bán Bích, Phường Tân Thới Hoà, Quận Tân Phú, HCM</p>
				</div>
			</section><!-- /block-ftb -->
		</footer><!-- /footer -->
		<div class="block-add block-call"><a href="tel:0909900862"><i class="fa fa-phone-square"></i>0909.900.862</a></div><!-- /.block-call -->
		<div class="block-add block-view-price"><a href="{{ route('si') }}"><i class="fa fa-file"></i> Xem Bảng Giá Sỉ</a></div><!-- /.block-view-price -->
		<a id="return-to-top" class="td-scroll-up" href="javascript:void(0)">
			<i class="fa fa-angle-up" aria-hidden="true"></i>
		</a>
		<!-- RETURN TO TOP -->

	</section>
	<!-- wrapper -->

	<!-- ===== JS ===== -->
	<script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
	<script src="{{ URL::asset('assets/vendor/bootstrap/bootstrap.min.js') }}"></script>
	<!-- sticky -->
	<script src="{{ URL::asset('assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
	<!-- sticky -->
	<script src="{{ URL::asset('assets/vendor/sticky/jquery.sticky.js') }}"></script>
	<!-- Js Common -->
	<script src="{{ URL::asset('assets/js/common.js') }}"></script>
	@yield('javascript_page')
</body>
</html>
