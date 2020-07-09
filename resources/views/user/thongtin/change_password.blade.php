@extends('user.master')

@section('css')
<link rel="stylesheet" title="style" href="{{asset('user/assets/dest/css/password.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/styles/metro/notify-metro.css" />
<style type="text/css">
    #msg1{
        display: none;
    }

    #msg2{
        display: none;
    }

    #msg3{
        display: none;
    }
</style>
@endsection

@section('title')
	Thay đổi mật khẩu
@endsection

@section('content')
<div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="http://keenthemes.com/preview/metronic/theme/assets/admin/pages/media/profile/profile_user.jpg" class="img-responsive" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<img src="{{asset('user/avatar.png')}}" style="width:100px;" class="avatar img-circle img-thumbnail" alt="avatar">
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
					<button type="button" class="btn btn-success btn-sm">Upload</button>
					<button type="button" class="btn btn-danger btn-sm">Edit</button>
				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="#">
							<i class="fa fa-user"></i>
							Tài khoản của tôi </a>
						</li>
						<li>
							<a href="#">
							<i class="fa fa-bars"></i>
							Đơn mua </a>
						</li>
						<li>
							<a href="#" target="_blank">
							<i class="fa fa-bell"></i>
							Thông báo </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-9">
            <div class="profile-content">
            	<div class="container">
					<div class="row">
						<div class="col-md-8">
							<div class="panel-heading"><p style="font-size: 20px;">ĐỔI MẬT KHẨU</p></div>
							<div class="panel-heading">
								<div class="c-line-left"></div>
							</div>
						</div>
					</div>
                <form action="" data-url="{{url('account/password/change')}}" method="post" id="change-password">
                    <input type="hidden" id="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-4">
                            <div class="form__group field">
                              <input type="password" class="form__field" value="" name="password" id='password' placeholder="Mật khẩu hiện tại"  />
                            </div>
                            <br>
                            <div class="alert alert-danger " id="msg1">
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-4">
                            <div class="form__group field">
                              <input type="password" class="form__field" value="" name="new_password" id='new_password' placeholder="Mật khẩu mới"  />
                            </div>
                            <br>
                            <div class="alert alert-danger " id="msg2">

                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-4">
                            <div class="form__group field">
                              <input type="password" class="form__field" value="" name="ent_password" id='ent_password' placeholder="Xác nhận Mật khẩu mới"  />
                            </div>
                            <br>
                            <div class="alert alert-danger " id="msg3">
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-4">
                            <input type="submit" class="btn btn-danger" name="" value="THAY ĐỔI" style="width: 100%;">
                        </div>
                    </div>
                </form>
                <br>
				</div>
            </div>
		</div>
	</div>
</div>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#change-password').submit(function(e){
            var password = $('#password').val();
            var new_password = $('#new_password').val();
            var ent_password = $('#ent_password').val();
            var url = $(this).attr('data-url');
            e.preventDefault();
            $.ajax({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: url,
                data: {
                  "password":password,
                  "new_password":new_password,
                  "ent_password":ent_password,
                },
                success: function(response) {
                    $.notify(response.data,"success")
                    setTimeout(function() {
                        window.location.replace("http://localhost:8000/account/profile");
                    },3000);
                },
                error: function (response) {
                    $('#msg1').css('display','none');
                    $('#msg2').css('display','none');
                    $('#msg3').css('display','none');
                    var data  = response.responseJSON;
                    var length = Object.keys(data.errors).length;
                    console.log(length);
                    console.log(data.errors);
                    console.log(response.data);
                    if(length===1)
                    {
                        if(Array.isArray(data.errors.password)){

                            $('#msg1').html(data.errors.password);
                            $('#msg1').css('display','block');
                        }
                        else if(Array.isArray(data.errors.new_password)){

                            $('#msg2').html(data.errors.password);
                            $('#msg2').css('display','block');
                        }
                        else{

                            $('#msg3').html(data.errors.ent_password);
                            $('#msg3').css('display','block');
                        }
                    }
                    else if(length===2)
                    {
                        if(Array.isArray(data.errors.password)&&Array.isArray(data.errors.new_password)){

                            $('#msg1').html(data.errors.password);
                            $('#msg1').css('display','block');

                            $('#msg2').html(data.errors.password);
                            $('#msg2').css('display','block');
                        }
                        else if(Array.isArray(data.errors.new_password)&&Array.isArray(data.errors.ent_password)){

                            $('#msg2').html(data.errors.password);
                            $('#msg2').css('display','block');

                            $('#msg3').html(data.errors.ent_password);
                            $('#msg3').css('display','block');
                        }
                        else{

                            $('#msg1').html(data.errors.password);
                            $('#msg1').css('display','block');

                            $('#msg3').html(data.errors.ent_password);
                            $('#msg3').css('display','block');
                        }
                    }
                    else
                    {
                        $('#msg1').html(data.errors.password);
                        $('#msg2').html(data.errors.new_password);
                        $('#msg3').html(data.errors.ent_password);

                        $('#msg1').css('display','block');
                        $('#msg2').css('display','block');
                        $('#msg3').css('display','block');
                    }
                }
            });
        });
    });
</script>
@endsection