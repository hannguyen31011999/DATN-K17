@extends('admin.mater-admin')
@section('header')
<title>Admin | Loại sản phẩm</title>
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
</style>
@endsection
@section('main-conten')
<br>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
                <h4 class="m-t-0 header-title mb-4"><b>Danh sách loại sản phẩm</b></h4>
                <div class="headerds">
                    <a href="{{route('list-admin.ds-typeproduct.add')}}" class="btn btn-primary waves-effect waves-light "><i class=" ion ion-ios-add-circle-outline font-20"></i></a>
                </div>
                <table id="datatable" class="table table-bordered table-stried" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead class="table-info">
                        <tr>
                            <th>Thời gian</th>
                            <th>Loại SP</th>
                            <th>Mô tả</th>
                            <!-- <th>Hình</th> -->
                            <th>Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $listtypeproduct as $tpr )
                        <tr>
                            <td>{{ $tpr->created_at->format('d/m/20y - H:i') }}</td>
                            <td>{{ $tpr->type_name }}</td>
                            <td>{{ $tpr->description }}</td>
                            <!-- <td>
                                <div class="thumbnail">
                                    <img src="{{asset('img/typeproduct/'.$tpr->image)}} alt=" />
                                </div>
                            </td> -->
                            <td>
                                <a href="{{route('list-admin.ds-typeproduct.update', ['id'=>$tpr->id])}}" class="text-primary font-20"><i class="fa fa-wrench"></i> </a>
                                <hr>
                                <a href="{{route('list-admin.ds-typeproduct.delete', ['id'=>$tpr->id])}}" class="text-danger font-20" onclick="return confirm('Bạn chất chắn xóa ?');"><i class="far fa-trash-alt"></i></a>
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