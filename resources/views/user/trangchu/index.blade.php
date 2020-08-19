@extends('user.master')
@section('title')
	Trang chủ
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

@endsection

@section('shopping-cart')

<div class="beta-comp" >
    <div class="cart">
        <div class="beta-select"> 
            <i class="fa fa-shopping-cart"></i> Giỏ hàng <span id="count_span"></span><i class="fa fa-chevron-down"></i>
        </div>
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
        if (window.history && window.history.pushState) {
            loadPage();
        }
        // Phân trang 
        $(document).on('click', '.pagination a',function(event)
        {
            event.preventDefault();
            $('li').removeClass('active');
            $(this).parent('li').addClass('active');
  
            var myurl = $(this).attr('href');

            var page=$(this).attr('href').split('page=')[1];

            getData(page);
        });
    });
        
    function loadPage(){
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax(
        {
            url: '/',
            type: "post",
            datatype: "html"
        }).done(function(response){
            $("#tag_container").empty().html(response);
        }).fail(function(jqXHR, ajaxOptions, thrownError){
              alert('No response from server');
        });
    }

    // function xử lí ajax
    function getData(page){
        $.ajax(
        {
            url: '?page=' + page,
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
