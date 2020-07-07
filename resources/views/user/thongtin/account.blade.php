@extends('user.master')

@section('css')
<style>
.profile {
background: #F1F3FA ;
  margin: 20px 0;
}

/* Profile sidebar */
.profile-sidebar {
  padding: 20px 0 10px 0;
  background: #fff ;
}

.profile-userpic img {
  float: none;
  margin: 0 auto;
  width: 50%;
  height: 50%;
  -webkit-border-radius: 50% !important;
  -moz-border-radius: 50% !important;
  border-radius: 50% !important;
}

.profile-usertitle {
  text-align: center;
  margin-top: 20px;
}

.profile-usertitle-name {
  color: #5a7391;
  font-size: 16px;
  font-weight: 600;
  margin-bottom: 7px;
}

.profile-usertitle-job {
  text-transform: uppercase;
  color: #5b9bd1;
  font-size: 12px;
  font-weight: 600;
  margin-bottom: 15px;
}

.profile-userbuttons {
  text-align: center;
  margin-top: 10px;
}

.profile-userbuttons .btn {
  text-transform: uppercase;
  font-size: 11px;
  font-weight: 600;
  padding: 6px 15px;
  margin-right: 5px;
}

.profile-userbuttons .btn:last-child {
  margin-right: 0px;
}
    
.profile-usermenu {
  margin-top: 30px;
}

.profile-usermenu ul li {
  border-bottom: 1px solid #f0f4f7;
}

.profile-usermenu ul li:last-child {
  border-bottom: none;
}

.profile-usermenu ul li a {
  color: #93a3b5;
  font-size: 14px;
  font-weight: 400;
}

.profile-usermenu ul li a i {
  margin-right: 8px;
  font-size: 14px;
}

.profile-usermenu ul li a:hover {
  background-color: #fafcfd;
  color: #5b9bd1;
}

.profile-usermenu ul li.active {
  border-bottom: none;
}

.profile-usermenu ul li.active a {
  color: #5b9bd1;
  background-color: #f6f9fb;
  border-left: 2px solid #5b9bd1;
  margin-left: -2px;
}

.c-line-left{
	width: 30px;
	height: 3px;
	background-color: #32c5d2;
	margin: 0 0 30px 0; 
}

.table-us{
	border: 
}
</style>
@endsection

@section('title')
	Thông tin khách hàng
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
							<div class="panel-heading"><p style="font-size: 20px;">Thông tin tài khoản</p></div>
							<div class="panel-heading"><p>Quản lí thông tin hồ sơ bảo mật tài khoản</p></div>
							<div class="panel-heading">
								<div class="c-line-left"></div>
							</div>
						</div>
					</div>
      <form>
			@if(isset($user))
			          <div class="row">
                    <div class="col-md-4">
                        <label>Tên</label>
                    </div>
                    <div class="col-md-4">
                        <p>{{$user->name}}</p>
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
                        <a href="" style="font-size: 15px;color: red;font-style: italic; text-decoration: none;">******** (Thay đổi)</a>
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
                        <label class="radio-inline"><input type="radio" name="gender" checked>Nam</label>
                        <label class="radio-inline"><input type="radio" name="gender" >Nữ</label>
                        <label class="radio-inline"><input type="radio" name="gender" >Khác</label>
                  		@elseif($user->sex==1)
                        <label class="radio-inline"><input type="radio" name="gender" >Nam</label>
                        <label class="radio-inline"><input type="radio" name="gender" checked>Nữ</label>
                        <label class="radio-inline"><input type="radio" name="gender" >Khác</label>
                      @else
                        <label class="radio-inline"><input type="radio" name="gender" >Nam</label>
                        <label class="radio-inline"><input type="radio" name="gender" >Nữ</label>
                        <label class="radio-inline"><input type="radio" name="gender" checked>Khác</label>
                      @endif
                    </div>
                </div>
                <hr class="table-us" width="65%">
                <div class="row">
                    <div class="col-md-4">
                        <label>Ngày sinh</label>
                    </div>
                    <div class="col-md-4">
                    	<input type="date" id="birthday" class="form-control" name="birthdate" style="width: 50%;">
                    </div>
                </div>
                <hr class="table-us" width="65%">
                <div class="row">
                    <div class="col-md-4">
                        <label>Địa chỉ</label>
                    </div>
                    <div class="col-md-4">
                    	<a href="" style="font-size: 15px;color: red;font-style: italic; text-decoration: none;">Thêm địa chỉ</a>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                    	<input type="submit" class="btn btn-danger" value="Lưu" style="width: 30%;">
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
@endsection