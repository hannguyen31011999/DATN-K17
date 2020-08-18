@extends('user.master')

@section('css')
<style>
	#login {
		width: 100%;
		border: 0.3px solid white;
		border-radius: 12px;
		padding: 50px;
		background-color: rgb(212, 218, 222);
		margin-top: 10%;
		margin-bottom: 10%;
	}
	#formFooter {
	  padding: 10px;
	  text-align: center;
	  -webkit-border-radius: 0 0 10px 10px;
	  border-radius: 0 0 10px 10px;
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
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<div id="login">
					<h4 style="text-align:center;">Đăng nhập</h4>
					<div class="space20">&nbsp;</div>
					<form action="{{url('/account/login')}}" method="post">
						@csrf
						<div class="form-group">
							@if(Session::has('error'))
							<div class="messenger-errors" style="text-align: center;">
								{{Session::get('error')}}
							</div>
							@endif
							<label for="email">Tài khoản*</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-user"></i>
								</div>
								<input class="form-control" id="email" name="email" type="text" placeholder="Tài khoản email" />
							</div>
							@if($errors->has('email'))
							<div class="messenger-errors">
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
							@if($errors->has('password'))
							<div class="messenger-errors">
								{{ $errors->first('password') }}
							</div>
							@endif
						</div>
						<div class="form-group">
							<div class="space10">&nbsp;</div>
							<button type="submit" class="btn btn-danger" style="width:100%;">Đăng nhập</button>
							<hr width="100%">
							<div id="formFooter">
						    	<a class="underlineHover" href="{{url('account/recovery')}}">Quên mật khẩu?</a>
						    </div>
						</div>
					</form>
				</div>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
</div>
@endsection