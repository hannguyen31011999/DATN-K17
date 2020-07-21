<div class="container">
	<div id="content">
		<form action="{{url('checkout')}}" method="post" class="beta-form-checkout">
			@csrf
			<div class="row">
				@if(Auth::check())
					@include('user.dathang.template.checkoutTrue')
				@else
					@include('user.dathang.template.checkoutFalse')
				@endif
			</div>
		</form>
	</div> <!-- #content -->
</div> <!-- .container -->