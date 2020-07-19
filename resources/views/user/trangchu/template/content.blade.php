<div id="content" class="space-top-none">
	<input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>New Products</h4>
							<div class="beta-products-details">
								<p class="pull-left">438 styles found</p>
								<div class="clearfix"></div>
							</div>
							@foreach($newProduct as $newProducts)
								@if(empty($newProducts->promotion_price))
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href=""><img src="user/image/product/{{$newProducts->image}}" alt="" style="height: 320px; width: 100%;"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$newProducts->product_name}}</p>
											<p class="single-item-price">
												<span>{{$newProducts->unit_price}}đ</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="" id="{{$newProducts->id}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
									<br>
								</div>
								@else
								<div class="col-sm-3">
									<div class="single-item">
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>

										<div class="single-item-header">
											<a href=""><img src="user/image/product/{{$newProducts->image}}" alt="" style="height: 320px; width: 100%;"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$newProducts->product_name}}</p>
											<p class="single-item-price">
												<span class="flash-del">{{$newProducts->unit_price}}đ</span>
												<span class="flash-sale">{{$newProducts->promotion_price}}đ</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="" id="{{$newProducts->id}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
									<br>
								</div>
								@endif
							</form>
							@endforeach
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Top Products</h4>
							<div class="beta-products-details">
								<p class="pull-left">438 styles found</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
							@foreach($product as $products)
								@if(empty($products->promotion_price))
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href=""><img src="user/image/product/{{$products->image}}" alt="" style="height: 320px; width: 100%;"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$products->product_name}}</p>
											<p class="single-item-price">
												<span>{{$products->unit_price}}đ</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="" id="{{$products->id}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
									<br>
								</div>
								@else
								<div class="col-sm-3">
									<div class="single-item">
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										<div class="single-item-header">
											<a href=""><img src="user/image/product/{{$products->image}}" alt="" style="height: 320px; width: 100%;"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$products->product_name}}</p>
											<p class="single-item-price">
												<span class="flash-del">{{$products->unit_price}}đ</span>
												<span class="flash-sale">{{$products->promotion_price}}đ</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" id="{{$products->id}}" href="" ><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
									<br>
								</div>
								@endif
							@endforeach
							</div>
							<div class="row">
								<div class="col-sm-4">
								</div>
								<div class="col-sm-4">
									<span style="">{{ $product->links() }}</span>
								</div>
								<div class="col-sm-4">
								</div>
							</div>
							<div class="space40">&nbsp;</div>
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->
			</div> <!-- .main-content -->
</div> <!-- #content -->
	