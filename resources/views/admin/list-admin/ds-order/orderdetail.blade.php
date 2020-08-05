@extends('admin.mater-admin')
@section('header')
<title>Admin | Đơn hàng</title>
<style>
    .headerds {
        margin-left: 96%;
        margin-bottom: -38px;
    }

    div.dataTables_wrapper div.dataTables_filter label {
        font-weight: normal;
        white-space: nowrap;
        margin-right: 12%;
    }
</style>
@endsection
@section('main-conten')
<br>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
                <h4 class="m-t-0 header-title mb-4"><b>DANH SÁCH CHI TIẾT ĐƠN HÀNG</b></h4>
                <div class="headerds">
                    <a href="{{route('list-admin.ds-order.list')}}" class="btn btn-primary waves-effect waves-light"><i class="fas fa-arrow-right"></i></a>
                </div>
                <table id="datatable" class="table table-bordered table-stried" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead class="table-info">
                        <tr>
                            <th>Đơn hàng</th>
                            <th>Sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá sản phẩm</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $listDetail as $ot )
                        <tr>
                            <td>{{$ot->bill_id}}</td>
                            @foreach( $listProduct as $pr )
                            @if($pr->id==$ot->product_id)
                            <td>{{$pr->product_name}}</td>
                            @endif
                            @endforeach
                            <td>{{$ot->qty}}</td>
                            <td>{{$ot->product_price}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    </tboty>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@endsection