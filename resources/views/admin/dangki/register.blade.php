<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Login | admin </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="Responsive bootstrap 4 admin template" name="description">
	<meta content="Coderthemes" name="author">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
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
			margin: 20px;
			margin-top: 100px;
			background: white;
		}

		#form-login {
			background-color: rgb(212, 218, 222);
		}
		body {
           	background-image: url("/img/background/background.jpg ");
        } 
	</style>
</head>
<body class="authentication-page">
<div class="container">
    <form action="{{url('/admin/register')}}" method="post">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <div id="login">
                    @if(Session::has('error'))
                        <div class="alert alert-danger">
                            {{Session::get('error')}}
                        </div>
                    @endif
                    <h4 style="text-align:center;">Đăng kí</h4>
                    <div class="space20">&nbsp;</div>
                        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                        <div class="form-group">
                            <label for="fullname">Họ tên*</label>
                            <div class="space10">&nbsp;</div>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-male"></i>
                                </div>
                                <input class="form-control" id="fullname" name="fullname" type="text" placeholder="Họ tên người dùng" />
                            </div>
                            <div class="space10">&nbsp;</div>
                            @if($errors->has('fullname'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('fullname') }}
                                </div>
                            @endif
                        </div>

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
                                <input class="form-control" id="password" name="password" type="password" placeholder="Mật khẩu"/>
                            </div>
                            <div class="space10">&nbsp;</div>
                            @if($errors->has('password'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="phone">Số điện thoại*</label>
                            <div class="space10">&nbsp;</div>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                </div>
                                <input class="form-control" id="phone" name="phone" type="text" placeholder="Số điện thoại người dùng"/>
                            </div>
                            <div class="space10">&nbsp;</div>
                            @if($errors->has('phone'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('phone') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="space10">&nbsp;</div>
                            <button type="submit" class="btn btn-danger" style="width:100%; ">Đăng kí</button>
                        </div>
                </div>
            </div>
            <div class="col-lg-4"></div>
        </div>
    </form>
</div>
</div>
		
	<!-- end col -->





























