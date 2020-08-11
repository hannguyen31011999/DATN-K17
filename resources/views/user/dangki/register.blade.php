@extends('user.master')

@section('css')
<style>
    #login {
        width: 100%;
        border: 0.3px solid white;
        border-radius: 12px;
        padding: 50px;
        margin: 20px;
        background-color: rgb(212, 218, 222);
    }
</style>
@endsection
@section('title')
	Đăng kí
@endsection
@section('content')
<div class="container">
    <form action="{{url('/account/register')}}" method="post">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <div id="login">
                    @if(Session::has('error'))
                        <div class="messenger-errors">
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
                            @if($errors->has('fullname'))
                                <div class="messenger-errors">
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
                                <input class="form-control" id="password" name="password" type="password" placeholder="Mật khẩu"/>
                            </div>
                            @if($errors->has('password'))
                                <div class="messenger-errors">
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
                            @if($errors->has('phone'))
                                <div class="messenger-errors">
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
@endsection
@section('js')

@endsection