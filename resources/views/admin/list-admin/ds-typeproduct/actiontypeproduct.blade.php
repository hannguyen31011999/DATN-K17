@extends('admin.mater-admin')
@section('header')
<title>Admin | Loại sản phẩm</title>
<style>
.heard-typeproduct {
        font-size: 20px;
        margin: 0 0 15px 0;
        text-transform: uppercase;
        font-weight: 600;
        margin-left: 37%;
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
                    <div class="row" style="margin-left: 180px;">
                        <div class="col-xl-10 col-lg-12">
                            <h1 class="heard-typeproduct"><b> @if(isset($typeproduct)) Cập nhật @else Thêm @endif loại sản phẩm</b></h1>
                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label">Tên Loại Sản phẩm</label>
                                    <input id="title" type="text" class="input-large form-control" name="type_name" @if(isset($typeproduct)) value="{{$typeproduct->type_name}}" @endif>
                                    @if($errors->has('type_name'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{$errors->first('type_name')}}</strong>
                                    </div>
                                    @endif
                                    <label class="control-label mt-1">Mô tả</label>
                                    <textarea name="description" id="ckeditor" cols="30" rows="10">@if(isset($typeproduct)) {{$typeproduct->description}} @endif</textarea>
                                    @if($errors->has('description'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{$errors->first('description')}}</strong>
                                    </div>
                                    @endif
                                </div>
                                <div id="overlay"></div>
                                <div class="controls">
                                    <div class="mt-3">
                                        <label for="showMethod">Hình</label>
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <input type="file" name="image" id="myFile" onchange="showImage.call(this)">
                                                @if(isset($typeproduct)) <img id="image" class="imgpage" height="300px" width="300px" src="{{asset('img/typeproduct/'.$typeproduct->image)}}" />
                                                @else <img id="image" class="imgpage" height="300px" width="300px" src="{{asset('img/logo/pngtree.jpg')}}" /> @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @if($errors->has('image'))
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{$errors->first('image')}}</strong>
                                </div>
                                @endif
                            </div>
                            <!-- end row -->
                            <hr>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div>
                                        <button type="submit" class="btn btn-primary waves-effect width-md waves-light">@if(isset($typeproduct))Cập nhật @else Thêm @endif</button>
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
<script type="text/javascript">
    CKEDITOR.replace('ckeditor', options);
</script>
<script>
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
</script>
@include('ckfinder::setup')
@endsection