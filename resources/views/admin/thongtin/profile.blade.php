@extends('admin.mater-admin')
@section('header')
<link rel="stylesheet" title="style" href="{{asset('user/assets/dest/css/thongtin.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/styles/metro/notify-metro.css" />
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
            <!-- END SIDEBAR USER TITLE -->
            <!-- SIDEBAR BUTTONS -->
          </div>
        </div>
        <div class="col-md-9">
          <div class="profile-content">
            <div class="container">
              <div class="row">
                <div class="col-md-8">
                  <div class="panel-heading">
                    <p style="font-size: 20px;">Thông tin tài khoản</p>
                  </div>
                  <div class="panel-heading">
                    <div class="c-line-left"></div>
                  </div>
                </div>
              </div>
              <form action="" data-url="{{url('account/profile')}}" method="post" id="change-profile">
                <input type="hidden" id="_token" value="{{ csrf_token() }}">
                @if(isset($user))
                <div class="row">
                  <div class="col-md-4">
                    <label>Tên</label>
                  </div>
                  <div class="col-md-4">
                    <div class="form__group field">
                      <input type="input" class="form__field" value="{{$user->name}}" name="name" id='name' required />
                    </div>
                  </div>
                </div>
                <hr class="table-us" width="65%">
                <div class="row">
                  <div class="col-md-4">
                    <label>Email tài khoản</label>
                  </div>
                  <div class="col-md-4">
                    <p>{{$user->email}}</p>
                  </div>
                </div>
                <hr class="table-us" width="65%">
                <div class="row">
                  <div class="col-md-4">
                    <label>Mật khẩu</label>
                  </div>
                  <div class="col-md-4">
                    <a href="{{url('admin/password/change')}}" style="font-size: 15px;color: red;font-style: italic; text-decoration: none;">******** (Thay đổi)</a>
                  </div>
                </div>
                <hr class="table-us" width="65%">
                <div class="row">
                  <div class="col-md-4">
                    <label>Số điện thoại</label>
                  </div>
                  <div class="col-md-4">
                    <p>{{$user->phone}}<a href="" style="font-size: 15px;color: red;font-style: italic; text-decoration: none;">(Thay đổi)</a></p>
                  </div>
                </div>
                <hr class="table-us" width="65%">
                <div class="row">
                  <div class="col-md-4">
                    <label>Giới tính</label>
                  </div>
                  <div class="col-md-4">
                    @if($user->sex==0)
                    <label class="radio-inline"><input type="radio" name="gender" id="gender" value="0" checked>Nam</label>
                    <label class="radio-inline"><input type="radio" name="gender" id="gender" value="1">Nữ</label>
                    @elseif($user->sex==1)
                    <label class="radio-inline"><input type="radio" name="gender" id="gender" value="0">Nam</label>
                    <label class="radio-inline"><input type="radio" name="gender" id="gender" value="1" checked>Nữ</label>
                    @else
                    <label class="radio-inline"><input type="radio" name="gender" id="gender" value="0">Nam</label>
                    <label class="radio-inline"><input type="radio" name="gender" id="gender" value="1">Nữ</label>
                    @endif
                  </div>
                </div>
                <hr class="table-us" width="65%">
                <div class="row">
                  <div class="col-md-4">
                    <label>Ngày sinh</label>
                  </div>
                  <div class="col-md-4">
                    @if(empty($user->birthdate))
                    <input type="date" id="birthday" class="form-control" value="" name="birthdate" style="width: 70%;">
                    @else
                    <input type="date" id="birthday" class="form-control" value="{{$user->birthdate->format('Y-m-d')}}" name="birthdate" style="width: 70%;">
                    @endif
                  </div>
                </div>
                <hr class="table-us" width="65%">
                <div class="row">
                  <div class="col-md-4">
                    <label>Địa chỉ</label>
                  </div>
                  <div class="col-md-4">
                    <div class="form__group field">
                      <input type="input" class="form__field" value="{{$user->address}}" name="address" id='address' />
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-4">
                    <input type="submit" class="btn btn-danger" value="Lưu" id="click-change" style="width: 30%;">
                  </div>
                </div>
                @endif
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
    $('#change-profile').submit(function(e) {
      var name = $('#name').val();
      var gender = $("input[name='gender']:checked").val();
      var birthdate = $('#birthday').val()
      var address = $('#address').val();
      e.preventDefault();
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'post',
        url: '/admin/profile',
        data: {
          "name": name,
          "gender": gender,
          "birthdate": birthdate,
          "address": address,
        },
        success: function(response) {
          console.log(response.data)
          $.notify(response.data, "success")
        },
        error: function(jqXHR, textStatus, errorThrown) {
          //xử lý lỗi tại đây
        }
      });
    });
  });
</script>
@endsection