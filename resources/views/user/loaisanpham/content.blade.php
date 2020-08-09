<div id="content" class="space-top-none">
	<div class="main-content">
		<div class="row">
			<div class="space60">&nbsp;</div>
			<div class="col-sm-3">
				<ul class="aside-menu">
					<li><a href="#">Typography</a></li>
					<li><a href="#">Buttons</a></li>
					<li><a href="#">Dividers</a></li>
					<li><a href="#">Columns</a></li>
					<li><a href="#">Icon box</a></li>
					<li><a href="#">Notifications</a></li>
					<li><a href="#">Progress bars and Skill meter</a></li>
					<li><a href="#">Tabs</a></li>
					<li><a href="#">Testimonial</a></li>
					<li><a href="#">Video</a></li>
					<li><a href="#">Social icons</a></li>
					<li><a href="#">Carousel sliders</a></li>
					<li><a href="#">Custom List</a></li>
					<li><a href="#">Image frames &amp; gallery</a></li>
					<li><a href="#">Google Maps</a></li>
					<li><a href="#">Accordion and Toggles</a></li>
					<li class="is-active"><a href="#">Custom callout box</a></li>
					<li><a href="#">Page section</a></li>
					<li><a href="#">Mini callout box</a></li>
					<li><a href="#">Content box</a></li>
					<li><a href="#">Computer sliders</a></li>
					<li><a href="#">Pricing &amp; Data tables</a></li>
					<li><a href="#">Process Builders</a></li>
				</ul>
			</div>
			<div class="col-sm-9">
				<div class="beta-products-list">
					<h4>Sản phẩm mới</h4>
					<div class="beta-products-details">
						<div class="clearfix"></div>
					</div>
					<div class="row">
						@foreach($newProduct as $newProducts)
							@if(empty($newProducts->promotion_price))
							<div class="col-sm-4">
								<div class="single-item">
									<div class="single-item-header">
										<a href="{{url('/'.utf8tourl($newProducts->product_name).'.'.$newProducts->id)}}"><img src="{{asset('admin/image/product/'.$newProducts->image)}}" alt="" style="height: 320px; width: 100%;"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$newProducts->product_name}}</p>
										<p class="single-item-price">
											<span>{{thousandSeperator($newProducts->unit_price)}}đ</span>
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="" id="{{$newProducts->id}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{url('/'.utf8tourl($newProducts->product_name).'.'.$newProducts->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
								<br>
							</div>
							@else
							<div class="col-sm-4">
								<div class="single-item">
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									<div class="single-item-header">
										<a href="{{url('/'.utf8tourl($newProducts->product_name).'.'.$newProducts->id)}}"><img src="{{asset('admin/image/product/'.$newProducts->image)}}" alt="" style="height: 320px; width: 100%;"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$newProducts->product_name}}</p>
										<p class="single-item-price">
											<span class="flash-del">{{thousandSeperator($newProducts->unit_price)}}đ</span>
											<span class="flash-sale">{{thousandSeperator($newProducts->promotion_price)}}đ</span>
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="" id="{{$newProducts->id}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{url('/'.utf8tourl($newProducts->product_name).'.'.$newProducts->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
								<br>
							</div>
							@endif
						@endforeach
					</div>
				</div> <!-- .beta-products-list -->
				<div class="space50">&nbsp;</div>
				<div class="beta-products-list">
						<h4>Sản phẩm</h4>
						<div class="beta-products-details">
							<p class="pull-left">Tổng sản phẩm {{$count_type}}</p>
							<div class="clearfix"></div>
						</div>
						<div class="row">
						@foreach($product as $products)
							@if(empty($products->promotion_price))
							<div class="col-sm-4">
								<div class="single-item">
									<div class="single-item-header">
										<a href="{{url('/'.utf8tourl($products->product_name).'.'.$products->id)}}"><img src="{{asset('admin/image/product/'.$products->image)}}" alt="" style="height: 320px; width: 100%;"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$products->product_name}}</p>
										<p class="single-item-price">
											<span>{{thousandSeperator($products->unit_price)}}đ</span>
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="" id="{{$products->id}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{url('/'.utf8tourl($products->product_name).'.'.$products->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
								<br>
							</div>
							@else
							<div class="col-sm-4">
								<div class="single-item">
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									<div class="single-item-header">
										<a href="{{url('/'.utf8tourl($products->product_name).'.'.$products->id)}}"><img src="{{asset('admin/image/product/'.$products->image)}}" alt="" style="height: 320px; width: 100%;"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$products->product_name}}</p>
										<p class="single-item-price">
											<span class="flash-del">{{thousandSeperator($products->unit_price)}}đ</span>
											<span class="flash-sale">{{thousandSeperator($products->promotion_price)}}đ</span>
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" id="{{$products->id}}" href="" ><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{url('/'.utf8tourl($products->product_name).'.'.$products->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
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
								{{ $product->links() }}
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





