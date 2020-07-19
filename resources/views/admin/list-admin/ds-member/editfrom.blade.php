@extends('admin.mater-admin')
@section('header')
@endsection
@section('main-conten')
<a class="login-window button" href="#login-box">Đăng nhập</a>
<div class="login" id="login-box">
<form class="login-content" action="#" method="post"><label class="username">
 <span>Tên hoặc email</span>
 <div> 
    <input id="username" type="text" autocomplete="on" name="username" placeholder="Username" value="" />
    <button class="btn btn-icon waves-effect waves-light btn-warning" type="button"><i class="fa fa-wrench"></i></button>
 </div>
</form>

@endsection
@section('script')
<!-- Plugins js -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
@endsection