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
<script src="{{asset('user/ajax/trangchu.js')}}"></script>
<script type="text/javascript">
    var count = $('#count').val();
    $('#count_span').text("("+count+")");

    $(document).ready(function(){
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
                    type: 'delete',
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
    });
</script>
@endsection