@extends('user.master')

@section('css')
<link rel="stylesheet" title="style" href="{{asset('user/assets/dest/css/thongtin.css')}}">
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
<style type="text/css">
  table {
  border-collapse: collapse;
}
#purchase{
  height: 300px;
  overflow: auto;
}
</style>
@endsection

@section('title')
	Thông tin khách hàng
@endsection
@section('content')
<div class="container">
    <div class="row profile">
    @include('user.thongtin.template.menu')
    <div class="col-md-9" id="purchase">
          <ul class="nav nav-tabs">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#general">Tất cả</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#regions">Chờ thanh toán</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#policy">Đang giao</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#email">Đã giao</a>
              </li>
              <li class="nav-item">
              </li>
          </ul>
          <!-- Tab panes -->
        <div class="tab-content">
      
        <div class="tab-pane container active" id="general">
          <br>
        @foreach($order as $orders)
            <div class="your-order-item">
                <!--  one item   -->
                  <div class="media">
                    <div class="media-body">
                      <span class="color-gray your-order-info" style="margin-top: 1px; font-size: 15px;"><h3>Mã hóa đơn:{{$orders->id}}</h3></span>
                      <span class="color-gray your-order-info" style="font-size: 13px;">Ngày đặt {{$orders->created_at}}</span>
                      
                      @if($orders->status==0)
                        <span class="color-gray your-order-info" style="font-size: 13px;">Trạng thái:<span style="color: red;">Chờ kiểm duyệt</span></span>
                      @elseif($orders->status==1)
                        <span class="color-gray your-order-info" style="font-size: 13px;">Trạng thái:<span style="color: red;">Đang giao</span></span>
                      @else
                        <span class="color-gray your-order-info" style="font-size: 13px;">Trạng thái:<span style="color: red;">Đã giao</span></span>
                      @endif
                      <a class="" style="font-size: 13px;" href="{{url('account/purchase',['id'=>$orders->id])}}">Chi tiết đơn hàng</a>
                      @if($orders->status==0)
                      <a class="delete-purchase" style="font-size: 13px;margin-left: 5px; color: red;" href="" onclick="confirm('Bạn chắc chắn xóa đơn hàng này?');" id="{{$orders->id}}">Xóa đơn hàng</a>
                      @endif
                    </div>
                  </div>
                <!-- end one item -->
                <div class="clearfix"></div>
            </div>
        @endforeach
        </div>
        <div class="tab-pane container fade" id="regions">
        @foreach($order as $orders)
        @if($orders->status==0)
            <br>
            <div class="your-order-item">
                <!--  one item   -->
                  <div class="media">
                    <div class="media-body">
                      <span class="color-gray your-order-info" style="margin-top: 1px; font-size: 15px;"><h3>Mã hóa đơn:{{$orders->id}}</h3></span>
                      <span class="color-gray your-order-info" style="font-size: 13px;">Ngày đặt {{$orders->created_at}}</span>
                      
                      <span class="color-gray your-order-info" style="font-size: 13px;">Trạng thái:<span style="color: red;">Chờ kiểm duyệt</span></span>
                      <a class="" style="font-size: 13px;" href="{{url('account/purchase',['id'=>$orders->id])}}">Chi tiết đơn hàng</a>
                      <a class="delete-purchase" style="font-size: 13px;margin-left: 5px; color: red;" href="" onclick="confirm('Bạn chắc chắn xóa đơn hàng này?');" id="{{$orders->id}}">Xóa đơn hàng</a>
                    </div>
                  </div>
                <!-- end one item -->
                <div class="clearfix"></div>
            </div>
        @endif
        @endforeach
        </div>
        <div class="tab-pane container fade" id="policy">
        @foreach($order as $orders)
        @if($orders->status==1)
            <br>
            <div class="your-order-item">
                <!--  one item   -->
                  <div class="media">
                    <div class="media-body">
                      <span class="color-gray your-order-info" style="margin-top: 1px; font-size: 15px;"><h3>Mã hóa đơn:{{$orders->id}}</h3></span>
                      <span class="color-gray your-order-info" style="font-size: 13px;">Ngày đặt {{$orders->created_at}}</span>
                      
                      <span class="color-gray your-order-info" style="font-size: 13px;">Trạng thái:<span style="color: red;">Đang giao</span></span>
                      <a class="" style="font-size: 13px;" href="{{url('account/purchase',['id'=>$orders->id])}}">Chi tiết đơn hàng</a>
                    </div>
                  </div>
                <!-- end one item -->
                <div class="clearfix"></div>
            </div>
        @endif
        @endforeach
        </div>
        <div class="tab-pane container fade" id="email">
        @foreach($order as $orders)
        @if($orders->status==2)
            <br>
            <div class="your-order-item">
                <!--  one item   -->
                  <div class="media">
                    <div class="media-body">
                      <span class="color-gray your-order-info" style="margin-top: 1px; font-size: 15px;"><h3>Mã hóa đơn:{{$orders->id}}</h3></span>
                      <span class="color-gray your-order-info" style="font-size: 13px;">Ngày đặt {{$orders->created_at}}</span>
                      
                      <span class="color-gray your-order-info" style="font-size: 13px;">Trạng thái:<span style="color: red;">Đã giao</span></span>
                      <a class="" style="font-size: 13px;" href="{{url('account/purchase',['id'=>$orders->id])}}">Chi tiết đơn hàng</a>
                    </div>
                  </div>
                <!-- end one item -->
                <div class="clearfix"></div>
            </div>
        @endif
        @endforeach
        </div>
        </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script type="text/javascript">
  $(document).ready(function (){
      $('.delete-purchase').click(function(e){
        var id = $(this).attr('id');
        $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/account/purchase',
            data: {
              "id":id
            },
            success: function(response) {
              alertify.success(response.messenger);
            },
            error: function (jqXHR, textStatus, errorThrown) {
              //xử lý lỗi tại đây
            }
          });
        e.preventDefault();
      });
  })
</script>
@endsection