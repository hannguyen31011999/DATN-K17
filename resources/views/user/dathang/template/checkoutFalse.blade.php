<div class="col-sm-6">
						<h4>Đặt hàng</h4>
						<div class="space20">&nbsp;</div>

						<div class="form-block">
							<label for="name">Họ tên*</label>
							<input type="text" id="name" name="name" placeholder="Họ tên">
							@if($errors->has('name'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
						</div>
						<div class="form-block">
							<label>Giới tính </label>
							<input id="gender" type="radio" class="input-radio" name="gender" value="0" checked="checked" style="width: 10%"><span style="margin-right: 5%">Nam</span>
							<input id="gender" type="radio" class="input-radio" name="gender" value="1" style="width: 10%"><span>Nữ</span>
										
						</div>

						<div class="form-block">
							<label for="email">Email*</label>
							<input type="email" id="email" name="email"  placeholder="Nhập email của bạn">
							@if($errors->has('email'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
						</div>

						<div class="form-block">
							<label for="adress">Địa chỉ*</label>
							<input type="text" id="address" name="address" placeholder="Nhập địa chỉ của bạn" >
							@if($errors->has('address'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('address') }}
                                </div>
                            @endif
						</div>
						

						<div class="form-block">
							<label for="phone">Điện thoại*</label>
							<input type="text" id="phone" name="phone" placeholder="Nhập số điện thoại của bạn">
							@if($errors->has('phone'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('phone') }}
                                </div>
                            @endif
						</div>
						
						<div class="form-block">
							<label for="notes">Ghi chú</label>
							<textarea id="notes" name="notes"></textarea>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
							<div class="your-order-body" style="padding: 0px 10px">
								<div class="your-order-item">
									<div>
									<!--  one item	 -->
									@foreach($cart as $carts)
										<div class="media">
											<img width="15%" src="user/image/product/{{$carts->options['img']}}" alt="" class="pull-left">
											<div class="media-body">
												<p class="font-large">{{$carts->name}}</p>
												<span class="color-gray your-order-info">Đơn giá: {{$carts->price}}đ</span>
												<span class="color-gray your-order-info">Số lượng: {{$carts->qty}}</span>
											</div>
										</div>
									@endforeach
									<!-- end one item -->
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="your-order-item">
									<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
									<div class="pull-right"><h5 class="color-black">{{Cart::subtotal(0,'.','.')}}đ</h5></div>
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
										<input id="payment_method_cheque" type="radio" class="input-radio" name="payment" value="1" data-order_button_text="">
										<label for="payment_method_cheque">Chuyển khoản </label>
										<div class="payment_box payment_method_cheque" style="display: none;">
											Chuyển tiền đến tài khoản sau:
											<br>- Số tài khoản: 123 456 789
											<br>- Chủ TK: Nguyễn A
											<br>- Ngân hàng ACB, Chi nhánh TPHCM
										</div>						
									</li>
									
								</ul>
							</div>
							<div class="text-center"><button type="submit" class="beta-btn primary">Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
						</div> <!-- .your-order -->
					</div>