@extends('user.master')

@section('css')

@endsection

@section('title')
	Đặt hàng
@endsection
@section('content')
<div class="inner-header">
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
@endsection