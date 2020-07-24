@extends('admin.mater-admin')
@section('header')
<style>
    .login {
        background-color: #70809a;
        height: auto;
        width: 1000px;
        font-family: Verdana, Arial, Helvetica, sans-serif;
        font-size: 14px;
        padding-bottom: 5px;
        display: none;
        overflow: hidden;
        position: absolute;
        z-index: 99999;
        top: 10%;
        left: 50%;
        margin-left: -547px;
        border-radius: 17px;
    }
</style>
@endsection
@section('main-conten')
<hr>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
                <h4 class="m-t-0 header-title mb-4"><b>Danh sách Order</b></h4>
                <table id="datatable" class="table table-bordered table-stried" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
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
                        <tr>
                            <td>{{ $od->customer_id }}</td>
                            <td>{{ $od->payment }}</td>
                            <td>{{ $od->note }}</td>
                            <td>
                                @if($od->status == 1)
                                <a href="{{route('list-admin.ds-order.update', ['id'=>$od->id])}}"> <span class="badge badge-info">Đang mở</span>
                                    @else
                                    <a href="{{route('list-admin.ds-order.update', ['id'=>$od->id])}}"> <span class="badge badge-danger">Đã ẩn</span> </a>
                                    @endif
                            </td>
                            <td>{{ $od->phone }}</td>
                            <td>{{ $od->address }}</td>
                            <td>
                                <a class="login-window button" href="#orderdetali">Xem</a>
                                <div class="login" id="orderdetali">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body table-responsive">
                                                    <h4 class="m-t-0 header-title mb-4"><b>Danh sách Order</b></h4>
                                                    <table id="datatable-s" class="table table-bordered table-stried" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                        <thead>
                                                            <tr>
                                                                <th>id</th>
                                                                <th>Đơn hàng</th>
                                                                <th>Sản phẩm</th>
                                                                <th>Số lượng</th>
                                                                <th>Giá sản phẩm</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $data = App\Model\Order::find($od->id)->OrderDetail
                                                            ?>
                                                            @foreach( $data as $odt )
                                                            <tr>
                                                                <td>{{$odt->id}}</td>
                                                                <td>{{$odt->bill_id}}</td>
                                                                @foreach( $listProduct as $pr )
                                                                    @if($pr->id==$odt->product_id)
                                                                        <td>{{$pr->product_name}}</td>
                                                                    @endif
                                                                @endforeach
                                                                <td>{{$odt->qty}}</td>
                                                                <td>{{$odt->product_price}}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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