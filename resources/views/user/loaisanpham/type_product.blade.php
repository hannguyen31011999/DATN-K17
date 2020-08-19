@extends('user.master')

@section('title')
	Loại sản phẩm
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
    .product-seller{
        border: 1px solid gray;
    }
</style>
@endsection

@section('shopping-cart')
<div class="beta-comp" >
    <div class="cart">
        <div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng <span id="count_span" class=""></span><i class="fa fa-chevron-down"></i></div>
        <div class="beta-dropdown cart-body">
            @include('user.template.cart')
        </div>
    </div>
</div>
@endsection
@section('content')
    <input type="hidden" name="" value="{{$url}}" id="urlTypeProduct">
    @include('user.loaisanpham.content')
@endsection

@section('js')
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
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
	$(document).ready(function()
    {
        if (window.history && window.history.pushState) {
            var url = $('#urlTypeProduct').val().split('http://localhost:8000/')[1];
            loadPage(url);
        }
    	// Phân trang
        $(document).on('click', '.pagination a',function(event)
        {
            event.preventDefault();

            $('ul.pagination').children().removeClass('active');

            $(this).parent('li').addClass('active');
  
            var myurl = $(this).attr('href');

            getData(myurl);
        });
	});

    function loadPage(url){
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax(
        {
            url: '/' + url,
            type: "post",
            datatype: "html"
        }).done(function(response){
            $("#tag_container").empty().html(response);
        }).fail(function(jqXHR, ajaxOptions, thrownError){
        });
    }

	function getData(url){
        $.ajax(
        {
            url:url,
            type: "get",
            datatype: "html"
        }).done(function(response){
            $("#tag_container").empty().html(response);
        }).fail(function(jqXHR, ajaxOptions, thrownError){
              alert('No response from server');
        });
    }
</script>
@endsection