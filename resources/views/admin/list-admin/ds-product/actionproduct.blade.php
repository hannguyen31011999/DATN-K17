@extends('admin.mater-admin')
@section('header')
<title>Admin | Product</title>
<style>
    #overlay {
    position: fixed;
    top: 0;
    width: 37%;
    height: 75%;
    background: rgba(0, 0, 0, 0) none 100% / contain no-repeat;
    cursor: pointer;
    transition: 0.3s;
    visibility: hidden;
    opacity: 0;
}
#overlay.open {
    visibility: visible;
    opacity: 1;
}

#overlay:after {
    /* X button icon */
    content: "\2715";
    position: absolute;
    color: #fff;
    top: 10px;
    right: 20px;
    font-size: 2em;
}
</style>
@endsection
@section('main-conten')
<hr>
<div class="row">
    <div class="col-md-12">
        @if(isset($product))
        <form action="{{ route('list-admin.ds-product.edit-update', ['id'=> $product->id]) }}" method="POST" enctype="multipart/form-data">
            @else
            <form action="{{  route('list-admin.ds-product.edit-add') }}" method="POST" enctype="multipart/form-data">
                @endif
                @csrf
                <div class="card-box">
                    <div class="row" style="margin-left: 350px;">
                        <div class="col-xl-8 col-lg-8">
                            <h1 class="m-t-0 header-title mb-4"><b> @if(isset($product)) Cập nhật @else Thêm @endif loại sản phẩm</b></h1>
                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label">Tên Sản phẩm</label>
                                    <input id="title" type="text" class="input-large form-control" name="product_name" @if(isset($product)) value="{{$product->product_name}}" @endif>
                                    @if($errors->has('product_name'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{$errors->first('product_name')}}</strong>
                                    </div>
                                    @endif
                                    <div class="form-group mb-3">
                                        <label class="control-label">Loại</label>
                                        <select class="custom-select " id="loai" name="type_product_id">
                                            @foreach( $listtypeproduct as $tpr )
                                            <option value="{{$tpr->id}}" @if(isset($product)) @if($product->type_product_id == $tpr->id ) selected="selected" disabled="disabled" @endif
                                                {{ $tpr->type_name}}
                                                @endif>
                                                {{ $tpr->type_name}}
                                            </option>

                                            @endforeach
                                        </select>
                                    </div>
                                    <label class="control-label mt-1">Mô tả</label>
                                    <textarea name="description" id="ckeditor" cols="30" rows="10">@if(isset($product)) {{$product->description}} @endif</textarea>
                                    @if($errors->has('description'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{$errors->first('description')}}</strong>
                                    </div>
                                    @endif
                                    <label class="control-label">Giá</label>
                                    <input id="unit_price" type="text" class="input-large form-control" name="unit_price" @if(isset($product)) value="{{$product->unit_price}}" @endif>
                                    @if($errors->has('unit_price'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{$errors->first('unit_price')}}</strong>
                                    </div>
                                    @endif
                                    <label class="control-label">Giá khuyến mãi</label>
                                    <input id="promotion_price" type="text" class="input-large form-control" name="promotion_price" @if(isset($product)) value="{{$product->promotion_price}}" @endif>
                                    @if($errors->has('promotion_price'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{$errors->first('promotion_price')}}</strong>
                                    </div>
                                    @endif
                                    @if(isset($errorss))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{$errorss}}</strong>
                                    </div>
                                    @endif
                                    <label class="control-label">Đơn vị</label>
                                    <input id="unit" type="text" class="input-large form-control" name="unit" @if(isset($product)) value="{{$product->unit}}" @endif>
                                    @if($errors->has('unit'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{$errors->first('unit')}}</strong>
                                    </div>
                                    @endif
                                    <label class="control-label">Nguyên liệu thô</label>
                                    <input id="origin" type="text" class="input-large form-control" name="origin" @if(isset($product)) value="{{$product->origin}}" @endif>
                                    @if($errors->has('origin'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{$errors->first('origin')}}</strong>
                                    </div>
                                    @endif
                                    <label class="control-label">Nguồn</label>
                                    <input id="raw_material" type="text" class="input-large form-control" name="raw_material" @if(isset($product)) value="{{$product->raw_material}}" @endif>
                                    @if($errors->has('raw_material'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{$errors->first('raw_material')}}</strong>
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
                                                @if(isset($product)) <img id="image" class="imgpage" height="300px" width="300px" src="{{asset('img/product/'.$product->image)}}" />
                                                @else <img id="image" class="imgpage" height="300px" width="300px" src="{{asset('img/logo/pngtree.jpg')}}" /> @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <hr>
                    <div class="row mt-2">
                        <div class="col-12">
                            <div>
                                <button type="submit" class="btn btn-success waves-effect width-md waves-light">@if(isset($product))Cập nhật @else Thêm @endif</button>
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
<script src="{{asset('ckeditor\ckeditor.js') }}"></script>
<script src="{{asset('ckfinder\ckfinder.js') }}"></script>
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