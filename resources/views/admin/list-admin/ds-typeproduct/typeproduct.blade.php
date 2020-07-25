@extends('admin.mater-admin')
@section('header')
@endsection
@section('main-conten')
<div class="row">
    <div class="col-12">
        <div class="headerds">
            <a href="{{route('list-admin.ds-typeproduct.add')}}" class="btn btn-primary waves-effect width-md waves-light"><i class=" ion ion-ios-add-circle-outline font-20"> Thêm mới</i></a>
        </div>
        <div>
            <h4 class="m-t-0 header-title mb-4"><b>Danh sách loại sản phẩm</b></h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
                <table id="datatable" class="table table-bordered table-stried" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead class="table-info">
                        <tr>
                            <th>Id</th>
                            <th>Loại SP</th>
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
                            <td>
                                <div class="thumbnail">
                                    <img src="{{asset('img/typeproduct/'.$tpr->image)}} alt=" />
                                </div>
                            </td>
                            <td>
                                <a href="{{route('list-admin.ds-typeproduct.update', ['id'=>$tpr->id])}}" class="btn btn-outline-purple btn-rounded waves-effect waves-light"><i class="fa fa-wrench"></i> </a>
                                <hr>
                                <a onclick="del()" href="#" class="btn btn-outline-danger btn-rounded waves-effect waves-light"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @include('sweetalert::alert')
    </div>
</div>
@endsection
@section('script')
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
@endsection