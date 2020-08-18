@extends('user.master')

@section('css')
<style type="text/css">
    .blog-img{
        float: left;
    }
    .blog-img img{
        height: 200px;
        width: 360px;
    }
    .blog-create{
        font-size: 14px;
        padding: 5px 0px;
        clear: both;
        display: inline-block;
    }
    .blog-title{
        font-family: Arial;
        font-size: 20px;
        padding: 5px 0px;
        clear: both;
        display: inline-block;
        margin: auto;
    }
    .blog-content{
        font-family: Arial;
        color: gray;
        font-size: 15px;
        clear: both;
        width: auto;
        height: auto;
        display: inline-block;
        text-align: justify;
        padding: 5px 0px;
    }
    .read-more{
        clear: both;
        display: inline-block;
        padding: 5px 0px;
    }
    .btn-read{
        font-family: Arial;
        border-radius: 30px;
        background-color: #82ae46;
        border: 1px solid #82ae46;
        padding-left: 20px;
        padding-right: 20px;
        padding-top: 10px;
        padding-bottom: 10px;
        color: white;
        font-size: 16px;
    }
    #box-img:hover .blog-title a{
         color: #c0c906;
    }
</style>
@endsection
@section('title')
	Bài viết
@endsection
@section('shopping-cart')
<div class="beta-comp" >
    <div class="cart">
        <div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng <span id="count_span" ></span><i class="fa fa-chevron-down"></i></div>
        <div class="beta-dropdown cart-body">
            @include('user.template.cart')
        </div>
    </div>
</div>
@endsection
@section('content')
    @include('user.baiviet.template.content_blog')
@endsection
@section('js')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('user/ajax/trangchu.js')}}"></script>
<script type="text/javascript">
    var count = $('#count').val();
    if(count>0)
    {
        $('#count_span').text("("+count+")");
    }
    else
    {
        $('#count_span').text("(0)");
    }
</script>
@endsection