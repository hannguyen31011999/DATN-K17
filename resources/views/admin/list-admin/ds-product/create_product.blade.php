<form action="{{ route('list-admin.ds-product.edit-add') }}" method="POST" role="form" enctype="multipart/form-data">
	@csrf
	<input type="file" name="myFile">
	<input type="submit" name="" value="gui">
</form>