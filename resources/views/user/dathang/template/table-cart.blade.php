@if(Session::has('cart'))
<input type="hidden" name="" id="total_sub" value="{{thousandSeperator(Session::get('cart')->totalPrice)}}">
@foreach(Session::get('cart')->products as $key => $carts)	
	        <tr class="cart_item">
	          <td class="product-name">
	            <div class="media">
	              <img class="pull-left" src="{{asset('admin/image/product/'.$carts['image'])}}" style="height: 5rem;width: 5rem;" alt="">
	              <div class="media-body">
	                <p class="font-large table-title" style="font-size: 20px;font-family: sans-serif;padding: 10px 0;">{{$carts['name']}}</p>
	              </div>
	            </div>
	          </td>
	          	@if(empty($carts['promotion_price']))
			        <td class="product-price">
			            <span class="amount">{{thousandSeperator($carts['unit_price'])}}đ</span>
			        </td>
			    @else
			    	<td class="product-price">
			            <span class="amount">{{thousandSeperator($carts['promotion_price'])}}đ</span>
			        </td>
			    @endif
	          <td class="product-quantity">
		            <div class="input-group" style="width: 110px; margin: auto;">
		                <span class="input-group-btn">
			                <button type="button" class="btn btn-default number-pre" id="" data-type="minus" data-field="{{$key}}">
			                  	<span class="glyphicon glyphicon-minus"></span>
			                </button>
		                </span>
		                <input type="text" name="qty" class="form-control number-input" id="{{$key}}" value="{{$carts['qty']}}" min="1" max="10" style="height: 34px;text-align: center;">
		                <span class="input-group-btn">
		              		<button type="button" class="btn btn-default number-next" id="" data-type="plus" data-field="{{$key}}">
		                 		<span class="glyphicon glyphicon-plus"></span>
		                	</button>
		                </span>
		            </div>
	          </td>
	          @if(empty($carts['promotion_price']))
		          <td class="product-subtotal">
				        <span class="amount">{{thousandSeperator($carts['unit_price']*$carts['qty'])}}đ</span>
		          </td>
	          @else
		          <td class="product-subtotal">
				        <span class="amount">{{thousandSeperator($carts['promotion_price']*$carts['qty'])}}đ</span>
			       </td>
	          @endif
	          <td class="product-remove">
	            <a href="" class="remove" id="{{$key}}" title="Remove this item"><i class="fa fa-trash-o"></i></a>
	          </td>
	        </tr>
@endforeach
@endif
@if(Session::get('cart')->totalQuantity==0)
<tr class="cart_item">
	<td></td>
	<td></td>
	<td>
		<div style="text-align: center;">Giỏ hàng trống</div>
		<div style="text-align: center;"><a href="{{route('home')}}">Quay lại mua hàng tiếp</a></div>
	</td>
	<td></td>
	<td></td>
</tr>
@endif