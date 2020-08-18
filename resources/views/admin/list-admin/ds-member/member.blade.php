@extends('admin.mater-admin')
@section('header')
<title>Admin | Thành viên</title>
@endsection
@section('main-conten')
@if(Session::has('success'))
    <section class="alert alert-success">{{Session::get('success')}}</section>
@endif
<hr>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
                <h4 class="m-t-0 mb-4"><b>DANH SÁCH THÀNH VIÊN</b></h4>
                
                <table id="datatable" class="table table-bordered table-stried" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead class="table-info">
                        <tr>
                            <th>Người dùng</th>
                            <th>Điểm</th>
                            <!-- <th>Status</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $listMember as $mb )
                        <tr>
                            @foreach( $listUser as $us )
                            @if($mb->user_id == $us->id)
                            <td>{{ $us->email }}</td>
                            @endif
                            @endforeach
                            <td>{{ $mb->point }}</td>
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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

@endsection