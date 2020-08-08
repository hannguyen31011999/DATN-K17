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
		.list-seach{
			position: absolute;
			border: 1px solid #e1e1e1;
			width: 220px;
			height: 150px;
			margin-top: .5rem;
			z-index: 600;
			background-color: #fff;
			border-radius: 2px;
			box-shadow: 0 1px 4px 0 rgba(0,0,0,.26);
			overflow: auto;
			display: none;
			cursor:default;
		}
		.messenger-errors{
			color: red;
			padding: 5px;
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
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href=""><i class="fa fa-home"></i> 53 đường 144,phường Tân Phú,Quận 9</a></li>
						<li><a href=""><i class="fa fa-phone"></i> 0382 484 093</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
						@if(Auth::check()&&Session::has('email')&&Session::has('id')&&Session::get('role')==1)
							<li><a href="{{url('/account/profile')}}" style="text-decoration: none;"><i class="fa fa-user"></i>{{Session::get('email')}}</a></li>
							<li><a href="{{url('/account/logout')}}" style="text-decoration: none;">Đăng xuất</a>
						@else
							<li><a href="{{url('/account/register')}}" style="text-decoration: none;">Đăng kí</a></li>
							<li><a href="{{url('/account/login')}}" style="text-decoration: none;">Đăng nhập</a></li>
						@endif
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body" >
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="{{route('home')}}" id="logo"><img src="{{asset('user/logo.png')}}" width="200px" alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
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
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->

		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov" style="height: auto;">
						<li><a href="{{route('home')}}" style="text-decoration: none;">Trang chủ</a></li>
						<li><a href="#">Sản phẩm</a>
							<ul class="sub-menu">
								@foreach($menu as $menu)
								<li><a href="{{url('/chi-tiet-'.utf8tourl($menu->type_name).'.'.$menu->id)}}">{{$menu->type_name}}</a></li>
								@endforeach
							</ul>
						</li>
						<li><a href="about.html">Giới thiệu</a></li>
						<li><a href="{{url('/tin-tuc')}}">Tin tức</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->


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
						<div id="beta-instagram-feed"><div></div></div>
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
	$('.l-inline').parent().removeClass('active parent-active');
    $(document).ready(function()
    {
        $(document).on('keyup', '#keyword',function(event){
            var keyword = $('#keyword').val();
            if(keyword!="")
            {
                $.ajax({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'get',
                    url: '/',
                    data: {
                      "keyword":keyword
                    },
                    success:function(response) {
                        console.log(response);
                        $('.list-seach').css('display','block');
                        $('#list-seach').empty().html(response);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {

                    }
                });
                event.preventDefault();
            }
            else
            {
                $('.list-seach').css('display','none');
            }
        });
        $(document).on('change', '#keyword',function(event){
            $('.list-seach').css('display','none');
            $('.list-seach').empty();
            event.preventDefault();
        });

    });
    
</script>
</body>
</html>
