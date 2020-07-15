@extends('user.master')

@section('css')
<style>
	#login {
		width: 100%;
		border: 0.3px solid white;
		border-radius: 12px;
		padding: 50px;
		margin: 20px;
		background: white;
	}
	#form-login{
		background-color: rgb(212, 218, 222);
	}
</style>
@endsection

@section('title')
	Đăng nhập
@endsection
@section('content')
<div id="form-login">
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
					<h4 style="text-align:center;">Đăng nhập</h4>
					<div class="space20">&nbsp;</div>
					<form action="{{url('/account/login')}}" method="post">
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
							<div class="space10">&nbsp;</div>
							<button type="submit" class="btn btn-danger" style="width:100%;">Đăng nhập</button>
							<hr width="100%">
							<a href="{{url('account/recovery')}}" style="text-decoration:none;font-size:15px; padding: 0px 73px;">Quên mật khẩu?</a>
						</div>
					</form>
				</div>
			</div>
			<div class="col-lg-4"></div>
		</div>
</div>
</div>
@endsection