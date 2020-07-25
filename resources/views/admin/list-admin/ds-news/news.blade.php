@extends('admin.mater-admin')
@section('header')
<title>Admin | Bài viết</title>
@endsection
@section('main-conten')
<div class="row">
    <div class="col-12">
        <div class="headerds">
            <a href="{{route('list-admin.ds-news.add')}}" class="btn btn-primary waves-effect width-md waves-light"><i class=" ion ion-ios-add-circle-outline font-20"> Thêm mới</i></a>
        </div>
        <div>
            <h4 class="m-t-0 header-title mb-4"><b>Danh sách bài viết</b></h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
                <table id="datatable" class="table table-bordered mb-1 " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead class="table-info">
                        <tr>
                            <th>Id</th>
                            <th>Tiêu đề</th>
                            <th>Nội dung</th>
                            <th>Hình ảnh</th>
                            <th>Người viết</th>
                            <th>Chỉnh sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $listNews as $ns )
                        <tr>
                            <td>{{ $ns->id }}</td>
                            <td>{{ $ns->title }}</td>
                            <td>{{ $ns->content }}</td>
                            <td>
                                <div class="thumbnail">
                                    <img src="{{asset('img/news/'.$ns->image)}}" alt="" />
                                </div>
                            </td>
                            @foreach($listUser as $us)
                            @if($ns->user_id_create == $us->id)
                            <td>{{$us->email}}</td>
                            @endif
                            @endforeach
                            <td>
                                <a href="{{route('list-admin.ds-news.update', ['id'=>$ns->id])}}"  class="btn btn-outline-purple btn-rounded waves-effect waves-light"><i class="fa fa-wrench"></i> </a>
                                <hr>
                                <a onclick="del()" href="#" class="btn btn-outline-danger btn-rounded waves-effect waves-light"><i class="far fa-trash-alt"></i></a>
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
                                                open("{{route('list-admin.ds-news.delete', ['id'=>$ns->id])}}", "_self")
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
        @include('sweetalert::alert')
    </div>
</div>
@endsection
@section('script')
@endsection