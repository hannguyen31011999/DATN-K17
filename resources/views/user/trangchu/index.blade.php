@extends('user.master')

@section('title')
	Trang chủ
@endsection

@section('slider')
	@include('user.trangchu.template.slider')
@endsection

@section('content')
	@include('user.trangchu.template.content')
@endsection
