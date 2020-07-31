@extends('user.master')

@section('css')
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
            <div class="col-sm-8">
                {!!$news->content!!}
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
    $('#count_span').text("("+count+")");
</script>
@endsection