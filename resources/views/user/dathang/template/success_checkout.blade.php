@extends('user.master')
@section('content')
    <div class="alert alert-success">
        <span style="font-size:25px;padding: 400px;">Giao dịch thành công</span>
        <br></br><a href="{{route('home')}}" style="padding: 425px;font-size: 16px;">Quay lại tiếp tục mua hàng</a>
    </div>
    
@endsection