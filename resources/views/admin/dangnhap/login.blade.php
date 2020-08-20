<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login | admin </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="Responsive bootstrap 4 admin template" name="description">
	<meta content="Coderthemes" name="author">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="{{asset('img\logo\logo2.jpg') }}">
	<!-- App favicon -->
	<link href="http://fonts.googleapis.com/css?family=Dosis:300,400" rel='stylesheet' type='text/css'>
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="{{asset('user/assets/dest/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('user/assets/dest/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('user/assets/dest/vendors/colorbox/example3/colorbox.css')}}">
	<link rel="stylesheet" href="{{asset('user/assets/dest/rs-plugin/css/settings.css')}}">
	<link rel="stylesheet" href="{{asset('user/assets/dest/rs-plugin/css/responsive.css')}}">
	<link rel="stylesheet" title="style" href="{{asset('user/assets/dest/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('user/assets/dest/css/animate')}}">
	<link rel="stylesheet" title="style" href="{{asset('user/assets/dest/css/huong-style.css')}}">
	<!-- App css -->
	<style>
		#login {
			width: 100%;
			border: 0.3px solid white;
			border-radius: 12px;
			padding: 50px;
			margin-top: 10%;
		    margin-bottom: 10%;
			margin-top: 40px;
			background: white;
		}

		body {
			background-image: url(admin/image/background/loginbackground.jpg);
			font-variant: full-width;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover; 
			background-size: cover;
		}
		#formFooter {
	  text-align: center;
	  -webkit-border-radius: 0 0 10px 10px;
	  border-radius: 0 0 10px 10px;
	  font-size: 15px;
	}
	</style>
</head>
<body class="authentication-page">
	<div class="container">
		<div class="row">
			<div class="col-lg-4"></div>
			<div class="col-lg-4">
				<div id="login">
					@if(Session::has('error'))
					<div class="alert alert-danger">
						{{Session::get('error')}}
					</div>
					@endif
					<img src="{{asset('img\logo\logo.jpg')}}" class="rounded-circle" alt="">
					<h4 style="text-align:center;">Đăng nhập</h4>
					<div class="space20">&nbsp;</div>
					<form action="{{url('/login')}}" method="post">
						@csrf
						<div class="form-group">
							<label for="email">Tài khoản*</label>
							<div class="space10">&nbsp;</div>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-user"></i>
								</div>
								<input class="form-control" id="email" name="email" type="text" placeholder="Tài khoản email" />
							</div>
							<div class="space10">&nbsp;</div>
							@if($errors->has('email'))
							<div class="alert alert-danger">
								{{ $errors->first('email') }}
							</div>
							@endif
						</div>
						<div class="form-group">
							<label for="password">Mật khẩu*</label>
							<div class="space10">&nbsp;</div>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-lock" aria-hidden="true"></i>
								</div>
								<input class="form-control" id="password" name="password" type="password" placeholder="Mật khẩu" />
							</div>
							<div class="space10">&nbsp;</div>
							@if($errors->has('password'))
							<div class="alert alert-danger">
								{{ $errors->first('password') }}
							</div>
							@endif
						</div>
						<div class="form-group">
							<div class="space10">&nbsp;</div>
							<button type="submit" class="btn btn-danger" style="width:100%;">Đăng nhập</button>
							<hr width="100%">
							<div id="formFooter">
								<a class="loginqmk" href="{{url('recovery')}}" >Quên mật khẩu?</a>
							</div>
						</div>
				</div>
			</div>
			<div class="col-lg-4"></div>
		</div>
	</div>
	<!-- end col -->