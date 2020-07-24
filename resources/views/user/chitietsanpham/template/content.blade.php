<div id="content">
    <div class="row">
        <div class="col-sm-9">
            @if(isset($product))
                @if(!empty($product->promotion_price))
                    <div class="row">
                        <div class="col-sm-4">
                            <img src="user/image/product/{{$product->image}}" alt="">
                        </div>
                        <div class="col-sm-8">
                            <div class="single-item-body">
                                <p class="single-item-title">{{$product->product_name}}</p>
                                <p class="single-item-price">
                                    <span class="flash-del">{{thousandSeperator($product->unit_price)}}đ</span>
                                    <span class="flash-sale">{{thousandSeperator($product->promotion_price)}}đ</span>
                                </p>
                                <a class="add-to-cart" href="" id="{{$product->id}}"><i class="fa fa-shopping-cart"></i></a>
                            </div>
                            <div class="clearfix"></div>
                            <div class="space20">&nbsp;</div>
                            <div class="single-item-desc">
                                <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo ms id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe.</p>
                            </div>
                            <div class="space20">&nbsp;</div>
                            <div class="single-item-options">
                                
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-sm-4">
                            <img src="user/image/product/{{$product->image}}" alt="">
                        </div>
                        <div class="col-sm-8">
                            <div class="single-item-body">
                                <p class="single-item-title">{{$product->product_name}}</p>
                                <p class="single-item-price">
                                    <span class="flash-sale">{{thousandSeperator($product->unit_price)}}đ</span>
                                </p>
                                <a class="add-to-cart" href="" id="{{$product->id}}"><i class="fa fa-shopping-cart"></i></a>
                            </div>
                            <div class="clearfix"></div>
                            <div class="space20">&nbsp;</div>
                            <div class="single-item-desc">
                                <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo ms id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe.</p>
                            </div>
                            <div class="space20">&nbsp;</div>
                            <div class="single-item-options">
                                
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="space40">&nbsp;</div>
                <div class="woocommerce-tabs">
                    <ul class="tabs">
                        <li><a href="#tab-description">Description</a></li>
                        <li><a href="#tab-comment">Reviews ({{$count}})</a></li>
                    </ul>
                    <div class="panel" id="tab-description">
                        <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.</p>
                        <p>Consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequaturuis autem vel eum iure reprehenderit qui in ea voluptate velit es quam nihil molestiae consequr, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? </p>
                    </div>
                    <div class="panel" id="tab-comment" style="height: 250px;overflow: auto;">
                        <form method="post" id="form-comment" data-url="{{url('/'.slipString($product->product_name).'.'.$product->id)}}">
                            @csrf
                            <div class="form-block">
                                <label for="notes">Ghi bình luận</label>
                                <textarea name="comment" id="comment" class="form-control"></textarea>
                            </div>

                            <div class="form-block">
                                <input type="submit" name="" class="beta-btn primary" style="width:150px;" value="Gửi bình luận">
                            </div>
                        </form>
                        <div class="comment">
                        @foreach($comment as $comments)
                            @foreach($user as $users)
                                @if($comments->user_id==$users->id)
                                    <span style="font-size: 20px; font-weight: bold;">{{$users->name}}</span>
                                @endif
                            @endforeach
                            <p style="font-size: 15px;">Bình luận: {{$comments->content}}</p>
                            <span>{{$comments->created_at->format('d-m-Y')}}</span>
                            <div id="reply">
                                    <a href="">Trả lời</a>
                                @if(Auth::check())
                                    &nbsp;
                                    <a href="" class="deleteComment" id="{{$comments->id}}" data-url="{{url('/'.slipString($product->product_name).'.'.$product->id)}}">Xóa</a>
                                @endif
                            </div>
                            <hr width="100%">
                        @endforeach
                        </div>       
                    </div>
                </div>
                <div class="space50">&nbsp;</div>
            @endif
            <div class="beta-products-list">
                <h4>Related Products</h4>
                <div class="space20">&nbsp;</div>
                <div class="row">
                    @foreach($productRelated as $productRelateds)
                            @if(empty($productRelateds->promotion_price))
                            <div class="col-sm-4">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="{{url('/'.slipString($productRelateds->product_name).'.'.$productRelateds->id)}}"><img src="user/image/product/{{$productRelateds->image}}" alt="" style="height: 320px; width: 100%;"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$productRelateds->product_name}}</p>
                                        <p class="single-item-price">
                                            <span>{{thousandSeperator($productRelateds->unit_price)}}đ</span>
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="" id="{{$productRelateds->id}}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{url('/'.slipString($productRelateds->product_name).'.'.$productRelateds->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
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
                                        <a href="{{url('/'.slipString($productRelateds->product_name).'.'.$productRelateds->id)}}"><img src="user/image/product/{{$productRelateds->image}}" alt="" style="height: 320px; width: 100%;"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$productRelateds->product_name}}</p>
                                        <p class="single-item-price">
                                            <span class="flash-del">{{thousandSeperator($productRelateds->unit_price)}}đ</span>
                                            <span class="flash-sale">{{thousandSeperator($productRelateds->promotion_price)}}đ</span>
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" id="{{$productRelateds->id}}" href="" ><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{url('/'.slipString($productRelateds->product_name).'.'.$productRelateds->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <br>
                            </div>
                            @endif
                    @endforeach
                </div>
            </div> <!-- .beta-products-list -->
        </div>
        <div class="col-sm-3 aside">
            <div class="widget">
                <h3 class="widget-title">Best Sellers</h3>
                <div class="widget-body">
                @foreach($data as $value)
                    @foreach($seller as $sellers)
                        @if($value->id==$sellers["product_id"])
                            <div class="beta-sales beta-lists">
                                <div class="media beta-sales-item">
                                    <a class="pull-left" href="{{url('/'.slipString($value->product_name).'.'.$value->id)}}"><img src="user/image/product/{{$value['image']}}" alt=""></a>
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
            <div class="widget">
                <h3 class="widget-title">New Products</h3>
                <div class="widget-body">
                    <div class="beta-sales beta-lists">
                        @foreach($newProduct as $newProducts)
                            @if(empty($newProducts->promotion_price))
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="{{url('/'.slipString($newProducts->product_name).'.'.$newProducts->id)}}"><img src="user/image/product/{{$newProducts->image}}" style="height: 60px; width: 80px;" alt=""></a>
                                <div class="media-body">
                                    <span style="font-size:15px;">{{$newProducts->product_name}}
                                    </span>
                                    <br>
                                    <span class="flash-sale">{{thousandSeperator($newProducts->unit_price)}}đ</span>
                                </div>
                            </div>
                            @else
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="{{url('/'.slipString($newProducts->product_name).'.'.$newProducts->id)}}"><img src="user/image/product/{{$newProducts->image}}" style="height: 60px; width: 80px;" alt=""></a>
                                <div class="media-body">
                                    <span style="font-size:15px;">{{$newProducts->product_name}}
                                    </span>
                                    <br>
                                    <span class="flash-del">{{thousandSeperator($newProducts->unit_price)}}đ</span>
                                    <span class="flash-sale">{{thousandSeperator($newProducts->promotion_price)}}đ</span>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div> <!-- best sellers widget -->
        </div>
    </div>
</div>