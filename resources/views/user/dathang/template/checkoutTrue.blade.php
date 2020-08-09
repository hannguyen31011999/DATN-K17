<div class="col-sm-6">
	<div class="your-order">
		<div class="your-order-head">
			<div class="pull-left auto-width-left">
				<ul style="list-style: none;">
					<li style="padding: 0px 10px;"><h5 style="color: #ee4d2d;"><i class="fa fa-map-marker" style="font-size: 20px;"></i> Địa Chỉ Giao Hàng</h5></li>
				</ul>
			</div>
		</div>
		<div class="your-order-body" style="padding: 0px 10px;">
			<div class="your-order-item">
			@if(isset($user))
				@if($user->role==1)
				<!--  one item	 -->
					<span style="font-weight: bold;font-size: 17px; margin-left: 2.5rem; ">{{$user->name}}&nbsp;&nbsp;&nbsp;({{$user->phone}})</span>
					<span style="font-size: 17px; margin-left: 1rem;">{{$user->address}}</span>
					<br>
					<span style="margin-left: 2.5rem; color: #929292;font-size: 15px;">
						Mặc định
					</span>
					<span style="margin-left: 3.75rem;font-size: 15px;"><a href="" style="color: #05a;">Thay đổi</a></span>
				<!-- end one item -->
				<div class="clearfix"></div>
				<br></br>
				<div class="form-block" style="margin-left: 2.5rem;">
					<label for="notes">Ghi chú</label>
					<textarea id="notes" name="notes"></textarea>
				</div>
				@endif
			@endif
			</div>
		</div>
	</div>
</div>
@if(Session::has('cart'))
<div class="col-sm-6">
	<div class="your-order">
		<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
		<div class="your-order-body" style="padding: 0px 10px;height: 250px;overflow: auto;">
			<div class="your-order-item">
				<!--  one item	 -->
				@foreach(Session::get('cart')->products as $carts)
					<div class="media">
						<img width="15%" src="{{asset('admin/image/product/'.$carts['image'])}}" alt="" class="pull-left">
						<div class="media-body">
							<p class="font-large">{{$carts['name']}}</p>
							@if(empty($carts['promotion_price']))
								<span class="color-gray your-order-info">Đơn giá: {{$carts['unit_price']}}đ</span>
							@else
								<span class="color-gray your-order-info">Đơn giá: {{$carts['promotion_price']}}đ</span>
							@endif
							<span class="color-gray your-order-info">Số lượng: {{$carts['qty']}}</span>
						</div>
					</div>
				@endforeach
				<!-- end one item -->
				<div class="clearfix"></div>
			</div>
			<div class="your-order-item">
				<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
				<div class="pull-right"><h5 class="color-black">{{thousandSeperator(Session::get('cart')->totalPrice)}}đ</h5></div>
				<div class="clearfix"></div>
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
					<label for="payment_method_cheque">Chuyển khoản </label>
					<div class="payment_box payment_method_cheque" style="display: none;">
					</div>						
				</li>
				
			</ul>
		</div>

		<div class="text-center"><button type="submit" class="beta-btn primary">Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
	</div> <!-- .your-order -->
</div>
@include('user.dathang.template.vnpay')
@endif