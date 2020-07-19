@extends('admin.mater-admin')
@section('header')
<title>Admin | Bình luận</title>
@endsection
@section('main-conten')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
                <h4 class="m-t-0 header-title mb-4"><b>Danh sách comment</b></h4>
                <table id="datatable" class="table table-bordered table-stried" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Người dùng</th>
                            <th>Sản phẩm</th>
                            <th>Nội dung</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $listComment as $cm )
                        <tr>
                            <td>{{ $cm->id }}</td>
                            @foreach( $listUser as $us )
                               @if($cm->user_id == $us->id)
                                  <td>{{ $us->email }}</td>
                               @endif
                            @endforeach
                            @foreach( $listProduct as $pr )
                               @if($cm->product_id == $pr->id)
                                  <td>{{ $pr->product_name }}</td>
                               @endif
                            @endforeach
                            <td>{{ $cm->content }}</td>
                            <td>
                                @if($cm->status == 1)
                                   <a href="{{route('list-admin.ds-comment.update', ['id'=>$cm->id])}}"> <span class="badge badge-info">Đang mở</span>  
                                @else
                                  <a href="{{route('list-admin.ds-comment.update', ['id'=>$cm->id])}}"> <span class="badge badge-danger">Đã ẩn</span> </a> 
                                @endif
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