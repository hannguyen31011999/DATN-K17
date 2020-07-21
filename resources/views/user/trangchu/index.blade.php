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
<script>
    var count = $('#count').val();
    $('#count_span').text("("+count+")");
    // Ajax
    $(document).ready(function()
    {
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
        
        // Thêm sản phẩm 
        $(document).on('click', '.add-to-cart',function(event){
            event.preventDefault();
            var id = $(this).attr('id');
            $.ajax({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/',
                data: {
                  "id":id,
                },
                success: function(response) {
                    $('.cart-body').empty().html(response);
                    var count = $('#count').val();
                    $('#count_span').text("("+count+")");
                    alertify.success('Thêm sản phẩm thành công');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                  //xử lý lỗi tại đây
                }
              });
        })

        // Delete sản phẩm
        $(document).on('click', '.deleteCart',function(event){
            event.preventDefault();
            var bool = confirm('Bạn có muốn xóa sản phẩm này không?');
            var rowId = $(this).attr('id');
            if(bool)
            {
                $.ajax({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'delete',
                url: '/',
                data: {
                  "rowId":rowId,
                },
                success: function(response) {
                    $('.cart-body').empty().html(response);
                    var count = $('#count').val();
                    $('#count_span').text("("+count+")");
                },
                error: function (jqXHR, textStatus, errorThrown) {
                  //xử lý lỗi tại đây
                }
              });
            }
        })
    });
    
    // function xử lí ajax
    function getData(page){
        $.ajax(
        {
            url: '?page=' + page,
            type: "get",
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
