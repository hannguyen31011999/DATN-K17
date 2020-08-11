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
			padding: 5px;
		}

		@media (max-width: 767px) {
			.main-menu ul li {
				float: none;
				width: 100%;
				padding: 10px;
			}

			.main-menu>ul.l-inline>li>a {
				color: black;
			}

			.main-menu>ul.l-inline>li>a {
				padding: 9px 70px !important;
			}

			.pull-right.beta-components.space-left.ov {
				margin: -313px -5px 4px -1px !important;
				width: 42%;
			}

			.cart-body {
				overflow: auto;
				height: 239px;
				z-index: 999;
				width: 90%;
				border-radius: 5px;
			}
		}

		.main-menu>ul.l-inline>li>a {
			padding: 19px 5px;
			font-weight: bold !important;
			margin-bottom: -5px;
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
			transition: 0.5s;
		}

		.button span:after {
			content: '\00bb';
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

		.main-menu-cd {
			height: 57px;
			display: table-cell;
			/* font-weight: 400; */
			width: 100%;
			background-color: #0277b8;
			display: block;
			box-shadow: 0px 0px 5px rgb(0 0 0);
			position: fixed;
			top: 0;
			left: 0;
			z-index: 100000;
		}

		.back-to-top {
			width: 50px;
			height: 50px;
			background: rgb(0, 0, 0, 0.7);
			font-size: 35px;
			color: whitesmoke;
			text-align: center;
			vertical-align: center;
			display: flex;
			justify-content: center;
			align-items: center;
			position: fixed;
			left: 50%;
			bottom: 20px;
			margin-left: -25px;
			cursor: pointer;
			visibility: hidden;
			opacity: 0;
		}

		.back-to-top.hien-ra {
			visibility: visible;
			opacity: 1;
		}
	
.navbar-custom {
    background-color:#229922;
    color:#ffffff;
    border-radius:0;
    font-size: 15px;
}
  
.navbar-custom .navbar-nav > li > a {
    color:#fff;
}

.navbar-custom .navbar-nav > .active > a {
    color: #ffffff;
    background-color:transparent;
}
      
.navbar-custom .navbar-nav > li > a:hover,
.navbar-custom .navbar-nav > li > a:focus,
.navbar-custom .navbar-nav > .active > a:hover,
.navbar-custom .navbar-nav > .active > a:focus,
.navbar-custom .navbar-nav > .open >a {
    text-decoration: none;
    background-color: #33aa33;
}
     
.navbar-custom .navbar-brand {
    color:#eeeeee;
}
.navbar-custom .navbar-toggle {
    background-color:#eeeeee;
}
.navbar-custom .icon-bar {
    background-color:#33aa33;
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
				<div class="pull-right auto-width-right">
					@if(Auth::check()&&Session::has('email')&&Session::has('id')&&Session::get('role')==1)
					<a class="button" href="{{url('/account/profile')}}" style="text-decoration: none;vertical-align:middle;width: 200px;">{{Session::get('email')}}</a>
					<a class="button" href="{{url('/account/logout')}}" style="text-decoration: none;vertical-align:middle">Đăng xuất</a>
					@else
					<a class="button" href="{{url('/account/register')}}" style="text-decoration: none;vertical-align:middle"><span>Đăng kí </span></a>
					<a class="button" href="{{url('/account/login')}}" style="text-decoration: none;vertical-align:middle"><span>Đăng nhập </span></a></li>
					@endif
				</div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->

		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a class="button" href="{{route('home')}}" style="text-decoration: none;vertical-align:middle"><i class="fa fa-home"></i><span>Trang chủ </span></a></li>
						<li class="dropdown">
							<a class="button" style="text-decoration: none;vertical-align:middle" data-toggle="dropdown"> <span>Sản phẩm</span></a>
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
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->
	<div class="back-to-top"><i class="fas fa-chevron-up"></i></div>


	@yield('slider')

	<div class="container" id="tag_container">
		@yield('content')
	</div> <!-- .container -->

	<div id="footer" class="color-div">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="widget">
						<h4 class="widget-title">Instagram Feed</h4>
						<div id="beta-instagram-feed">
							<div></div>
						</div>
					</div>
				</div>
				<div class="col-sm-2">
					<div class="widget">
						<h4 class="widget-title">Information</h4>
						<div>
							<ul>
								<li><a href="blog_fullwidth_2col.html"><i class="fa fa-chevron-right"></i>Web Design</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="col-sm-10">
						<div class="widget">
							<h4 class="widget-title">Contact Us</h4>
							<div>
								<div class="contact-info">
									<i class="fa fa-map-marker"></i>
									<p>30 South Park Avenue San Francisco, CA 94108 Phone: +78 123 456 78</p>
									<p>Nemo enim ipsam voluptatem quia voluptas sit asnatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="widget">
						<h4 class="widget-title">Newsletter Subscribe</h4>
						<form action="#" method="post">
							<input type="email" name="your_email">
							<button class="pull-right" type="submit">Subscribe <i class="fa fa-chevron-right"></i></button>
						</form>
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
				if (pos_body > 20) {
					$('.main-menu').addClass('main-menu-cd');
				} else {
					$('.main-menu').removeClass('main-menu-cd');
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