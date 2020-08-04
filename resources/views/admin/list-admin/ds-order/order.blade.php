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
</style>
@endsection
@section('main-conten')
<br>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
                <h4 class="m-t-0 mb-4"><b>DANH SÁCH ORDER</b></h4>
                <table class="table table-bordered table-stried" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Thời gian</th>
                            <th>Khách hàng id</th>
                            <th>Thanh toán</th>
                            <th>Ghi chú</th>
                            <th>Trạng thái</th>
                            <th>SĐT</th>
                            <th>Địa chỉ</th>
                            <th>Chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $listOrder as $od )
                        <tr >
                            <td>{{$od->created_at->format('d/m/yy - H:i')}}</td>
                            @if($od->customer_id == NULL)
                            <td>Khách hàng</td>
                            @else
                            @foreach( $listUser as $us )
                            @if($us->id == $od->customer_id)
                            <td>{{ $us->email }}</td>
                            @endif
                            @endforeach
                            @endif
                            @if($od->payment==0)
                            <td>Khi nhận hàng</td>
                            @elseif($od->payment==1)
                            <td>Thanh toán ATM</td>
                            @endif
                            <td>{{ $od->id }}</td>
                            <td>
                                @if(isset($od->id))
                                @endif
                                <input type="hidden" id="_token" value="{{ csrf_token() }}">
                                <input type="hidden" id='idsl' value="{{$od->id}}">
                                <select class="custom-select " id="1" name="status">
                                    @if($od->status==0)
                                    <option value="{{$od->status}}" disabled="disabled">
                                        Chưa xác nhận
                                    </option>
                                    <option value="1">
                                        xác nhận
                                    </option>
                                    <option value="2">
                                        Hoàn thành
                                    </option>
                                    @elseif($od->status==1)
                                    <option value="0">
                                        Chưa xác nhận
                                    </option>
                                    <option value="{{$od->status}}" disabled="disabled">
                                        xác nhận
                                    </option>
                                    <option value="2">
                                        Hoàn thành
                                    </option>
                                    @elseif($od->status==2)
                                    <option value="0">
                                        Chưa xác nhận
                                    </option>
                                    <option value="1">
                                        xác nhận
                                    </option>
                                    <option value="{{$od->status}}" disabled="disabled">
                                        Hoàn thành
                                    </option>

                                </select>
                                @endif
                            </td>
                            <td>{{ $od->phone }}</td>
                            <td>{{ $od->address }}</td>
                            <td>
                                <a href="{{route('list-admin.ds-order.detail', ['id'=>$od->id])}}" class="text-warning font-20"><i class="  fas fa-paperclip"></i></a>
                            </td>
                         </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
<script type="text/javascript">
    $('select').change(function() {
        var id = $("#idsl").val();
        var optionSelected = $(this).find("option:selected");
        var valueSelected = optionSelected.val();
        alert(id)
    });
    // $(document).ready(function() {
    //     $('#change-order').submit(function(e) {
    //         var status = $('#status').val();
    //         var url = $(this).attr('data-url');
    //         e.preventDefault();
    //         $.ajax({
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             },
    //             type: 'post',
    //             url: url,
    //             data: {
    //                 "status": status,

    //             },
    //             success: function(response) {
    //                 console.log(response.data)
    //                 $.notify(response.data, "success")
    //             },
    //             error: function(jqXHR, textStatus, errorThrown) {
    //                 //xử lý lỗi tại đây
    //             }
    //         });
    //     });
    // });
</script>

@endsection