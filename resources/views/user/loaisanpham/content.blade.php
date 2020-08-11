<div id="content" class="space-top-none">
	<div class="main-content">
		<div class="row">
			<div class="space60">&nbsp;</div>
			<div class="col-sm-3">
			<div class="widget">
                <div class="widget-body product-seller">
                <div class="beta-sales beta-lists">
					<h4 class="widget-title">Sản phẩm bán chạy</h4>
				</div>
                @foreach($data as $value)
                    @foreach($seller as $sellers)
                        @if($value->id==$sellers["product_id"])
                            <div class="beta-sales beta-lists">
                                <div class="media beta-sales-item">
                                    <a class="pull-left" href="{{url('/'.utf8tourl($value->product_name).'.'.$value->id)}}"><img src="{{asset('admin/image/product/'.$value['image'])}}" alt=""></a>
                                    <div class="media-body">
                                        {{$value['product_name']}}
                                        <br>
                                        <span class="beta-sales-price">{{thousandSeperator($sellers["product_price"])}}đ</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endforeach
                </div>
            </div> <!-- best sellers widget -->
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





