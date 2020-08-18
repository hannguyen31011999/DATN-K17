@extends('admin.mater-admin')
@section('header')
<title>Admin | Loại sản phẩm</title>
<style>
    .heard-typeproduct {
        font-size: 20px;
        margin: 0 0 15px 0;
        text-transform: uppercase;
        font-weight: 600;
        text-align: center;
    }
</style>
@endsection
@section('main-conten')
<div class="row">
    <div class="col-md-12">
        @if(isset($typeproduct))
        <form action="{{ route('list-admin.ds-typeproduct.edit-update', ['id'=> $typeproduct->id]) }}" method="POST" enctype="multipart/form-data">
            @else
            <form action="{{  route('list-admin.ds-typeproduct.edit-add') }}" method="POST" enctype="multipart/form-data">
                @endif
                @csrf
                <div class="card-box">
                    <div class="row">
                        <div class="conten-add-post">
                            <div class="col-xl-10 col-lg-12">
                                <h1 class="heard-typeproduct"><b> @if(isset($typeproduct)) Cập nhật @else Thêm @endif loại sản phẩm</b></h1>
                                <div class="control-group">
                                    <div class="controls">
                                        <label class="control-label">Loại Sản phẩm</label>
                                        <input id="title" type="text" class="input-large form-control"  placeholder="Nhập loại sản phẩm ..." name="type_name" @if(isset($typeproduct)) value="{{$typeproduct->type_name}}" @endif>
                                        @if($errors->has('type_name'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{$errors->first('type_name')}}</strong>
                                        </div>
                                        @endif
                                        <br>
                                        <label class="control-label mt-1">Mô tả</label>
                                        <textarea name="description" id="ckeditor" cols="30" rows="10">@if(isset($typeproduct)) {{$typeproduct->description}} @endif</textarea>
                                        @if($errors->has('description'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{$errors->first('description')}}</strong>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <!-- end row -->
                                <hr>
                                <div class="row mt-2">
                                    <div class="col-12">
                                        <div>
                                            <button type="submit" class="btn btn-primary waves-effect width-md waves-light">@if(isset($typeproduct))Cập nhật @else Thêm @endif</button>
                                            <a href="{{route('list-admin.ds-typeproduct.list') }}" class="btn btn-danger waves-effect width-md waves-light">Hủy</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                 </div>
                </div>
    </div>
    </form>
</div>
<!-- end col -->
</div>
@endsection
@section('script')
<script src="{{asset('ckeditor/ckeditor.js') }}"></script>
<script src="{{asset('ckfinder/ckfinder.js') }}"></script>


<!-- <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script> -->
<script>
    var options = {
        filebrowserImageBrowseUrl: '../../ckfinder/ckfinder.html?type=Images',
        filebrowserFlashBrowseUrl: '../../ckfinder/ckfinder.html?type=Flash',
        filebrowserImageUploadUrl: '../../ckfinder/core/connector/connector.php?command=QuickUpload&type=Images',
        //filebrowserBrowseUrl: '../../..laravel-filemanager?type=Files',
        filebrowserFlashUploadUrl: '../../public/ckfinder/core/connector/connector.php?command=QuickUpload&type=Images',
    };
</script>

<script type="text/javascript">
    CKEDITOR.replace('ckeditor', options);
</script>
<!-- <script>
    function showImage() {
        if (this.files && this.files[0]) {
            var object = new FileReader();
            object.onload = function(data) {
                var image = document.getElementById("image");
                image.src = data.target.result;
            }
            object.readAsDataURL(this.files[0]);
        }
    }
    $('#image').on('click', function() {
        $('#overlay')
            .css({
                backgroundImage: `url(${this.src})`
            })
            .addClass('open')
            .one('click', function() {
                $(this).removeClass('open');
            });
    })
</script> -->
@endsection