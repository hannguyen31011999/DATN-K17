@extends('admin.mater-admin')
@section('header')
<title>Admin | Sản phẩm</title>
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
    .description{
        height: 150px;overflow: auto;
        width: 100px;
    }
</style>

@endsection
@section('main-conten')
<br>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
                <h4 class="m-t-0 header-title mb-4"><b>Danh sách sản phẩm</b></h4>
                <div class="headerds">
                    <a href="{{route('list-admin.ds-product.add')}}" class="btn btn-primary waves-effect waves-light"><i class=" ion ion-ios-add-circle-outline font-20"></i></a>
                </div>
                <table id="datatable" class="table table-bordered table-stried" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead class="table-info">
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Loại</th>
                            <th>Mô tả</th>
                            <th>Giá</th>
                            <th>Giá khuyến mãi</th>
                            <th>Số lượng</th>
                            <th>Hình</th>
                            <th>Đơn vị</th>
                            <th>Nguyên liệu thô</th>
                            <th>Nguồn</th>
                            <th>Thời gian</th>
                            <th>Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $listproduct as $pr )
                        <tr>
                            <td>{{ $pr->product_name }}</td>
                            @foreach( $listtypeproduct as $tpr )
                            @if( $pr->type_product_id == $tpr->id)
                            <td>{{ $tpr->type_name}}</td>
                            @endif
                            @endforeach
                            <td><div class="description" style="">{!! $pr->description !!}</div></td>
                            <td><span class="badge badge-purple">{{thousandSeperator($pr->unit_price) }} VNĐ</span></td>
                            <td><span class="badge badge-primary">{{thousandSeperator($pr->promotion_price) }} VNĐ</span></td>
                            <td><span class="badge badge-primary">{{$pr->qty}} Sản phẩm</span></td>
                            <td>
                                <div class="thumbnail">
                                    <img src="{{asset('admin/image/product/'.$pr->image)}}" alt="" />
                                </div>
                            </td>
                            <td>{{ $pr->unit }}</td>
                            <td>{{ $pr->raw_material }}</td>
                            <td>{{ $pr->origin }}</td>
                            <td>{{ $pr->created_at->format('d/m/20y - H:i') }}</td>
                            <td>
                                <a href="{{route('list-admin.ds-product.update', ['id'=>$pr->id])}}" class="text-primary font-20"><i class="fa fa-wrench"></i> </a>
                                <hr>
                                <a href="{{route('list-admin.ds-product.delete', ['id'=>$pr->id])}}" class="text-danger font-20" onclick="return confirm('Bạn chắc chắn xóa ?');"><i class="far fa-trash-alt"></i></a>
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