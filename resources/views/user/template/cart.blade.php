@if(Session::has('cart'))
<input type="hidden" name="" value="{{Session::get('cart')->totalQuantity}}" id="count">
<div class="cart-item">
	<div class="media">
		@foreach(Session::get('cart')->products as $key => $carts)
			@if(empty($carts['promotion_price']))
			<a class="pull-left" href="#"><img src="{{asset('admin/image/product/'.$carts['image'])}}" alt=""></a>
				<div class="media-body">
					<span class="cart-item-title">{{$carts['name']}}</span>
					<span class="cart-item-amount">{{$carts['qty']}}*<span>{{thousandSeperator($carts['unit_price'])}}đ</span></span>
					<span class="cart-item-options"><a href="" class="deleteCart" id="{{$key}}"><i class="fa fa-trash-o"></i></a></span>
					<hr width="100%">
				</div>
			<br>
			@else
			<a class="pull-left" href="#"><img src="{{asset('admin/image/product/'.$carts['image'])}}" alt=""></a>
				<div class="media-body">
					<span class="cart-item-title">{{$carts['name']}}</span>
					<span class="cart-item-amount">{{$carts['qty']}}*<span>{{thousandSeperator($carts['promotion_price'])}}đ</span></span>
					<span class="cart-item-options"><a href="" class="deleteCart" id="{{$key}}"><i class="fa fa-trash-o"></i></a></span>
					<hr width="100%">
				</div>
			@endif
		@endforeach
	</div>
</div>
<div class="cart-caption">
	<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{thousandSeperator(Session::get('cart')->totalPrice)}}đ</span></div>
	<div class="clearfix"></div>

	<div class="center">
		<div class="space10">&nbsp;</div>
		<a href="{{url('shopping-cart')}}" class="beta-btn primary text-center">Xem giỏ hàng <i class="fa fa-chevron-right"></i></a>
	</div>
</div>
@else
	<input type="hidden" name="" value="" id="count">
<div class="cart-item">
	<div class="media">
	</div>
</div>
<div class="cart-caption">
	<div class="cart-total text-right">Tổng tiền:0đ<span class="cart-total-value"></span></div>
	<div class="clearfix"></div>

	<div class="center">
		<div class="space10">&nbsp;</div>
		<a href="{{url('shopping-cart')}}" class="beta-btn primary text-center">Xem giỏ hàng <i class="fa fa-chevron-right"></i></a>
	</div>
</div>
@endif

		