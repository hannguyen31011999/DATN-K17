@extends('user.master')

@section('css')
<link rel="stylesheet" title="style" href="{{asset('user/assets/dest/css/thongtin.css')}}">
<style type="text/css">
  table {
  border-collapse: collapse;
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
    <div class="col-md-9">
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
                <a class="nav-link" data-toggle="tab" href="#setting">Đã hủy</a>
              </li>
              <li class="nav-item">
              </li>
          </ul>
          <!-- Tab panes -->
        <div class="tab-content">
        <div class="tab-pane container active" id="general">
        @foreach($order as $orders)
          @foreach($orderDetail as $orderDetails)
              @foreach($orderDetails as $value)
                  @foreach($product as $products)
                    @if($value->product_id==$products->id&&$value->bill_id==$orders->id)
                      <br>
                        <div class="your-order-item">
                          <div>
                          <!--  one item   -->
                            <div class="media">
                              <img style="height: 90px;width: 90px;" src="{{asset('../admin/image/product/'.$products->image)}}" alt="" class="pull-left">
                              <div class="media-body">
                                <p class="font-large">{{$products->product_name}}</p>
                                <span class="color-gray your-order-info" style="margin-top: 1px;">Giá:{{$value->product_price}}đ</span>
                                <span class="color-gray your-order-info">x {{$value->qty}}</span>
                              
                                @if($orders->status==0)
                                  <span class="color-gray your-order-info">Trạng thái:<span style="color: red;">Chờ kiểm duyệt</span></span>
                                @elseif($orders->status==1)
                                  <span class="color-gray your-order-info">Trạng thái:<span style="color: red;">Đang giao</span></span>
                                @else
                                  <span class="color-gray your-order-info">Trạng thái:<span style="color: red;">Đã giao</span></span>
                                @endif
                                <span class="color-black" style="left: 50%;">Tổng tiền:<span style="color: red; font-size: 15px;">{{thousandSeperator($value->product_price*$value->qty)}}đ</span></span>
                              </div>
                            </div>
                          <!-- end one item -->
                          </div>
                          <div class="clearfix"></div>
                        </div>
                    @endif
                  @endforeach
              @endforeach
          @endforeach
        @endforeach
          </div>
              <div class="tab-pane container fade" id="regions">
                  @foreach($order as $orders)
                    @foreach($orderDetail as $orderDetails)
                        @foreach($orderDetails as $value)
                            @foreach($product as $products)
                              @if($value->product_id==$products->id&&$orders->status==0)
                                <br>
                                  <div class="your-order-item">
                                    <div>
                                    <!--  one item   -->
                                      <div class="media">
                                        <img style="height: 90px;width: 90px;" src="{{asset('../admin/image/product/'.$products->image)}}" alt="" class="pull-left">
                                        <div class="media-body">
                                          <p class="font-large">{{$products->product_name}}</p>
                                          <span class="color-gray your-order-info" style="margin-top: 1px;">Giá:{{$value->product_price}}đ</span>
                                          <span class="color-gray your-order-info">x {{$value->qty}}</span>
                                          <span class="color-black" style="left: 50%;">Tổng tiền:<span style="color: red; font-size: 15px;">{{thousandSeperator($value->product_price*$value->qty)}}đ</span></span>
                                        </div>
                                      </div>
                                    <!-- end one item -->
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>
                              @endif
                            @endforeach
                        @endforeach
                    @endforeach
              @endforeach
              </div>
              <div class="tab-pane container fade" id="policy">
                @foreach($order as $orders)
                @if($orders->status==1)
                    @foreach($orderDetail as $orderDetails)
                        @foreach($orderDetails as $value)
                            @foreach($product as $products)
                              @if($value->product_id==$products->id&&$orders->id==$value->bill_id)
                                <br>
                                  <div class="your-order-item">
                                    <div>
                                    <!--  one item   -->
                                      <div class="media">
                                        <img style="height: 90px;width: 90px;" src="{{asset('../admin/image/product/'.$products->image)}}" alt="" class="pull-left">
                                        <div class="media-body">
                                          <p class="font-large">{{$products->product_name}}</p>
                                          <span class="color-gray your-order-info" style="margin-top: 1px;">Giá:{{$value->product_price}}đ</span>
                                          <span class="color-gray your-order-info">x {{$value->qty}}</span>
                                          <span class="color-black" style="left: 50%;">Tổng tiền:<span style="color: red; font-size: 15px;">{{thousandSeperator($value->product_price*$value->qty)}}đ</span></span>
                                        </div>
                                      </div>
                                    <!-- end one item -->
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>
                              @endif
                            @endforeach
                        @endforeach
                    @endforeach
                    @endif
                  @endforeach
              </div>
              <div class="tab-pane container fade" id="email">
                  @foreach($order as $orders)
                    @if($orders->status==2)
                    @foreach($orderDetail as $orderDetails)
                        @foreach($orderDetails as $value)
                            @foreach($product as $products)
                              @if($value->product_id==$products->id&&$orders->id==$value->bill_id)
                                <br>
                                  <div class="your-order-item">
                                    <div>
                                    <!--  one item   -->
                                      <div class="media">
                                        <img style="height: 90px;width: 90px;" src="{{asset('../admin/image/product/'.$products->image)}}" alt="" class="pull-left">
                                        <div class="media-body">
                                          <p class="font-large">{{$products->product_name}}</p>
                                          <span class="color-gray your-order-info" style="margin-top: 1px;">Giá:{{$value->product_price}}đ</span>
                                          <span class="color-gray your-order-info">x {{$value->qty}}</span>
                                          <span class="color-black" style="left: 50%;">Tổng tiền:<span style="color: red; font-size: 15px;">{{thousandSeperator($value->product_price*$value->qty)}}đ</span></span>
                                        </div>
                                      </div>
                                    <!-- end one item -->
                                    </div>
                                    <div class="clearfix"></div>
                                  </div>
                              @endif
                            @endforeach
                        @endforeach
                    @endforeach
                    @endif
                  @endforeach
              </div>
              <div class="tab-pane container fade" id="setting">
                
              </div>
          </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{asset('js/jquery.min.js')}}"></script>
@endsection