@extends('user.master')

@section('title')
	Tìm kiếm
@endsection

@section('css')
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
<style type="text/css">
    .paginate{
        
    }
</style>

@endsection

@section('shopping-cart')
<div class="beta-comp" >
    <div class="cart">
        <div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng <span id="count_span"></span><i class="fa fa-chevron-down"></i></div>
        <div class="beta-dropdown cart-body">
            @include('user.template.cart')
        </div>
    </div>
</div>
@endsection
@section('slider')
	@include('user.trangchu.template.slider')
@endsection

@section('content')
	@include('user.trangchu.template.content')
@endsection

@section('js')
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('user/ajax/trangchu.js')}}"></script>
<script>
    var count = $('#count').val();
    if(count>0)
    {
        $('#count_span').text("("+count+")");
    }
    else
    {
        $('#count_span').text("(0)");
    }
    // Ajax
    $(document).ready(function()
    {
        // Phân trang 
        $(document).on('click', '.pagination a',function(event)
        {
            event.preventDefault();
            $('li').removeClass('active');

            $(this).parent('li').addClass('active');
  
            var url = $(this).attr('href');

            var keyword = $('#url').val();

            getData(url,keyword);
        });
    });
        
    // function xử lí ajax
    function getData(url,keyword){
        $.ajax(
        {
            url: url,
            type: "get",
            data:{
                "keyword":keyword
            },
            datatype: "html"
        }).done(function(response){
            console.log(response);
            $("#tag_container").empty().html(response);
        }).fail(function(jqXHR, ajaxOptions, thrownError){
              alert('No response from server');
        });
    }
</script>
@endsection
