@extends('user.master')

@section('css')
<link rel="stylesheet" title="style" href="{{asset('user/assets/dest/css/thongtin.css')}}">
<style type="text/css">
table {
  margin-top: 5px;
  border-collapse: collapse;
  border-spacing: 0;
  width: auto;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
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
          <div class="table-responsive" style="margin-top: 16px;">   
          <table class="table" style="width: 100%;">
            <thead>
              <tr>
                <th class="product-name">Sản Phẩm</th>
                <th class="product-price">Giá</th>
                <th class="product-quantity">Số Lượng</th>
                <th class="product-subtotal">Thành Tiền</th>
              </tr>
            </thead>
            <tbody>
            @foreach($order as $orders)
              @foreach($product as $products)
                  @if($orders->product_id==$products->id)
              <tr class="cart_item">
                <td class="product-name">
                  <div class="media">
                    <img class="pull-left" src="{{asset('../admin/image/product/'.$products->image)}}" style="height: 5rem;width: 5rem;" alt="">
                    <div class="media-body">
                      <p class="font-large table-title" style="font-size: 15px;font-family: sans-serif;padding: 10px 0;">{{$products->product_name}}</p>
                    </div>
                  </div>
                </td>
                <td class="product-price">
                      <span class="amount">{{$orders->product_price}}đ</span>
                </td>
                <th  style="text-align: center;">
                  {{$orders->qty}}
                </th>
                <td class="product-subtotal">
                  <span class="amount">{{thousandSeperator($orders->product_price*$orders->qty)}}đ</span>
                </td>
              </tr>
                  @endif
                @endforeach
              @endforeach
              <tr class="cart_item">
                <td colspan="4">
                @if($total[0]->total!=null)
                  <span style="font-size: 15px;">Phí ship:{{$priceShip}}đ</span>
                  <br>
                  <span style="font-size: 15px;">Tổng tiền: {{$total[0]->total+$priceShip}}đ</span>
                @else
                  <span style="font-size: 15px;">Đơn hàng trống</span>
                @endif
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
  </div>
</div>
@endsection
@section('js')
<script src="{{asset('js/jquery.min.js')}}"></script>
@endsection