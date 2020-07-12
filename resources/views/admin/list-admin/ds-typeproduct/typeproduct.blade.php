@extends('admin.mater-admin')
@section('header')
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
                            <th>Tên Loại SP</th>
                            <th>Mô tả</th>
                            <th>Hình</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $listtypeproduct as $tpr )
                        <tr>
                            <td>{{ $tpr->id }}</td>
                            <td>{{ $tpr->type_name }}</td>
                            <td>{{ $tpr->description }}</td>
                            <td><img height="100px" width="100px" src="{{asset('img/typeproduct/'.$tpr->image)}}" /></td>
                            <td>
                                <a href="{{route('list-admin.ds-typeproduct.update', ['id'=>$tpr->id])}}" class="btn btn-icon waves-effect waves-light btn-warning"><i class="fa fa-wrench"></i> </a>
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
                                                open("{{route('list-admin.ds-typeproduct.delete', ['id'=>$tpr->id])}}", "_self")
                                            }
                                        })
                                    };
                                </script>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{route('list-admin.ds-typeproduct.add')}}" class="btn btn-outline-primary waves-effect width-md waves-light"><i class=" fas fa-plus"></i> Thêm mới</a>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@endsection