@extends('admin.mater-admin')
@section('header')
<title>Admin | Đỏi mật khẩu</title>
<link rel="stylesheet" title="style" href="{{asset('user/assets/dest/css/password.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/styles/metro/notify-metro.css" />
<style type="text/css">
    #msg1 {
        display: none;
    }

    #msg2 {
        display: none;
    }

    #msg3 {
        display: none;
    }

    .profile-usertitle {
        text-align: center;
        margin-top: 100%;
        margin-bottom: 100%;
        /* background: #32c5d2; */
    }

    .profile-sidebar {
        padding: 20px 0 10px 0;
        background: rgb(50 197 210);
        border-radius: 38px;
        margin-left: -6%;
        padding: 23%;
    }

    .profile {
        background: #ffffff;
        margin: 21px 0;
        border-radius: 34px;
        padding: 5%;
    }

    .col-md-3 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 25%;
        flex: 0 0 25%;
        max-width: 19%;
    }
</style>
@endsection
@section('main-conten')
<div class="row">
    <div class="col-md-12">
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

                    </div>
                </div>
                <div class="col-md-9">
                    <div class="profile-content">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-2">
                                </div>


                                <div class="col-md-8">
                                    <div class="panel-heading">
                                        <p style="font-size: 20px;">ĐỔI MẬT KHẨU</p>
                                    </div>
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
                                            <input type="password" class="form__field" value="" name="password" id='password' placeholder="Mật khẩu hiện tại" style="width: 200%" />
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
                                            <input type="password" class="form__field" value="" name="new_password" id='new_password' placeholder="Mật khẩu mới" style="width: 200%" />
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
                                            <input type="password" class="form__field" value="" name="ent_password" id='ent_password' placeholder="Nhập lại mật khẩu mới" style="width: 200%" s />
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
                                    <div>
                                        <input type="submit" class="btn btn-primary" name="" value="THAY ĐỔI" style="width: 100%;">
                                    </div>
                                    <div class="col-md-1">
                                    </div>
                                    <div>
                                        <a href="{{url('admin/profile')}}" class="btn btn-danger waves-effect waves-light">Hủy<a>
                                    </div>
                                </div>
                            </form>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#change-password').submit(function(e) {
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
                url: '/admin/password/change',
                data: {
                    "password": password,
                    "new_password": new_password,
                    "ent_password": ent_password,
                },
                success: function(response) {
                    $.notify(response.data, "success")
                    setTimeout(function() {
                        window.location.replace("http://localhost:8000/admin/profile");
                    }, 3000);
                },
                error: function(response) {
                    $('#msg1').css('display', 'none');
                    $('#msg2').css('display', 'none');
                    $('#msg3').css('display', 'none');
                    var data = response.responseJSON;
                    var length = Object.keys(data.errors).length;
                    console.log(length);
                    console.log(data.errors);
                    console.log(response.data);
                    if (length === 1) {
                        if (Array.isArray(data.errors.password)) {

                            $('#msg1').html(data.errors.password);
                            $('#msg1').css('display', 'block');
                        } else if (Array.isArray(data.errors.new_password)) {
                            $('#msg2').html(data.errors.new_password);
                            $('#msg2').css('display', 'block');
                        } else {

                            $('#msg3').html(data.errors.ent_password);
                            $('#msg3').css('display', 'block');
                        }
                    } else if (length === 2) {
                        if (Array.isArray(data.errors.password) && Array.isArray(data.errors.new_password)) {

                            $('#msg1').html(data.errors.password);
                            $('#msg1').css('display', 'block');

                            $('#msg2').html(data.errors.new_password);
                            $('#msg2').css('display', 'block');
                        } else if (Array.isArray(data.errors.new_password) && Array.isArray(data.errors.ent_password)) {

                            $('#msg2').html(data.errors.new_password);
                            $('#msg2').css('display', 'block');

                            $('#msg3').html(data.errors.ent_password);
                            $('#msg3').css('display', 'block');
                        } else {

                            $('#msg1').html(data.errors.password);
                            $('#msg1').css('display', 'block');

                            $('#msg3').html(data.errors.ent_password);
                            $('#msg3').css('display', 'block');
                        }
                    } else {
                        $('#msg1').html(data.errors.password);
                        $('#msg2').html(data.errors.new_password);
                        $('#msg3').html(data.errors.ent_password);

                        $('#msg1').css('display', 'block');
                        $('#msg2').css('display', 'block');
                        $('#msg3').css('display', 'block');
                    }
                }
            });
        });
    });
</script>
@endsection