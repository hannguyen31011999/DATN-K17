<div class="modal fade" id="modal-edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="" data-url="{{url('account/address/edit')}}" id="form-edit" method="post" role="form">
				<input type="hidden" id="_token" value="{{ csrf_token() }}">
				<div class="modal-header">
					<h4 class="modal-title">Chỉnh Sửa Địa Chỉ</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<br>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="">Số điện thoại</label>
						<input name="phone" type="text" class="form-control" id="edit_phone" value="{{$user->phone}}">
						<div class="messenger-errors" id="msg3">
                        </div>
					</div>
					<div class="form-group">
						<label for="">Địa chỉ</label>
						<input name="address" type="text" class="form-control edit_address" id="" value="{{$user->address}}">
						<div class="messenger-errors" id="msg2">
                        </div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn-closes" data-dismiss="modal">TRỞ LẠI</button>
					<button type="submit" class="btn btn-danger">HOÀN THÀNH</button>
				</div>
			</form>
		</div>
	</div>
</div>
