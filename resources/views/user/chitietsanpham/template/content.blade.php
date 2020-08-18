<div id="content">
    <div class="row">
        <div class="col-sm-9">
            @if(isset($product))
                @if(!empty($product->promotion_price))
                    <div class="row">
                        <div class="col-sm-4">
                            <img src="{{asset('admin/image/product/'.$product->image)}}" alt="">
                        </div>
                        <div class="col-sm-8">
                            <div class="single-item-body">
                                <p class="single-item-title">{{$product->product_name}}</p>
                                <p class="single-item-price">
                                    <span class="flash-del">{{thousandSeperator($product->unit_price)}}đ</span>
                                    <span class="flash-sale">{{thousandSeperator($product->promotion_price)}}đ</span>
                                </p>
                                <div class="single-item-options">
                                    <div class="input-group" style="width: 110px;margin: auto;">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default number-pre" id="pre-qty" style="height: 42px;" data-type="minus" data-field="">
                                                <span class="glyphicon glyphicon-minus"></span>
                                            </button>
                                        </span>
                                        <input type="text" name="qty" class="form-control number-input" id="input-qty" value="1" min="1" max="10" style="height: 42px;text-align: center;width: 50px;">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default number-next" id="next-qty" style="height: 42px;" data-type="plus" data-field="">
                                                <span class="glyphicon glyphicon-plus"></span>
                                            </button>
                                        </span>
                                    </div>
                                    <div class="clearfix"></div>
                                    <a class="add-to-cart" href="" id="{{$product->id}}" data-url="{{url('/'.utf8tourl($product->product_name).'.'.$product->id.'/add-cart')}}"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="space20">&nbsp;</div>
                            <div class="single-item-desc">
                                <p>Nguyên liệu:</p>
                                <p>Xuất sứ:</p>
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
                            <img src="{{asset('admin/image/product/'.$product->image)}}" alt="">
                        </div>
                        <div class="col-sm-8">
                            <div class="single-item-body">
                                <p class="single-item-title">{{$product->product_name}}</p>
                                <p class="single-item-price">
                                    <span class="flash-sale">{{thousandSeperator($product->unit_price)}}đ</span>
                                </p>
                                <div class="single-item-options">
                                    <div class="input-group" style="width: 110px;margin: auto;">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default number-pre" id="pre-qty" style="height: 42px;" data-type="minus" data-field="">
                                                <span class="glyphicon glyphicon-minus"></span>
                                            </button>
                                        </span>
                                        <input type="text" name="qty" class="form-control number-input" id="input-qty" value="1" min="1" max="10" style="height: 42px;text-align: center;width: 50px;">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default number-next" id="next-qty" style="height: 42px;" data-type="plus" data-field="">
                                                <span class="glyphicon glyphicon-plus"></span>
                                            </button>
                                        </span>
                                    </div>
                                    <div class="clearfix"></div>
                                    <a class="add-to-cart" href="" id="{{$product->id}}" data-url="{{url('/'.utf8tourl($product->product_name).'.'.$product->id.'/add-cart')}}"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="space20">&nbsp;</div>
                            <div class="single-item-desc">
                                <p>Nguyên liệu:</p>
                                <p>Xuất sứ:</p>
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
                        <p>{{$product->description}}</p>
                    </div>
                    <div class="panel" id="tab-comment" style="height: 250px;overflow: auto;">
                        <form method="post" id="form-comment" data-url="{{url('/'.utf8tourl($product->product_name).'.'.$product->id)}}">
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
                        @if($comments->status==0)
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
                                    <a href="" class="deleteComment" id="{{$comments->id}}" data-url="{{url('/'.utf8tourl($product->product_name).'.'.$product->id.'/delete')}}">Xóa</a>
                                @endif
                            </div>
                            <hr width="100%">
                        @endif
                        @endforeach
                        </div>       
                    </div>
                </div>
                <div class="space50">&nbsp;</div>
            @endif
            <div class="beta-products-list">
                <h4>Sản phẩm liên quan</h4>
                <hr style="height: 2px;border-width:0;color: #6b0709;background-color: #0277b8;margin-top: 1px;">
                <div class="space20">&nbsp;</div>
                <div class="row">
                    @foreach($productRelated as $productRelateds)
                            @if(empty($productRelateds->promotion_price))
                            <div class="col-sm-4">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="{{url('/'.utf8tourl($productRelateds->product_name).'.'.$productRelateds->id)}}"><img src="{{asset('admin/image/product/'.$productRelateds->image)}}" alt="" style="height: 320px; width: 100%;"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$productRelateds->product_name}}</p>
                                        <p class="single-item-price">
                                            <span>{{thousandSeperator($productRelateds->unit_price)}}đ</span>
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="" id="{{$productRelateds->id}}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{url('/'.utf8tourl($productRelateds->product_name).'.'.$productRelateds->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
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
                                        <a href="{{url('/'.utf8tourl($productRelateds->product_name).'.'.$productRelateds->id)}}"><img src="{{asset('admin/image/product/'.$productRelateds->image)}}" alt="" style="height: 320px; width: 100%;"></a>
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
                                        <a class="beta-btn primary" href="{{url('/'.utf8tourl($productRelateds->product_name).'.'.$productRelateds->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
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
                <h3 class="widget-title">Sản phẩm bán chạy</h3>
                <div class="widget-body">
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
            <div class="widget">
                <h3 class="widget-title">Sản phẩm mới</h3>
                <div class="widget-body">
                    <div class="beta-sales beta-lists">
                        @foreach($newProduct as $newProducts)
                            @if(empty($newProducts->promotion_price))
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="{{url('/'.utf8tourl($newProducts->product_name).'.'.$newProducts->id)}}"><img src="{{asset('admin/image/product/'.$newProducts->image)}}" style="height: 60px; width: 80px;" alt=""></a>
                                <div class="media-body">
                                    <span style="font-size:15px;">{{$newProducts->product_name}}
                                    </span>
                                    <br>
                                    <span class="flash-sale">{{thousandSeperator($newProducts->unit_price)}}đ</span>
                                </div>
                            </div>
                            @else
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="{{url('/'.utf8tourl($newProducts->product_name).'.'.$newProducts->id)}}"><img src="{{asset('admin/image/product/'.$newProducts->image)}}" style="height: 60px; width: 80px;" alt=""></a>
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