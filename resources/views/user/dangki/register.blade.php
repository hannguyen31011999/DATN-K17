@extends('user.master')

@section('js')

@endsection

@section('title')
	Đăng kí
@endsection
@section('content')
	<div class="container">
		<div id="content">
			<form action="{{url('/account/register')}}" method="post">
				<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        @if(Session::has('error'))
                            <div class="alert alert-danger">
                                {{Session::get('error')}}
                            </div>
                        @endif
                    </div>
                    <div class="col-sm-3"></div>
                </div>
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4>Đăng kí</h4>
						<div class="space20">&nbsp;</div>
						<div class="form-block">
                            <label for="email">Email*</label>
                            <input type="text" id="email" name="email" class="form-control">
                            @if($errors->has('email'))
                            	<div class="alert alert-danger">
                            		{{ $errors->first('email') }}
                            	</div>
                            @endif
						</div>

						<div class="form-block">
                            <label for="f_name">Fullname*</label>
                            <input type="text" id="f_name" name="full_name" class="form-control">
                            @if($errors->has('full_name'))
                            	<div class="alert alert-danger">
                            		{{ $errors->first('full_name') }}
                            	</div>
                            @endif
						</div>

                        <div class="form-block">
                            <label for="password">Password*</label>
                            <input type="password" id="password" name="password" class="form-control">
                            @if($errors->has('password'))
                            	<div class="alert alert-danger">
                            		{{ $errors->first('password') }}
                            	</div>
                            @endif
                        </div>

						<div class="form-block">
                            <label for="address">Address*</label>
                            <input type="text" id="address" name="address" class="form-control">
                            @if($errors->has('address'))
                            	<div class="alert alert-danger">
                            		{{ $errors->first('address') }}
                            	</div>
                            @endif
						</div>

						<div class="form-block">
                            <label for="phone">Phone*</label>
                            <input type="text" id="phone" name="phone" class="form-control">
                            @if($errors->has('phone'))
                            	<div class="alert alert-danger">
                            		{{ $errors->first('phone') }}
                            	</div>
                            @endif
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Register</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
</div> <!-- .container -->
@endsection