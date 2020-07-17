<input type="hidden" name="" value="{{Cart::count()}}" id="count">
<div class="cart-item">
			<div class="media">
				@foreach($item as $carts)
					@if(empty($carts->option->promotion_price))
					<a class="pull-left" href="#"><img src="user/image/product/{{$carts->options['img']}}" alt=""></a>
						<div class="media-body">
							<span class="cart-item-title">{{$carts->name}}</span>
							<span class="cart-item-amount">{{$carts->qty}}*<span>{{$carts->price}}đ</span></span>
							<span class="cart-item-options"><a href="" class="deleteCart" id="{{$carts->rowId}}">Xóa</a></span>
						</div>
					<br>
					@else
					<a class="pull-left" href="#"><img src="user/image/product/{{$carts->options['img']}}" alt=""></a>
						<div class="media-body">
							<span class="cart-item-title">{{$carts->name}}</span>
							<span class="cart-item-amount">{{$carts->qty}}*<span>{{$carts->option->promotion_price}}</span></span>
						</div>
					@endif
				@endforeach
			</div>
</div>
<div class="cart-caption">
			<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{Cart::subtotal()}}đ</span></div>
			<div class="clearfix"></div>

			<div class="center">
				<div class="space10">&nbsp;</div>
				<a href="checkout.html" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
			</div>
</div>

		