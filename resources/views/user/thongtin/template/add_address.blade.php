<div class="modal fade" id="modal-add">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="" data-url="{{url('account/address/create')}}" id="form-add" method="post" role="form">
				<input type="hidden" id="_token" value="{{ csrf_token() }}">
				<div class="modal-header">
					<h4 class="modal-title">Thêm 1 Địa Chỉ Mới</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<br>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="">Địa chỉ</label>
						<input name="address" type="text" class="form-control" id="add_address" placeholder="Nhập vào địa chỉ">
						<div class="messenger-errors" id="msg1">
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