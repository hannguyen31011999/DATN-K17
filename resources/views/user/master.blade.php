	<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="shortcut icon" href="{{asset('img\logo\logo2.jpg') }}">
	<title>@yield('title')</title>
	<link href="http://fonts.googleapis.com/css?family=Dosis:300,400" rel='stylesheet' type='text/css'>
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="{{asset('user/assets/dest/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('user/assets/dest/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('user/assets/dest/vendors/colorbox/example3/colorbox.css')}}">
	<link rel="stylesheet" href="{{asset('user/assets/dest/rs-plugin/css/settings.css')}}">
	<link rel="stylesheet" href="{{asset('user/assets/dest/rs-plugin/css/responsive.css')}}">
	<link rel="stylesheet" title="style" href="{{asset('user/assets/dest/css/style.css')}}">
	<!-- <link rel="stylesheet" href="{{asset('user/assets/dest/css/animate')}}"> -->
	<link rel="stylesheet" title="style" href="{{asset('user/assets/dest/css/huong-style.css')}}">
	@yield('css')
	<style type="text/css">
		ul {
			list-style: none;
		}
		.fa-shopping-cart
		{
			margin-top: 3px;
		}
		.header-body {
			padding: 14px 0 0px;
			background: #0277b8;
		}

		.cart-item .media {
			line-height: 100%;
			padding-right: 0px;
		}

		.cart-item {
			position: relative;
			padding: 20px 0;
			border-bottom: 1px solid #e1e1e1;
			font-size: 15px;
			font-family: sans-serif;
		}

		.aside .widget {
			background: #f9f9f9;
			border-radius: 5px;
		}

		button.btn.btn-default.btn-circle.btn-xl {
			border-radius: 50%;
			width: 45px;
			height: 44px;
			box-shadow: inset 0px 1px 0px 0px #ffffff;

			background-color: #f9f9f9;

			border: 1px solid #dcdcdc;
			display: inline-block;
			cursor: pointer;
			color: #000000;

			font-size: 19px;
			font-weight: bold;

			text-shadow: 1px 0px 0px #f6f6f6;
		}

		#content {
			padding: 60px 0;
			font: message-box;
		}

		ul.nav-user {
			font-size: 16px;
			padding: 25px;
			color: white;
			margin-left: 65%;
		}

		li.font-li {
			padding: 10px;
			margin-top: 35px;
			margin-left: 70px;
		}

		.your-order-item {
			padding: 10px 0;
			border-bottom: 1px solid #f8f8f8;
			font-size: x-large;
		}

		@media (max-width: 767px) {
			.back-to-top.hien-ra {
				visibility: visible;
				opacity: 1;
				padding: -48px;
				margin-right: 12%;
			}
			a#logo img {
    max-width: 101%!important;
}
ul.nav-user-s {
   
     margin-left: 1% !important;
}

			input#seach {
				width: 41%;
				height: 38px;
				float: left;
				margin-right: 8px;
			}

			.main-menu ul li {
				float: none;
				width: 100%;
				padding: 10px;
			}

			.main-menu>ul.l-inline>li>a {
				padding: 19px 5px;
				font-weight: bold !important;
				margin-bottom: -5px;
				text-shadow: 3px 5px 2px #474747;
			}

			.pull-right.beta-components.space-left.ov {
				margin: -313px -5px 4px -1px !important;
				width: 42%;
			}
			.navbar-nav {
    margin: -4.5px 50px;
}
			.cart-body {
				overflow: auto;
				height: 239px;
				z-index: 999;
				width: 90%;
				border-radius: 5px;
			}

			ul.nav-user {
				font-size: 16px;
    padding: 24px;
    color: white;
    margin-left: 0%;
			}

			li.font-li {
				padding: 2px;
				margin-top: 2px;
				margin-left: 100%;
			}
		}

		.list-seach {
			position: absolute;
			border: 1px solid #e1e1e1;
			width: 220px;
			height: 150px;
			margin-top: .5rem;
			z-index: 600;
			background-color: #fff;
			border-radius: 2px;
			box-shadow: 0 1px 4px 0 rgba(0, 0, 0, .26);
			overflow: auto;
			display: none;
			cursor: default;
		}

		.messenger-errors {
			color: red;
			padding: 5px;
		}

		ul.dropdown-menu li {
			padding: 1px;
		}

		.main-menu>ul.l-inline>li>a {
			padding: 19px 5px;
			font-weight: bold !important;
			margin-bottom: -5px;
		}
		.dropdown-menu>li>a:hover, .dropdown-menu>li>a:focus {
    
    background-color: #3a5c83;
}
		.dropdown-menu>li>a {
			display: block;
			padding: 15px 13px;
			clear: both;
			font-weight: 400;
			line-height: 1.428571429;
			color: #333;
			/* width: 97px; */
			white-space: nowrap;
			height: 50px;
		}

		a i {
			font-size: 20px;
		}

		.main-menu li {
			top: -2px;
		}

		.pull-right.beta-components.space-left.ov {
			margin: 12px 0px 4px 0px;
		}

		.header-bottom {
			height: 65spx;
		}

		.button {
			display: inline-block;
			border-radius: 4px;
			background-color: #0277b8;
			border: none;
			color: #FFFFFF;
			text-align: center;
			font-size: 21px;
			padding: 11px;
			width: 175px;
			transition: all 0.5s;
			cursor: pointer;
		}

		.button span {
			cursor: pointer;
    display: inline-block;
    position: relative;
    transition: 0s;
    color: cornsilk;
		}

		.button span:after {
			position: absolute;
			opacity: 0;
			top: 0;
			right: -20px;
			transition: 0.5s;
		}

		.button:hover span {
			padding-right: 25px;
		}

		.button:hover span:after {
			opacity: 1;
			right: 0;
		}

		.buttons {
			display: inline-block;
			border-radius: 4px;
			background-color: #f9f9f9;
			border: none;
			color: #111111;
			text-align: center;
			font-size: 21px;
			padding: 11px;
			width: 175px;
			transition: all 0.5s;
			cursor: pointer;
			margin: 5px;
		}

		.buttons span {
			cursor: pointer;
			display: inline-block;
			position: relative;
			transition: 0.5s;
		}

		.buttons span:after {
			position: absolute;
			opacity: 0;
			top: 0;
			right: -20px;
			transition: 0.5s;
		}

		.buttons:hover span {
			padding-right: 25px;
		}

		.buttons:hover span:after {
			opacity: 1;
			right: 0;
		}

		.main-menu-cd {
			width: 100%;
    background-color: #0277b8;
    display: block;
    box-shadow: 0px 0px 5px rgb(11 11 11);
    position: fixed;
    margin-top: -3px;
    margin-bottom: -3px;
    top: 0;
    left: 0;
    background: #0277b8;
    z-index: 100000;
		}

		.navbar-custom {
			background-color: #229922;
			color: #ffffff;
			border-radius: 0;
			font-size: 15px;
		}

		.navbar-custom .navbar-nav>li>a {
			color: #fff;
		}

		.navbar-custom .navbar-nav>.active>a {
			color: #ffffff;
			background-color: transparent;
		}

		.navbar-custom .navbar-nav>li>a:hover,
		.navbar-custom .navbar-nav>li>a:focus,
		.navbar-custom .navbar-nav>.active>a:hover,
		.navbar-custom .navbar-nav>.active>a:focus,
		.navbar-custom .navbar-nav>.open>a {
			text-decoration: none;
			background-color: #33aa33;
		}

		.navbar-custom .navbar-brand {
			color: #eeeeee;
		}

		.navbar-custom .navbar-toggle {
			background-color: #eeeeee;
		}

		.navbar-custom .icon-bar {
			background-color: #33aa33;
		}

		.back-to-top {
			box-shadow: 0px 10px 14px -7px #276873;
			background-color: #599bb3;
			border-radius: 50%;
			display: inline-block;
			cursor: pointer;
			font-size: 20px;
			font-weight: bold;
			padding: 15px 16px;
			text-shadow: 0px 1px 0px #3d768a;
			background: rgb(0, 0, 0, 0.7);
			color: whitesmoke;
			vertical-align: center;
			position: fixed;
			bottom: 20px;
			right: 0%;
			margin-left: 0px;
			visibility: hidden;
			opacity: 0;
			z-index: 100000;
		}

		.back-to-top:hover {
			background: linear-gradient(to bottom, #408c99 5%, #599bb3 100%);
			background-color: #408c99;
		}

		.back-to-top.hien-ra {
			visibility: visible;
			opacity: 1;
		}

		.beta-btn primary {
			display: inline-block;
			vertical-align: middle;
			-webkit-transform: perspective(1px) translateZ(0);
			transform: perspective(1px) translateZ(0);
			box-shadow: 0 0 1px rgba(0, 0, 0, 0);
			position: relative;
			-webkit-transition-property: color;
			transition-property: color;
			-webkit-transition-duration: 0.3s;
			transition-duration: 0.3s;
		}

		.cart-body {
			overflow: auto;
			height: 240px;
			z-index: 999;

			float: right;
			background: white;
			width: 320px;
			/* position: relative; */
			border-radius: 3px;
			padding: 20px;
		}

		.cart-body:after {
			right: 0;
			top: 0;
			border: solid transparent;
			content: " ";
			height: 0;
			width: 0;
			position: absolute;
			pointer-events: none;
			border-top-color: #0277b8;
			border-width: 8px;
			margin-left: -1px;
			border-right-color: #0277b8;
		}

		.add-to-cart {
			width: 45px;
			position: relative;
			height: 43px;
			background-color: #0277b8;
			border: none;
			font-size: 28px;
			color: #0d0c0c;
			text-align: center;
			transition-duration: 0.4s;
			text-decoration: none;
			overflow: hidden;
			cursor: pointer;
			text-shadow: 0px 1px 0px #686b8d;
			border-radius: 2px;
		}
		.add-to-cart:after {
			content: "";
			background: #f90;
			display: block;
		
			padding-top: 300%;
			padding-left: 350%;
			margin-left: -20px !important;
			margin-top: -120%;
			opacity: 0;
			transition: all 1.8s
		}

		.add-to-cart:active:after {
			padding: 0;
			margin: 0;
			opacity: 1;
			transition: 0s
		}

		.beta-btn.primary {
			display: inline-block;
			border-radius: 4px;
			background-color: #0277b8;
			border: none;
			color: #FFFFFF;
			text-align: center;
			font-size: 21px;
			padding: 11px;
			width: 78%;
			transition: all 0.5s;
			cursor: pointer;
		}

		.beta-btn.primary span:after {
			content: '\00bb';

			opacity: 0;
			top: 0;

			margin-left: 17px;
			transition: 1.0s;
		}

		.beta-btn.primary:hover span {
			padding-right: 25px;
		}

		.beta-btn.primary:hover span:after {
			opacity: 1;
			right: 0;
		}

		.aside .widget-title {

			border: 1px solid #0277b8;
			border-left: 3px solid #0277b8;
			color: #0277b8;
		}

		h4,
		.h4 {
			color: #0277b8;
			font-family: inherit;
		}

		.single-item-title {
			font-size: 16px;
			margin-bottom: 7px;
			text-shadow: #0277b8 3px 2px 5px;
		}

		.woocommerce-tabs .panel {
			background: #f9f9f9;
		}

		.woocommerce-tabs ul.tabs li a {
			box-shadow: 0px 0px 19px 0px #000000;
		}

		.cart .beta-select {
			position: static;
			font-size: initial;
			text-shadow: 1 1 2px #000;
			font-size: 17px;
			letter-spacing: -0.8px;
			word-spacing: 2.8px;
			color: white;
			font-weight: 700;
			text-decoration: none solid rgb(68, 68, 68);
			font-style: normal;
			font-variant: normal;
			text-transform: none;
		}

		.flash-sale {
    color: #ff2127;
}
.beta-products-details {
    /* font-size: 15px; */
    /* margin-bottom: 17px; */
    font-size: 17px;
    margin-bottom: 7px;
    text-shadow: #ff0000 3px 2px 5px;
}
ul.nav-user {
    font-size: 16px;
    padding: 56px;
    color: white;
    margin-left: 67%;
}
ul.nav-user-s {
    font-size: 16px;
    padding: 10px;
    color: white;
    margin-left: 67%;
}
.button-dr{
	display: inline-block;
    border-radius: 4px;
    background-color: #f9f9f9;
    border: none;
    color: #111111;
    text-align: center;
    font-size: 21px;
    padding: 11px;
    width: 175px;
    transition: all 0.5s;
    cursor: pointer;
    margin: 5px;
}
	</style>

</head>

<body>
	<div id="header">
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="{{route('home')}}" id="logo"><img src="{{asset('user/logo.png')}}" width="200px" alt=""></a>
				</div>
				<ul class="nav navbar-nav">
					<li class="font-li"><button type="button" onclick="window.location.href='https://instagram.com'" class="btn btn-default btn-circle btn-xl"><i class="fa fa-instagram  font-20"></i></button></li>
					<li class="font-li"><button type="button" onclick="window.location.href='https://www.google.com/search?sxsrf=ALeKk009ZwYn99W-n0R2C-_fALo2h-9bog:1597931659348&source=hp&ei=hoA-X9b2DJONoASztrPgBQ&q=ti%E1%BB%87m%20b%C3%A1nh%20ng%E1%BB%8Dc%20trinh&oq=ti%E1%BB%87m+b%C3%A1nh+ng%E1%BB%8Dc+trinh&gs_lcp=CgZwc3ktYWIQAzICCAAyBggAEBYQHjICCCYyAggmMgIIJjoHCCMQ6gIQJzoJCCMQ6gIQJxATOgQIIxAnOgQIABBDOgUIABCxAzoECC4QQzoICAAQsQMQgwE6CggAELEDEIMBEAo6AgguOgcIIxCxAhAnOgQIABAKOgcIABAKEMsBUMIPWIAiYNAjaAlwAHgHgAFuiAGfFZIBBDIyLjeYAQCgAQGqAQdnd3Mtd2l6sAEK&sclient=psy-ab&ved=2ahUKEwjJ3rin96nrAhUcy4sBHRwQAo8QvS4wAXoECAwQDg&uact=5&npsic=0&rflfq=1&rlha=0&rllag=10813287,106716762,12894&tbm=lcl&rldimm=8296757139943377445&lqi=Chl0aeG7h20gYsOhbmggbmfhu41jIHRyaW5oWjYKGXRp4buHbSBiw6FuaCBuZ-G7jWMgdHJpbmgiGXRp4buHbSBiw6FuaCBuZ-G7jWMgdHJpbmg&phdesc=FPa_Ea8rHRQ&rldoc=1&tbs=lrf:!3sIAE,lf:1,lf_ui:9&rlst=f#rldoc=1'" class="btn btn-default btn-circle btn-xl"><i class="fa fa-map-marker font-20"></i></button></a></li>
					<li class="font-li"><button type="button" onclick="window.location.href='https://www.facebook.com'" class="btn btn-default btn-circle btn-xl"><i class="fa fa-facebook-square"></i></button></a></li>
					<li class="font-li"><button type="button" onclick="window.location.href='https://twitter.com'" class="btn btn-default btn-circle btn-xl"><i class="fa fa-twitter"></i></button></a></li>

				</ul>
				@if(Auth::check()&&Session::has('email')&&Session::has('id')&&Session::get('role')==1)
				<ul class="nav-user">
					<div class="dropdown">
						<a class="button-dr" style="display: initial; text-decoration: none;vertical-align:middle" data-toggle="dropdown"><span><i class="fa fa-bars"></i></span></a>
						<ul class="dropdown-menu">
							<li><a class="button" href="{{url('/account/profile')}}" style="width: auto;text-decoration: none;vertical-align:middle"><span><i class="fa fa-user"></i>Thông tin tài khoản</span></a></li>
							<li><a class="button" href="{{url('/account/purchase')}}" style="width: auto;text-decoration: none;vertical-align:middle"><span><i class="fa fa-clock-o"></i> Lịch sử mua hàng</span></a></li>
							<li><a class="button" href="{{url('/account/logout')}}" style="width: auto;text-decoration: none;vertical-align:middle"><span><i class="fa fa-sign-out"></i>Đăng xuất</span></a></li>
						</ul>
					</div>
				</ul>
				@else
				<ul class="nav-user-s">
					<li><a class="buttons" href="{{url('/account/register')}}" style="width: auto;text-decoration: none;vertical-align:middle"><span><i class="fa fa-user"></i> Đăng kí</span></a></li>
					<li><a class="buttons" href="{{url('/account/login')}}" style="width: auto;text-decoration: none;vertical-align:middle"><span><i class="fa fa-sign-in"></i> Đăng nhập</span></a></li>
					</li>
				</ul>
				@endif


			</div> <!-- .container -->
		</div> <!-- .header-body -->

		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<div class="menu-cd">
				<nav class="main-menu">

					<ul class="l-inline ov">
						<li><a class="button" href="{{route('home')}}" style="text-decoration: none;vertical-align:middle"><i class="fa fa-home"></i><span>Trang chủ </span></a></li>
						<li class="dropdown">
							<a class="button" style="text-decoration: none;vertical-align:middle" data-toggle="dropdown"><span>Sản phẩm <i class="fa fa-chevron-right"></i></span></a>
							<ul class="dropdown-menu">
								@foreach($menu as $menu)
								<li><a class="button" href="{{url('/chi-tiet-'.utf8tourl($menu->type_name).'.'.$menu->id)}}" style="vertical-align:middle"><span>{{$menu->type_name}}</span></a></li>
								@endforeach
							</ul>
						</li>
						<li> <a class="button" href="{{url('gioi-thieu')}}" style="text-decoration: none;vertical-align:middle"> <span>Giới thiệu</span></a></li>
						<li> <a class="button" href="{{url('/tin-tuc')}}" style="text-decoration: none;vertical-align:middle"> <span>Tin tức</span></a></li>
						<li>
							<div class="pull-right beta-components space-left ov">
								<div class="beta-comp">
									<form role="search" method="get" id="searchform" action="{{url('/seach')}}">
										<input type="text" value="" name="keyword" id="keyword" placeholder="Nhập từ khóa..." />
										<button class="fa fa-search" type="submit" id="searchsubmit"></button>
									</form>
									<div class="list-seach" id="list-seach">
										@include('user.template.seach')
									</div>
								</div>
								@yield('shopping-cart')
								<div class="clearfix"></div>
							</div>
						</li>
					</ul>

					<div class="clearfix"></div>
				</nav>
				</div>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->
	<div class="back-to-top"><i class="fa fa-arrow-up"></i></div>


	@yield('slider')

	<div class="container" id="tag_container">
		@yield('content')
	</div> <!-- .container -->

	<div id="footer" class="color-div">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="widget">
						<h4 class="widget-title">Instagram Shop</h4>
						<div id="beta-instagram-feed" style="display: none;">
							<div></div>
						</div>
						<ul>
							<li><a href="https://www.instagram.com/"><i class="fa fa-chevron-right"></i>Link Instagram</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="widget">
						<h4 class="widget-title">Những chính sách</h4>
						<div>
							<ul>
								<li><a href="{{url('chinh-sach-quy-dinh')}}"><i class="fa fa-chevron-right"></i>Chính sách và quy định chung</a></li>
								<li><a href="{{url('chinh-sach-thanh-toan')}}"><i class="fa fa-chevron-right"></i>Chính sách giao dịch, thanh toán</a></li>
								<li><a href="{{url('chinh-sach-bao-mat')}}"><i class="fa fa-chevron-right"></i>Chính sách bảo mật</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="col-sm-10">
						<div class="widget">
							<h4 class="widget-title">Liên hệ với chúng tôi</h4>
							<div>
								<div class="contact-info">
									<i class="fa fa-map-marker"></i>
									<p>53 đường 144,khu phố 3,phường Tân Phú,Quận 9,TPHCM</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> <!-- .row -->
		</div> <!-- .container -->
	</div> <!-- #footer -->
	<div class="copyright">
		<div class="container">
			<p class="pull-left">CDTH17 PMA. (&copy;) 2020</p>
			<div class="clearfix"></div>
		</div> <!-- .container -->
	</div> <!-- .copyright -->
	@yield('js')

	<!-- include js files -->
	<script src="{{asset('user/assets/dest/js/jquery.js')}}"></script>
	<script src="{{asset('user/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js')}}"></script>
	<script src="{{asset('user/assets/dest/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('user/assets/dest/vendors/bxslider/jquery.bxslider.min.js')}}"></script>
	<script src="{{asset('user/assets/dest/vendors/colorbox/jquery.colorbox-min.js')}}"></script>
	<script src="{{asset('user/assets/dest/vendors/animo/Animo.js')}}"></script>
	<script src="{{asset('user/assets/dest/vendors/dug/dug.js')}}"></script>
	<script src="{{asset('user/assets/dest/js/scripts.min.js')}}"></script>
	<script src="{{asset('user/assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
	<script src="{{asset('user/assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>
	<script src="{{asset('user/assets/dest/js/waypoints.min.js')}}"></script>
	<script src="{{asset('user/assets/dest/js/wow.min.js')}}"></script>
	<!--customjs-->
	<script src="{{asset('user/assets/dest/js/custom2.js')}}"></script>
	<script>
		$(document).ready(function() {
			$(document).on('keyup', '#keyword', function(event) {
				var keyword = $('#keyword').val();
				if (keyword != "") {
					$.ajax({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						},
						type: 'get',
						url: '/',
						data: {
							"keyword": keyword
						},
						success: function(response) {
							console.log(response);
							$('.list-seach').css('display', 'block');
							$('#list-seach').empty().html(response);
						},
						error: function(jqXHR, textStatus, errorThrown) {

						}
					});
					event.preventDefault();
				} else {
					$('.list-seach').css('display', 'none');
				}
			});
			$(document).on('change', '#keyword', function(event) {
				$('.list-seach').css('display', 'none');
				$('.list-seach').empty();
				event.preventDefault();
			});

		});
		$(document).ready(function() {
			$(window).scroll(function(event) {
				var pos_body = $('html,body').scrollTop();
				// console.log(pos_body);
				if (pos_body > 15) {
					$('.header-bottom').addClass('main-menu-cd');
				} else {
					$('.header-bottom').removeClass('main-menu-cd');
				}
				if (pos_body > 1200) {
					$('.back-to-top').addClass('hien-ra');
				} else {
					$('.back-to-top').removeClass('hien-ra');
				}
			});
			$('.back-to-top').click(function(event) {
				$('html,body').animate({
					scrollTop: 0
				}, 1400);
			});
		});
	</script>
</body>

</html>