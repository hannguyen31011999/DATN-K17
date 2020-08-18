@extends('user.master')

@section('css')
<style>
</style>
@endsection

@section('title')
	Giỏ hàng
@endsection
@section('content')
	<div id="content">
	  <div class="table-responsive">
	    <!-- Shop Products Table -->
	    <table class="shop_table beta-shopping-cart-table" cellspacing="0" >
	      <thead>
	        <tr>
	          <th class="product-name">Sản Phẩm</th>
	          <th class="product-price">Giá</th>
	          <th class="product-quantity">Số Lượng</th>
	          <th class="product-subtotal">Thành Tiền</th>
	          <th class="product-remove">Thao Tác</th>
	        </tr>
	      </thead>
	      <tbody id="table-cart">
	      		@include('user.dathang.template.table-cart')
	      </tbody>
	      <tfoot>
	        <tr>
	          <td colspan="8" class="actions">
	          </td>
	        </tr>
	      </tfoot>
	    </table>
	    <!-- End of Shop Table Products -->
	  </div>
	  <!-- Cart Collaterals -->
	  <div class="cart-collaterals">
	    <div class="cart-totals pull-right">
	      <div class="cart-totals-row"><h5 class="cart-total-title" style="font-weight: bold;">Tổng Tiền</h5></div>
	      @if(Auth::check())
	      	@if($discount[0]>=200)
	      		<div class="cart-totals-row"><span>Phí ship:</span> <span style="color: black;">Miễn phí</span></div>
	      	@else
	      		<div class="cart-totals-row"><span>Phí ship:</span> <span style="color: black;">50.000đ</span></div>
	      	@endif
	      @endif
	      <div class="cart-totals-row"><span>Tổng đơn hàng:</span><span id="total" style="color: black;"></span></div>
	      <div class="cart-totals-row"><a href="{{url('checkout')}}" class="beta-btn primary" style="margin-left: 20px;">Đặt hàng<i class="fa fa-chevron-right"></i></a>
	    	</div>
		</div>

	    <div class="clearfix"></div>
	  </div>
	  <!-- End of Cart Collaterals -->
	  <div class="clearfix"></div>
	</div> <!-- #content -->
@endsection

@section('js')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script>
	if($('#total_sub').val()!="")
	{
		$('#total').text($('#total_sub').val()+"đ");
	}
	else
	{
		$('#total').text('0đ');
	}
	$(document).ready(function(){
		// Update số lượng
		$(document).on('click', '.number-next',function(event){
			event.preventDefault();
			var rowId = $(this).attr('data-field');
			var number = $('#'+rowId).val();
			var qty = 1 + Number(number);
			getData(qty,rowId);
		});

		$(document).on('change','.number-input',function(event){
			event.preventDefault();
			var rowId = $(this).attr('id');
			var qty = Number($('#'+rowId).val());
			getData(qty,rowId);
		});

		$(document).on('click', '.number-pre',function(event){
			event.preventDefault();
			var rowId = $(this).attr('data-field');
			var number = $('#'+rowId).val();
			var qty = number - 1;
			if(qty>0)
			{
				getData(qty,rowId);
			}
			else{
				var bool = confirm("Bạn có chắc chắn muốn bỏ sản phẩm này");
				if(bool){
					getData(qty,rowId);
				}
			}
		});

		$(document).on('click', '.remove',function(event){
			event.preventDefault();
			var rowId = $(this).attr('id');
			var bool = confirm('Bạn có muốn xóa sản phẩm này');
			if(bool){
				$.ajax({
	        	headers: {
	              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	            },
	            url: '/shopping-cart/delete',
	            type: "post",
	            data: {
	            	"rowId":rowId
	            },
		        }).done(function(response){
		        	console.log(response);
		            $("#table-cart").empty().html(response);
		            $('#total').text($('#total_sub').val()+"đ");
		        }).fail(function(jqXHR, ajaxOptions, thrownError){
		              alert('No response from server');
		        });
		    }
		});
	});

	function getData(qty,rowId){
        $.ajax({
        	headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/shopping-cart',
            type: "post",
            data: {
            	"rowId":rowId,
            	'qty':qty
            },
        }).done(function(response){
        	console.log(response);
        	if(response=="fail")
        	{
        		alert("Sản phẩm hiện không đủ hàng");
        		location.reload();
        	}
        	else
        	{
        		$("#table-cart").empty().html(response);
	            if(qty>0)
	            {
	            	$('#'+rowId).val(qty);
	            }
	            $('#total').text($('#total_sub').val()+"đ");
        	}
        }).fail(function(jqXHR, ajaxOptions, thrownError){
              alert('No response from server');
        });
    }
</script>
@endsection