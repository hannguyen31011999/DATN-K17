@extends('user.master')

@section('css')
<link rel="stylesheet" title="style" href="{{asset('user/assets/dest/css/thongtin.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/styles/metro/notify-metro.css" />
<style type="text/css">
  .border-profile{
      border-bottom:1px solid #ccc!important;
      width: 70%;
      margin-top: 15px;
      margin-bottom: 15px;
  }
</style>
@endsection

@section('title')
	Thông tin khách hàng
@endsection

@section('content')
<div class="container">
    <div class="row profile">
		@include('user.thongtin.template.menu')
		<div class="col-md-9">
            <div class="profile-content">
            	<div class="container">
					<div class="row">
						<div class="col-md-8">
							<div class="panel-heading"><p style="font-size: 20px;">Thông tin tài khoản</p></div>
              <div class="panel-heading"><p>Điểm tích lũy: {{$point}} điểm</p></div>
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
                <div class="border-profile"></div>
                <div class="row">
                    <div class="col-md-4">
                        <label>Email tài khoản</label>
                    </div>
                    <div class="col-md-4">
                        <p>{{$user->email}}</p>
                    </div>
                </div>
                <div class="border-profile"></div>
                <div class="row">
                    <div class="col-md-4">
                        <label>Mật khẩu</label>
                    </div>
                    <div class="col-md-4">
                        <a href="{{url('account/password/change')}}" style="font-size: 15px;color: red;font-style: italic; text-decoration: none;">******** (Thay đổi)</a>
                    </div>
                </div>
                <div class="border-profile"></div>
                <div class="row">
                    <div class="col-md-4">
                        <label>Số điện thoại</label>
                    </div>
                    <div class="col-md-4">
                        <p>{{$user->phone}}<a href="" style="font-size: 15px;color: red;font-style: italic; text-decoration: none;" >(Thay đổi)</a></p>
                    </div>
                </div>
                <div class="border-profile"></div>
                <div class="row">
                    <div class="col-md-4">
                        <label>Giới tính</label>
                    </div>
                    <div class="col-md-4">
                      @if($user->sex==0)
                        <label class="radio-inline"><input type="radio" name="gender" id="gender" value="0" checked>Nam</label>
                        <label class="radio-inline"><input type="radio" name="gender" id="gender" value="1">Nữ</label>
                        <label class="radio-inline"><input type="radio" name="gender" id="gender" value="2">Khác</label>
                  		@elseif($user->sex==1)
                        <label class="radio-inline"><input type="radio" name="gender" id="gender" value="0">Nam</label>
                        <label class="radio-inline"><input type="radio" name="gender" id="gender" value="1" checked>Nữ</label>
                        <label class="radio-inline"><input type="radio" name="gender" id="gender" value="2">Khác</label>
                      @else
                        <label class="radio-inline"><input type="radio" name="gender" id="gender" value="0">Nam</label>
                        <label class="radio-inline"><input type="radio" name="gender" id="gender" value="1">Nữ</label>
                        <label class="radio-inline"><input type="radio" name="gender" id="gender" value="2" checked>Khác</label>
                      @endif
                    </div>
                </div>
                <div class="border-profile"></div>
                <div class="row">
                    <div class="col-md-4">
                        <label>Ngày sinh</label>
                    </div>
                    <div class="col-md-4">
                      @if(empty($user->birthdate))
                          <input type="date" id="birthday" class="form-control" value=""  name="birthdate" style="width: 50%;">
                      @else
                          <input type="date" id="birthday" class="form-control" value="{{$user->birthdate->format('Y-m-d')}}"  name="birthdate" style="width: 50%;">
                      @endif
                    </div>
                </div>
                <div class="border-profile"></div>
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
                <div class="border-profile"></div>
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
@endsection
@section('js')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
    //Ajax submit form change-profile
        $('#change-profile').submit(function(e){
          var name = $('#name').val();
          var gender = $("input[name='gender']:checked").val();
          var birthdate = $('#birthday').val();
          var address = $('#address').val();
          var url = $(this).attr('data-url');
          e.preventDefault();
          $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: url,
            data: {
              "name":name,
              "gender":gender,
              "birthdate":birthdate,
              "address":address,
            },
            success: function(response) {
              console.log(response.data)
              $.notify(response.data,"success")
            },
            error: function (jqXHR, textStatus, errorThrown) {
              //xử lý lỗi tại đây
            }
          });
        });
      });
</script>
@endsection