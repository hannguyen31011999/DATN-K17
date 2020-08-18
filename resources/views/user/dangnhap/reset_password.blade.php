@extends('user.master')

@section('css')
<style>
	#login {
		width: 100%;
		border: 0.3px solid white;
		border-radius: 12px;
		padding: 50px;
		margin-top: 10%;
		margin-bottom: 10%;
		background-color: rgb(212, 218, 222);	
	}
</style>
@endsection

@section('title')
	Lấy lại mật khẩu
@endsection
@section('content')
<div class="container">
		<div class="row">
			<div class="col-lg-4"></div>
			<div class="col-lg-4">
				<div id="login">
					<h4 style="text-align:center;">Lấy lại mật khẩu</h4>
					<div class="space20">&nbsp;</div>
					<form action="{{url('account/recovery')}}" method="post" id="formReset">
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
                            	<div class="messenger-errors">
                            		{{ $errors->first('email') }}
                            	</div>
                            @endif
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
@endsection

@section('js')
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
@endsection