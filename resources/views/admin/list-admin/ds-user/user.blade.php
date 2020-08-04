@extends('admin.mater-admin')
@section('header')
<title>Admin | Người dùng</title>
@endsection
@section('main-conten')
<br>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
                <h4 class="m-t-0 mb-4"><b>DANH SÁCH USER</b></h4>
                <table id="datatable" class="table table-bordered table-stried" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Tên</th>
                            <th>Giới tính</th>
                            <th>Ngày sinh</th>
                            <th>SĐT</th>
                            <th>Địa chỉ</th>
                            <!-- <th>Vai trò</th> -->
                            <th>Trạng thái</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $listUser as $us )
                        <tr>
                            <td>{{ $us->email }}</td>
                            <td>{{ $us->name }}</td>
                            @if($us->sex == 0)
                            <td>Nam</td>
                            @elseif($us->sex == 1)
                            <td>Nữ</td>
                            @elseif($us->sex == 2)
                            <td>khác</td>
                            @endif
                            @if(isset($us->birthdate))
                            <td>{{ $us->birthdate->format('d/m/y')}}</td>
                            @else
                            <td>{{ $us->birthdate}}</td>
                            @endif
                            <td>{{ $us->phone }}</td>
                            <td>{{ $us->address }}</td>
                            <!-- <td>
                                @if($us->role == 0)
                                <a href="#"> <span class="badge badge-dark">Admin</span>
                                    @else
                                    <a href="#"> <span class="badge badge-pink">User</span> </a>
                                    @endif
                            </td> -->
                            <td>
                                @if($us->status == 1)
                                <a href="{{route('list-admin.ds-user.update', ['id'=>$us->id])}}" class="text-info font-20" onclick="return confirm('Bạn chắc chắn khóa tài khoản này ?');"> <i class=" fas fa-check"></i></a>
                                @else
                                <a href="{{route('list-admin.ds-user.update', ['id'=>$us->id])}}" class="text-dark font-20" onclick="return confirm('Bạn chắc chắn mở khóa tài khoản này ?');"> <i class="fas fa-lock"></i></a>
                                @endif

                            </td>
                            <td>
                                <a href="{{route('list-admin.ds-user.delete', ['id'=>$us->id])}}" class="text-danger font-20" onclick="return confirm('Bạn chất chắn xóa ?');"><i class="far fa-trash-alt"></i></a>
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