@extends('admin.mater-admin')
@section('header')
<link href="{{asset('admin\assets\libs\datatables\dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{asset('admin\assets\libs\datatables\buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{asset('admin\assets\libs\datatables\responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{asset('admin\assets\libs\datatables\select.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('main-conten')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
                <h4 class="m-t-0 header-title mb-4"><b>Danh sách loại sản phẩm</b></h4>
                <a href="{{route('list-admin.ds-typeproduct.add')}}" class="btn btn-outline-primary waves-effect width-md waves-light"><i class=" fas fa-plus"></i> Thêm mới</a>
                <br>
                <br>
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
                        @foreach( $listproduct as $pr )
                        <tr>
                            <td>{{ $pr->id }}</td>
                            <td>{{ $pr->type_name }}</td>
                            <td>{{ $pr->description }}</td>
                            <td><img height="100px" width="100px" src="{{asset('img/typeproduct/'.$pr->image)}}" /></td>
                            <td>
                                <a href="{{route('list-admin.ds-typeproduct.update', ['id'=>$pr->id])}}" class="btn btn-icon waves-effect waves-light btn-warning"><i class="fa fa-wrench"></i> </a>
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
                                                open("{{route('list-admin.ds-typeproduct.delete', ['id'=>$pr->id])}}", "_self")
                                            }
                                        })
                                    };
                                </script>
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
<!-- Required datatable js -->
<script src="{{asset('admin\assets\libs\datatables\jquery.dataTables.min.js') }}"></script>
<script src="{{asset('admin\assets\libs\datatables\dataTables.bootstrap4.min.js') }}"></script>
<!-- Buttons examples -->
<script src="{{asset('admin\assets\libs\datatables\dataTables.buttons.min.js') }}"></script>
<script src="{{asset('admin\assets\libs\datatables\buttons.bootstrap4.min.js') }}"></script>
<script src="{{asset('admin\assets\libs\jszip\jszip.min.js') }}"></script>
<script src="{{asset('admin\assets\libs\pdfmake\pdfmake.min.js') }}"></script>
<script src="{{asset('admin\assets\libs\pdfmake\vfs_fonts.js') }}"></script>
<script src="{{asset('admin\assets\libs\datatables\buttons.html5.min.js') }}"></script>
<script src="{{asset('admin\assets\libs\datatables\buttons.print.min.js') }}"></script>

<!-- Responsive examples -->
<script src="{{asset('admin\assets\libs\datatables\dataTables.responsive.min.js') }}"></script>
<script src="{{asset('admin\assets\libs\datatables\responsive.bootstrap4.min.js') }}"></script>

<script src="{{asset('admin\assets\libs\datatables\dataTables.keyTable.min.js') }}"></script>
<script src="{{asset('admin\assets\libs\datatables\dataTables.select.min.js') }}"></script>

<!-- Datatables init -->
<script src="{{asset('admin\assets\js\pages\datatables.init.js') }}"></script>
@endsection