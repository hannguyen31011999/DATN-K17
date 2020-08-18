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
            type: 'post',
            url: '/cart',
            data: {
              "id":id,
            },
            success: function(response) {
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
            type: 'delete',
            url: '/cart',
            data: {
              "rowId":rowId,
            },
            success: function(response) {
                if(response=="fail")
                {
                    alert('Sản phẩm hết hàng');
                }
                else
                {
                    $('.cart-body').empty().html(response);
                    var count = $('#count').val();
                    $('#count_span').text("("+count+")");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
              //xử lý lỗi tại đây
            }
          });
        }
    });
});