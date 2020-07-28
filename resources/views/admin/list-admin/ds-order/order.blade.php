@extends('admin.mater-admin')
@section('header')
<title>Admin | Đơn hàng</title>
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
                <table id="datatable" class="table table-bordered table-stried" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
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
                        <td>{{$od->created_at->format('d/m/y - H:i')}}</td>
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
                        <td>{{ $od->note }}</td>
                        <td>
                            @if($od->status==0)
                                <a href="{{route('list-admin.ds-order.update', ['id'=>$od->id])}}" class="text font-20"> <span class="badge badge-danger"><i class="fas fa-times"></i> Chưa xác nhận</span></a>
                            @elseif($od->status==1)
                                <a href="{{route('list-admin.ds-order.update', ['id'=>$od->id])}}"  class="text font-20"> <span class="badge badge-warning"><i class=" fas fa-toggle-on"></i> Xác nhận</span> </a>
                            @elseif($od->status==2)
                                <a href="{{route('list-admin.ds-order.update', ['id'=>$od->id])}}" class="text font-20"> <span class="badge badge-success"><i class=" fas fa-check"></i> Hoàn thành</span></a>
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

@endsection