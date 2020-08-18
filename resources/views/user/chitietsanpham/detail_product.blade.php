@extends('user.master')

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
@section('title')
	Chi tiết sản phẩm
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
    @include('user.chitietsanpham.template.content')
@endsection
@section('js')
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script src="{{asset('js/jquery.min.js')}}"></script>
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
    $(document).ready(function(){
        var product_qty = $('#hidden-qty').val();
        $(document).on('submit', '#form-comment',function(event){
            var comment = $('#comment').val();
            var url = $(this).attr('data-url');
            $.ajax({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: url,
                data: {
                  "comment":comment
                },
                success:function(response) {
                    if(!jQuery.isEmptyObject(response.url))
                    {
                        alert('Cần đăng nhập trước khi bình luận');
                        window.location.replace(response.url);
                    }
                    else{
                        console.log(response);
                        $('#tag_container').empty().html(response);
                        $('#tab-description').removeClass('active');
                        $('#tab-comment').addClass('active');
                        alertify.success('Thêm bình luận thành công');
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {

                }
            });
            event.preventDefault();
        });

        $(document).on('click', '.deleteComment',function(event){
            var commentId = $(this).attr('id');
            var url = $(this).attr('data-url');
            var bool = confirm('Bạn muốn xóa bình luận?');
            if(bool)
            {
                $.ajax({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: url,
                    data: {
                      "commentId":commentId
                    },
                    success:function(response) {
                        console.log(response);
                        $('#tag_container').empty().html(response);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {

                    }
                });
            }
            event.preventDefault();
        });


        // Update số lượng
        $(document).on('click', '.number-next',function(event){
            var number = $('#input-qty').val();
            var qty = 1 + Number(number);
            if(qty>product_qty)
            {
                $('#input-qty').val(1);
                alert('Sản phẩm không đủ hàng');
            }
            else
            {
                $('#input-qty').val(qty);
            }
            event.preventDefault();
        });

        $(document).on('change','.number-input',function(event){
            var qty = Number($('#input-qty').val());
            if(qty>product_qty)
            {
                $('#input-qty').val(1);
                alert('Sản phẩm không đủ hàng');
            }
            else
            {
                $('#input-qty').val(qty);
            }
            event.preventDefault();
        });

        $(document).on('click', '.number-pre',function(event){
            event.preventDefault();
            if(number>1)
            {
                var number = $('#input-qty').val();
                var qty = number - 1;
                $('#input-qty').val(qty);
            }
            else
            {
                $('#input-qty').val(1);
            }
            
        });

        $(document).on('click', '.add-to-cart',function(event){
            var id = $(this).attr('id');
            var qty = $('#input-qty').val();
            var url = $(this).attr('data-url');
                $.ajax({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: url,
                    data: {
                      "id":id,
                      "qty":qty
                    },
                    success:function(response) {
                        if(response=="fail")
                        {
                            alert('Sản phẩm không đủ hàng');
                            $('#input-qty').val(1);
                        }
                        else
                        {
                            $('.cart-body').empty().html(response);
                            var count = $('#count').val();
                            $('#count_span').text("("+count+")");
                            alertify.success('Thêm sản phẩm thành công');
                        }
                        
                    },
                    error: function (response) {
                        alert(response.error);
                    }
                });
            event.preventDefault();
        });

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
            url: '/cart',
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
    });
    });
</script>
@endsection