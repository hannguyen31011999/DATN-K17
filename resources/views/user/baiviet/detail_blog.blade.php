@extends('user.master')

@section('css')
<style type="text/css">
    .content-post p,h3{
        font-size: 20px;
        line-height: 2rem;
    }
    .content-post h2{
        line-height: 3rem;
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
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
            </div>
            @if(isset($news))
            <div class="col-sm-8 content">
                <br></br>
                <img src="{{asset('admin/image/posts/'.$news->image)}}" style="width: 100%;height: 400px;">
                <div class="content-post" style="font-size: 20px;line-height: 30px;">
                    {!!$news->content!!}
                </div>
            </div>
            @endif
            <div class="col-sm-2">
                
            </div>
        </div>
    </div>
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