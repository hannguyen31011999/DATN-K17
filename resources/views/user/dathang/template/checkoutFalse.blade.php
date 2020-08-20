
<div class="col-sm-6" style="background: #f8f8f8;">
	<h4>Đặt hàng</h4>
	<hr style="height: 2px;border-width:0;color: #6b0709;background-color: #0277b8;margin-top: 1px;">
	<div class="space20">&nbsp;</div>
	<div class="form-block">
		<label for="name">Họ tên*</label>
		<input type="text" id="name" name="name" placeholder="Họ tên">
		@if($errors->has('name'))
            <div class="messenger-errors" style="margin-left: 200px;" >
                {{ $errors->first('name') }}
            </div>
        @endif
	</div>
	<div class="form-block">
		<label for="email">Email*</label>
		<input type="email" id="email" name="email"  placeholder="Nhập email của bạn">
		@if($errors->has('email'))
            <div class="messenger-errors" style="margin-left: 200px;" >
                {{ $errors->first('email') }}
            </div>
        @endif
	</div>
	<div id="list-address">
		@include('user.dathang.template.address')
	</div>

	<div class="form-block">
		<label for="phone">Điện thoại*</label>
		<input type="text" id="phone" name="phone" placeholder="Nhập số điện thoại của bạn">
		@if($errors->has('phone'))
            <div class="messenger-errors" style="margin-left: 200px;" >
                {{ $errors->first('phone') }}
            </div>
        @endif
	</div>
	
	<div class="form-block">
		<label for="notes">Ghi chú</label>
		<textarea id="notes" name="notes"></textarea>
	</div>
</div>
@if(Session::has('cart'))
<div class="col-sm-6">
	<div class="your-order">
		<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
		<div class="your-order-body" style="padding: 0px 10px;max-height: 500px;overflow: auto;">
			<div class="your-order-item">
				<!--  one item	 -->
				@foreach(Session::get('cart')->products as $carts)
					<div class="media">
						<img width="15%" src="{{asset('admin/image/product/'.$carts['image'])}}" alt="" class="pull-left">
						<div class="media-body">
							<p class="font-large">{{$carts['name']}}</p>
							@if(empty($carts['promotion_price']))
								<p class="font-large">Đơn giá: {{thousandSeperator($carts['unit_price'])}}đ</p>
							@else
								<p class="font-large">Đơn giá: {{thousandSeperator($carts['promotion_price'])}}đ</p>
							@endif
							<p class="font-large">Số lượng: {{$carts['qty']}}</p>
						</div>
					</div>
				@endforeach
				<!-- end one item -->
				<div class="clearfix"></div>
			</div>
			<div class="your-order-item">
					<div class="pull-left"><p class="your-order-f18" style="margin-bottom: 0;">Phí ship:</p></div>
					<div class="pull-right"><p id="price_ship" style="font-size: 20px;">0đ</p></div>
					<div class="clearfix"></div>
			</div>
			<div class="your-order-item">
				<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
				@if(isset($shipping))
					<div class="pull-right"><p style="font-size: 20px;">{{thousandSeperator(Session::get('cart')->totalPrice+$shipping->price_shipping)}}đ</p></div>
					<div class="clearfix"></div>
				@else
					<input type="hidden" id="total" name="" value="{{Session::get('cart')->totalPrice}}">
					<div class="pull-right"><p id="total_price" style="font-size: 20px;">{{thousandSeperator(Session::get('cart')->totalPrice)}}đ</p></div>
					<div class="clearfix"></div>
				@endif
			</div>
		</div>
		<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
		
		<div class="your-order-body">
			<ul class="payment_methods methods">
				<li class="payment_method_bacs">
					<input id="payment_method_bacs" type="radio" class="input-radio" name="payment" value="0" checked="checked" data-order_button_text="">
					<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
					<div class="payment_box payment_method_bacs" style="display: block;">
						Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
					</div>						
				</li>

				<li class="payment_method_cheque">
					<input id="payment_method_cheque" type="radio" class="input-radio" name="payment" value="1" data-toggle="modal" data-target="#vnpay">
					<label for="payment_method_cheque">Thanh toán trực tuyến</label>
					<div class="payment_box payment_method_cheque" style="display: none;">
					</div>						
				</li>
				
			</ul>
		</div>

		<div class="text-center"><button type="submit" class="beta-btn primary">Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
	</div> <!-- .your-order -->
</div>
@endif