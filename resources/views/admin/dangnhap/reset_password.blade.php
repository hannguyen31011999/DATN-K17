<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Admin | Lấy lại mật khẩu</title>
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
	</style>
</head>
<body>
	<div id="form-login">
<div class="container">
		<div class="row">
			<div class="col-lg-4"></div>
			<div class="col-lg-4">
				<div id="login">
					<h4 style="text-align:center;">Lấy lại mật khẩu</h4>
					<div class="space20">&nbsp;</div>
					<form action="{{url('recovery')}}" method="post" id="formReset">
						@csrf
						<div class="form-group">
							<div class="space10">&nbsp;</div>
							<div class="input-group">
							    <div class="input-group-addon">
							    	<i class="fa fa-envelope"></i>
							    </div>
							    <input class="form-control" id="email" name="email" type="text" placeholder="Tài khoản email" />
						  	</div>
						  	@if($errors->has('email'))
						  		<br>
                            	<div class="alert alert-danger">
                            		{{ $errors->first('email') }}
                            	</div>
                            @endif
						  	<div class="space10">&nbsp;</div>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary" id="buttonClick" style="width:100%;">Lấy mật khẩu
								@if(Session::has('success'))
									<span id="counter"></span>
								@endif
							</button>

						</div>
					</form>
				</div>
			</div>
			<div class="col-lg-4"></div>
		</div>
</div>
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript">
	var timer;
	var	count = 60;
	$("#counter").text(" (thời gian còn: "+count +" s)");
	timer = setTimeout(update, 1000);
	function update()
	{	
	    if (count > 0)
	    {
    		$("#counter").text("(thời gian còn: "+ (--count) +" s)");
       		timer = setTimeout(update, 1000);
	    }
	    else{
	    	$("#buttonClick").removeAttr('disabled');
	    	$("#counter").remove();
	    }
	}
	
</script>
</body>
</html>
