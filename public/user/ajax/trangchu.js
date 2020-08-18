$(document).ready(function()
{
    // Thêm sản phẩm 
    $(document).on('click', '.add-to-cart',function(event){
        event.preventDefault();
        var id = $(this).attr('id');
        $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
<<<<<<< HEAD
            type: 'post',
=======
            type: 'get',
>>>>>>> abc
            url: '/cart',
            data: {
              "id":id,
            },
            success: function(response) {
<<<<<<< HEAD
                if(response=="fail")
                {
                    alert('Sản phẩm hết hàng');
                }
                else
                {
                    $('.cart-body').empty().html(response);
                    var count = $('#count').val();
                    $('#count_span').text("("+count+")");
                    alertify.success('Thêm sản phẩm thành công');
                }
=======
                $('.cart-body').empty().html(response);
                var count = $('#count').val();
                $('#count_span').text("("+count+")");
                alertify.success('Thêm sản phẩm thành công');
>>>>>>> abc
            },
            error: function (jqXHR, textStatus, errorThrown) {
              //xử lý lỗi tại đây
            }
          });
    });

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
<<<<<<< HEAD
            type: 'delete',
=======
            type: 'post',
>>>>>>> abc
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