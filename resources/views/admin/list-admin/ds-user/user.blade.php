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
                <h4 class="m-t-0 mb-4"><b>DANH SÁCH NGƯỜI DÙNG</b></h4>
                <select class="custom-select" id="select-list" name="list-user" style="width:145px;">
                    <option value="3">
                        Tất cả
                    </option>
                    <option value="1">
                        Mở
                    </option>
                    <option value="0">
                        Khóa
                    </option>
                </select>
                <input type="seach" id="seach" class="form-control form-control-sm" placeholder="Nhập tìm kiếm" aria-controls="datatable" >
                <br></br>
                <div id="table_user">
                    @include('admin.list-admin.ds-user.template.content_user')
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

            var selectoption =  $('select[name="list-user"]').val();

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
                url: '/admin/list-user',
                datatype:"html",
                data: {
                  "selectedlist":selectedlist
                },
                success: function(response) {
                    $('#table_user').empty().html(response);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                }
            });
            e.preventDefault();
        });
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
                url: '/admin/list-user',
                data: {
                  "keyword":keyword
                },
                success:function(response) {
                    $("#table_user").empty().html(response);
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
                url: '/admin/list-user',
                data: {
                  "keyword":keyword
                },
                success:function(response) {
                    $("#table_user").empty().html(response);
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
            url: '/admin/list-user?page=' + page,
            data:{
                'selectoption':selectoption
            },
            type: "get",
            datatype: "html"
        }).done(function(response){
            $("#table_user").empty().html(response);
        }).fail(function(jqXHR, ajaxOptions, thrownError){
              alert('No response from server');
        });
    }
</script>

@endsection