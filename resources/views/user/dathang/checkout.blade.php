@extends('user.master')

@section('css')

@endsection

@section('title')
	Đặt hàng
@endsection
@section('content')
<div class="inner-header">
	@if(Session::has('errorbank'))
		<div class="alert alert-danger">
			<span style="font-size: 17px;">{{Session::get('errorbank')}}</span>
		</div>
	@endif
	@if(isset($error_bank))
		<div class="alert alert-danger">
			<span style="font-size: 17px;">{{$error_bank}}</span>
		</div>
	@endif
	<div class="container">
		<div class="pull-left">
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb">
				<a href="{{route('home')}}">Trang chủ</a> / <span>Đặt hàng</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
@include('user.dathang.template.content_checkout')
@endsection
@section('js')
	<script src="{{asset('js/jquery.min.js')}}"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(document).on('change', '#select-province',function(e){
				var selectedProvince = Number($(this).find(":selected").val());
				$.ajax({
	                headers: {
	                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	                },
	                type: 'post',
	                url: '/checkout/list-address',
	                datatype:"html",
	                data: {
	                  "selectedProvince":selectedProvince
	                },
	                success: function(response) {
	                    $('#list-address').empty().html(response);
	                    $('#select-province').val(selectedProvince).attr('selected','selected');
	                },
	                error: function (jqXHR, textStatus, errorThrown) {
                	}
            	});
				e.preventDefault();
			});

			$(document).on('change', '#select-district',function(e){
				var selectedProvince = Number($('#select-province').val());
				var selectedDistrict = Number($(this).find(":selected").val());
				$.ajax({
	                headers: {
	                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	                },
	                type: 'post',
	                url: '/checkout/list-address',
	                datatype:"html",
	                data: {
	                	"selectedProvince":selectedProvince,
	                 	"selectedDistrict":selectedDistrict
	                },
	                success: function(response) {
	                    $('#list-address').empty().html(response);
	                    $('#select-province').val(selectedProvince).attr('selected','selected');
	                    $('#select-district').val(selectedDistrict).attr('selected','selected');
	                },
	                error: function (jqXHR, textStatus, errorThrown) {
                	}
            	});
				e.preventDefault();
			});

			$(document).on('change', '#select-village',function(e){
				var selectedProvince = Number($('#select-province').val());
				var selectedDistrict = Number($('#select-district').val());
				var selectedVillage = Number($(this).find(":selected").val());
				$.ajax({
	                headers: {
	                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	                },
	                type: 'post',
	                url: '/checkout/list-address',
	                datatype:"html",
	                data: {
	                	"selectedProvince":selectedProvince,
	                 	"selectedDistrict":selectedDistrict,
	                 	"selectedVillage":selectedVillage
	                },
	                success: function(response) {
	                    $('#list-address').empty().html(response);
	                    $('#select-province').val(selectedProvince).attr('selected','selected');
	                    $('#select-district').val(selectedDistrict).attr('selected','selected');
	                    $('#select-village').val(selectedVillage).attr('selected','selected');
	                    var tax = Number($('#shipping').val()) + Number($('#total').val());
	                    $('#total_price').text(thousands_separators(tax)+"đ");
	                    $('#price_ship').text(thousands_separators(Number($('#shipping').val())+"đ"));
	                },
	                error: function (jqXHR, textStatus, errorThrown) {
                	}
            	});
				e.preventDefault();
			});
		});
	function thousands_separators(num)
	{
	    var num_parts = num.toString().split(".");
	    num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
	    return num_parts.join(".");
	}
	</script>
@endsection