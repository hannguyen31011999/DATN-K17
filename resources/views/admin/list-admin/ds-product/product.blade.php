@extends('admin.mater-admin')
@section('header')
<title>Admin|product</title>
@endsection
@section('main-conten')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
                <h4 class="m-t-0 header-title mb-4"><b>Danh sách loại sản phẩm</b></h4>
                <table id="datatable" class="table table-bordered table-stried" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tên SP</th>
                            <th>Loại</th>
                            <th>Mô tả</th>
                            <th>Giá</th>
                            <th>Giá khuyến mãi</th>
                            <th>Hình</th>
                            <th>Đơn vị</th>
                            <th>Nguyên liệu thô</th>
                            <th>Nguồn</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $listproduct as $pr )
                        <tr>
                            <td>{{ $pr->id }}</td>
                            <td>{{ $pr->product_name }}</td>
                             @foreach( $listtypeproduct as $tpr )
                                    @if( $pr->type_product_id ==  $tpr->id)
                                    <td>{{ $tpr->type_name}}</td>
                                    @endif
                            @endforeach
                            <td>{{ $pr->description }}</td>
                            <td><span class="badge badge-purple">{{ $pr->unit_price }} VNĐ</span></td>
                            <td><span class="badge badge-primary">{{ $pr->promotion_price }} VNĐ</span></td>
                            <td>
                               <div class="thumbnail">
                                  <img src="{{asset('img/product/'.$pr->image)}}" alt=""  />
                               </div>
                            </td>
                            <td>{{ $pr->unit }}</td>
                            <td>{{ $pr->raw_material }}</td>
                            <td>{{ $pr->origin }}</td>
                            
                            <td>
                                <a href="{{route('list-admin.ds-product.update', ['id'=>$pr->id])}}" class="btn btn-icon waves-effect waves-light btn-warning"><i class="fa fa-wrench"></i> </a>
                                <hr>
                                <a onclick="del()" href="#" class="btn btn-icon waves-effect waves-light btn-danger"><i class="far fa-trash-alt"></i></a>
                                <script>
                                    function del() {
                                        Swal.fire({
                                            title: 'Bạn có chắc chấn xóa !',
                                            type: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'Có',
                                            cancelButtonText: 'không'
                                        }).then((result) => {
                                            if (result.value) {
                                                open("{{route('list-admin.ds-product.delete', ['id'=>$pr->id])}}", "_self")
                                            }
                                        })
                                    };
                                </script>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr>
                <a href="{{route('list-admin.ds-product.add')}}" class="btn btn-success waves-effect width-md waves-light"><i class=" ion ion-ios-add-circle-outline font-20"> Thêm mới</i></a>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@endsection