@extends('admin.mater-admin')
@section('header')
<title>Admin | Bài viết</title>
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
    .content-post{
        max-height: 250px;
        overflow: auto;
    }
</style>
@endsection
@section('main-conten')
<br>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
                <h4 class="m-t-0 header-title mb-4"><b>Danh sách bài viết</b></h4>
                <div class="headerds">
                    <a href="{{route('list-admin.ds-news.add')}}" class="btn btn-primary waves-effect waves-light"><i class=" ion ion-ios-add-circle-outline font-20"></i></a>
                </div>
                <table id="datatable" class="table table-bordered mb-1 " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead class="table-info">
                        <tr>
                            <th>Tiêu đề</th>
                            <th>Nội dung</th>
                            <th>Hình ảnh</th>
                            <th>Người viết</th>
                            <th>Thời gian</th>
                            <th>Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $listNews as $ns )
                        <tr>
                            <td>{{ $ns->title }}</td>
                            
                                <td style=""><div class="content-post">{!! $ns->content !!}</div></td>
                            
                            <td>
                                <div class="thumbnail">
                                    <img src="{{asset('admin/image/posts/'.$ns->image)}}" alt="" />
                                </div>
                            </td>
                            @foreach($listUser as $us)
                            @if($ns->user_id_create == $us->id)
                            <td>{{$us->email}}</td>
                            @endif
                            @endforeach
                            <td>{{$ns->updated_at->format('d/m/yy - H:i')}}</td>
                            <td>
                                <a href="{{route('list-admin.ds-news.update', ['id'=>$ns->id])}}" class="text-primary font-20"><i class="fas fa-pencil-alt"></i> </a>
                                <hr>
                                <a href="{{route('list-admin.ds-news.delete', ['id'=>$ns->id])}}" class="text-danger font-20" onclick="return confirm('Bạn chất chắn xóa ?');"><i class="far fa-trash-alt"></i></a>
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