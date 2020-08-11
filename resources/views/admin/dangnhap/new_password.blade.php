@extends('admin.mater-admin')
@section('header')
<title>Admin | Lấy lại mật khẩu</title>
@endsection
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/styles/metro/notify-metro.css" />
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
@endsection
@section('main-conten')
<div id="form-login">
<div class="container">
		<div class="row">
			<div class="col-lg-4"></div>
			<div class="col-lg-4">
				<div id="login">
					<h4 style="text-align:center;">Lấy lại mật khẩu</h4>
					<div class="space20">&nbsp;</div>
					@if(Session::has('notifi'))
						<div class="alert alert-danger">
							{{Session::get('notifi')}}
						</div>
					@endif
					<form action="{{url('password/reset')}}" method="post">
						@csrf
						<div class="form-group">
							<div class="space10">&nbsp;</div>
							<div class="input-group">
							    <div class="input-group-addon">
							    	<i class="fa fa-lock"></i>
							    </div>
							    <input class="form-control" id="password" name="password" type="password" placeholder="Mật khẩu mới" />
						  	</div>
						  	@if($errors->has('password'))
						  		<br>
                            	<div class="alert alert-danger">
                            		{{ $errors->first('password') }}
                            	</div>
                            @endif
						  	<div class="space10">&nbsp;</div>
						</div>
						<div class="form-group">
							<div class="space10">&nbsp;</div>
							<div class="input-group">
							    <div class="input-group-addon">
							    	<i class="fa fa-sign-in"></i>
							    </div>
							    <input class="form-control" id="ent_password" name="ent_password" type="password" placeholder="Nhập lại mật khẩu mới" />
						  	</div>
						  	@if($errors->has('ent_password'))
						  		<br>
                            	<div class="alert alert-danger">
                            		{{ $errors->first('ent_password') }}
                            	</div>
                            @endif
						  	<div class="space10">&nbsp;</div>
						</div>
						<div class="form-group">
							<div class="space10">&nbsp;</div>
							<div class="input-group">
							    <div class="input-group-addon">
							    	<i class="fa fa-code"></i>
							    </div>
							    <input class="form-control" id="code" name="code" type="text" placeholder="Nhập lại code" />
						  	</div>
						  	@if($errors->has('code'))
						  		<br>
                            	<div class="alert alert-danger">
                            		{{ $errors->first('code') }}
                            	</div>
                            @endif
						  	<div class="space10">&nbsp;</div>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary" style="width:100%;">Hoàn thành</button>
						</div>
					</form>
				</div>
			</div>
			<div class="col-lg-4"></div>
		</div>
</div>
</div>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
@endsection