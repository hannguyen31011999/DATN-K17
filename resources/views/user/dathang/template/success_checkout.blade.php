@extends('user.master')
@section('content')
    <div class="alert alert-success">
        Giao dịch thành công
    </div>
    <a href="{{route('home')}}">Quay lại tiếp tục mua hàng</a>
@endsection