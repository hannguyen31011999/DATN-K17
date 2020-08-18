<div class="form-block">
	@if(isset($shipping))
		<input type="hidden" name="shipping" id="shipping" value="{{$shipping->price_shipping}}">
	@endif
		<label for="adress">Địa chỉ*</label>
		<select class="select" name="province" id="select-province">
			<option>
				Chọn tỉnh(thành phố)
			</option>
			@foreach($provence as $tinh)
			<option value="{{$tinh->id}}">
				{{$tinh->name}}
			</option>
			@endforeach
		</select>
		@if($errors->has('province'))
            <div class="messenger-errors" style="margin-left: 200px;" >
                {{ $errors->first('province') }}
            </div>
        @endif
		<select class="select" name="district" id="select-district" style="margin-left: 200px;margin-top: 5px;">
			<option>
				Chọn quận(huyện)
			</option>
			@if(isset($district))
			@foreach($district as $quan)
			<option value="{{$quan->id}}">
				{{$quan->name}}
			</option>
			@endforeach
			@endif
		</select>
		@if($errors->has('district'))
            <div class="messenger-errors" style="margin-left: 200px;" >
                {{ $errors->first('district') }}
            </div>
        @endif
		<select class="select" name="village" id="select-village" style="margin-left: 200px;margin-top: 5px;">
			<option>
				Chọn phường(xã)
			</option>
			@if(isset($village))
			@foreach($village as $phuong)
			<option value="{{$phuong->id}}">
				{{$phuong->name}}
			</option>
			@endforeach
			@endif
		</select>
		@if($errors->has('village'))
            <div class="messenger-errors" style="margin-left: 200px;" >
                {{ $errors->first('village') }}
            </div>
        @endif
		<input type="text" name="address" style="margin-left: 200px;margin-top: 5px;" placeholder="Địa chỉ cụ thể">
		@if($errors->has('address'))
            <div class="messenger-errors" style="margin-left: 200px;" >
                {{ $errors->first('address') }}
            </div>
        @endif
</div>