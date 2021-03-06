@extends('admin.mater-admin')
@section('header')
<title>Admin | Đơn hàng</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/styles/metro/notify-metro.css" />
<style>
    .headerds {
        margin-left: 92%;
        margin-bottom: -28px;
        margin-top: 11px;
    }
    input#seach {
        width: 15%;
    height: 40px;
    float: right;
}
</style>
@endsection
@section('main-conten')
<br>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
                <h4 class="m-t-0 mb-4"><b>DANH SÁCH ORDER</b></h4>
                <select class="custom-select" id="select-list" name="list-order" style="width:145px;">
                    <option value="3">
                        Tất cả
                    </option>
                    <option value="0">
                        Chưa xác nhận
                    </option>
                    <option value="1">
                        Xác nhận
                    </option>
                    <option value="2">
                        Hoàn thành
                    </option>
                </select>
                <input type="seach" id="seach" class="form-control form-control-sm" placeholder="Nhập tìm kiếm" aria-controls="datatable" style="width: 15%; float: right;">
                <br></br>
                <div id="table_order">
                    @include('admin.list-admin.ds-order.template.content_order')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        

        $(document).on('click', '.pagination a',function(event)
        {
            event.preventDefault();

            $('li').removeClass('active');

            $(this).parent('li').addClass('active');
  
            var myurl = $(this).attr('href');

            var selectoption =  $('select[name="list-order"]').val();

            var page=$(this).attr('href').split('page=')[1];

            getData(page,selectoption);
        });

    $(document).on('change', '#select-list',function(e){
            var selectedlist = $(this).find(":selected").val();
            $.ajax({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'get',
                url: '/admin/list-order',
                datatype:"html",
                data: {
                  "selectedlist":selectedlist
                },
                success: function(response) {
                    console.log(response);
                    $('#table_order').empty().html(response);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                }
            });
            e.preventDefault();
        });
    });

    $(document).on('change', '.custom-select',function(e){
            var id = $(this).attr('id');
            var selected = $(this).find(":selected").val();
            $.ajax({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/admin/list-order',
                data: {
                  "id":id,
                  "selected":selected
                },
                success: function(response) {
                    alert(response);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                }
            });
            e.preventDefault();
        });


    $(document).on('keyup', '#seach',function(event){
        var keyword = $('#seach').val();
        if(keyword!="")
        {
            $.ajax({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'get',
                url: '/admin/list-order',
                data: {
                  "keyword":keyword
                },
                success:function(response) {
                    console.log(response);
                    $("#table_order").empty().html(response);
                },
                error: function (jqXHR, textStatus, errorThrown) {

                }
            });
            event.preventDefault();
        }
        else
        {
            $.ajax({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'get',
                url: '/admin/list-order',
                data: {
                  "keyword":keyword
                },
                success:function(response) {
                    console.log(response);
                    $("#table_order").empty().html(response);
                },
                error: function (jqXHR, textStatus, errorThrown) {

                }
            });
            event.preventDefault();
        }
    });
    function getData(page,selectoption){
        $.ajax(
        {
            url: '/admin/list-order?page=' + page,
            data:{
                'selectoption':selectoption
            },
            type: "get",
            datatype: "html"
        }).done(function(response){
            console.log(response);
            $("#table_order").empty().html(response);
        }).fail(function(jqXHR, ajaxOptions, thrownError){
              alert('No response from server');
        });
    }
</script>

@endsection