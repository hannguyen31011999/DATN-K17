@extends('admin.mater-admin')
@section('header')
@endsection
@section('main-conten')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
                <h4 class="m-t-0 header-title mb-4"><b>Danh sách user và admin</b></h4>
                <table id="datatable" class="table table-bordered table-stried" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Mật khẩu</th>
                            <th>Tên</th>
                            <th>Giới tính</th>
                            <th>Ngày sinh</th>
                            <th>SDT</th>
                            <th>Địa chỉ</th>
                            <th>Vai trò</th>
                            <th>status</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $listUser as $us )
                        <tr>
                            <td>{{ $us->email }}</td>
                            <td>{{ $us->password }}</td>
                            <td>{{ $us->name }}</td>
                            <td>{{ $us->sex }}</td>
                            <td>{{ $us->birthdate }}</td>
                            <td>{{ $us->phone }}</td>
                            <td>{{ $us->address }}</td>
                            <td>
                                @if($us->role == 0)
                                   <a href="#"> <span class="badge badge-dark">Admin</span>  
                                @else
                                  <a href="#"> <span class="badge badge-pink">User</span> </a> 
                                @endif
                            </td>
                            <td>
                               @if($us->status == 1)
                                   <a href="{{route('list-admin.ds-user.update', ['id'=>$us->id])}}"> <span class="badge badge-info">Đang mở</span>  
                                @else
                                  <a href="{{route('list-admin.ds-user.update', ['id'=>$us->id])}}"> <span class="badge badge-danger">Đã ẩn</span> </a> 
                                @endif
                            <td>
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
                                                open("{{route('list-admin.ds-user.delete', ['id'=>$us->id])}}", "_self")
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
@endsection