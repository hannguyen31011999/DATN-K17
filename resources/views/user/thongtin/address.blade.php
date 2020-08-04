@extends('user.master')

@section('css')
<link rel="stylesheet" title="style" href="{{asset('user/assets/dest/css/thongtin.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/styles/metro/notify-metro.css" />
<style>
.btn {
	background-color: #e2492b; /* Blue background */
	border: none; /* Remove borders */
	color: white; /* White text */
	padding: 10px 14px; /* Some padding */
	font-size: 14px; /* Set a font size */
}
.btn-closes{
	background: #fff;
	padding: 10px 14px;
    font-size: 14px;
    border: none;
    display: inline-block;
    text-align: center;
    font-family: inherit;
}

#msg1{
	display: none;
}

#msg2{
	display: none;
}
</style>
@endsection

@section('title')
	Địa chỉ khách hàng
@endsection

@section('content')
<div class="container">
    <div class="row profile">
		@include('user.thongtin.template.menu')
		<div class="col-md-9">
			<div class="profile-content">
				<div class="container">
				@if(isset($user))
					<div class="row">
						<div class="col-md-6">
							<div class="panel-heading"><p style="font-size: 16px;">ĐỊA CHỈ CỦA TÔI</p></div>
							<div class="panel-heading">
								<div class="c-line-left"></div>
							</div>
						</div>
						<div class="col-md-6">
						</div>
						<hr class="table-us" width="64%">
					</div>
					<div class="row">
						<div class="col-md-6">
							<p>Họ & Tên :&nbsp;&nbsp;<span>{{$user->name}}&nbsp;<span style="background: #00bfa5;color: #fff;border-radius: 3px;padding: 3px 5px 2px;text-transform: capitalize;white-space: nowrap;font-family: Arial;">Mặc định</span>&nbsp;&nbsp;<span style="background: #e2492b;color: #fff;border-radius: 6px;padding: 3px 5px 2px;text-transform: capitalize;white-space: nowrap;font-family: Arial;">Địa chỉ giao hàng</span></span>
							</p>
	                    </div>
	                    <div class="col-md-4">
	                    </div>
	                    <div class="col-md-2">
	                    </div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-4">
							<p>Số Điện Thoại: &nbsp;&nbsp;<span id="user_phone">{{$user->phone}}</span></p>
	                    </div>
	                    <div class="col-md-8">
	                    	<a href="" id="edit_address" style="font-size: 15px; text-decoration: underline;"data-target="#modal-edit" data-toggle="modal">Sửa</a>
	                    	&nbsp;&nbsp;
	                    </div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-4">
							<p>Địa Chỉ:&nbsp;&nbsp;<span id="user_address">{{$user->address}}</span>
							</p>
	                    </div>
	                    <div class="col-md-4">
	                    </div>
	                    <div class="col-md-4">

	                    </div>
					</div>
				@endif
				</div>
			</div>
		</div>
	</div>
</div>
@include('user.thongtin.template.add_address')
@include('user.thongtin.template.edit_address')
@endsection
@section('js')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
<script type="text/javascript">
	 $(document).ready(function () {

        //Ajax submit form edit-address
        $('#form-edit').submit(function(e){
        	$("#form-edit").show();
            var phone = $('#edit_phone').val();
            var address = $('.edit_address').val();
            var url = $(this).attr('data-url');
            $.ajax({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: url,
                data: {
                  "phone":phone,
                  "address":address,
                },
                success: function(response) {
                	setTimeout(function(){
                		$('#user_phone').text(response.phone);
                		$('#user_address').text(response.address);
				        $(".btn-closes").click();
				    },1000);
				    $.notify("Cập nhật địa chỉ thành công","success")
                },
                error: function (response) {
                	var data = response.responseJSON;
                	var length = Object.keys(data.errors).length;
                	$('.messenger-errors').css('display','block');
                	if(length===1)
                	{
                		if(Array.isArray(data.errors.phone)){
                			$('#msg3').html(data.errors.phone);
                		}
                		else{
                			$('#msg2').html(data.errors.address);
                		}
                	}
                	else{
                		$('#msg3').html(data.errors.phone);
                        $('#msg2').html(data.errors.address);
                	}
                }
            });
            e.preventDefault();
        });
    });
</script>
@endsection