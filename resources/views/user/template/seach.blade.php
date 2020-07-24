<div class="item-seach">
@if(isset($list))
	@foreach($list as $lists)
		<a href="{{url('/'.slipString($lists->product_name).'.'.$lists->id)}}" style="font-family: Arial;padding: 10px 10px;font-size: 15px;">{{$lists->product_name}}</a>
		<div class="space10"></div>
	@endforeach
@endif
</div>


