@extends('admin.mater-admin')
@section('header')
<title>Admin | Sản phẩm</title>
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
        content: "2715";
        position: absolute;
        color: #fff;
        top: 10px;
        right: 20px;
        font-size: 2em;
    }
    .heard-product {
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
        <form action="{{ route('list-admin.ds-product.edit-add') }}" method="POST" role="form" enctype="multipart/form-data">
            @csrf
            <div class="card-box">
                    <div class="row">
                        <div class="conten-add-post">
                            <div class="col-xl-10 col-lg-12">
                                <h1 class="heard-product"><b>Cập nhật sản phẩm</b></h1>
                                <div class="control-group">
                                    <div class="controls">
                                        <label class="control-label">Tên Sản phẩm</label>
                                        <input id="title" type="text" class="input-large form-control"  placeholder="Nhập tên sản phẩm ..." name="product_name" value="{{old('product_name')}}" >
                                        @if($errors->has('product_name'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{$errors->first('product_name')}}</strong>
                                        </div>
                                        @endif
                                        <br>
                                        <div class="form-group mb-3">
                                            <label class="control-label">Loại</label>
                                            <select class="custom-select " id="loai" name="type_product_id">
                                                @foreach( $listtypeproduct as $tpr)
                                                    @if($tpr->id == old('type_product_id'))
                                                        <option value="{{$tpr->id}}" selected="selected">
                                                            {{$tpr->type_name}}
                                                        </option>
                                                    @else
                                                        <option value="{{$tpr->id}}">
                                                            {{$tpr->type_name}}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <br>
                                        <label class="control-label mt-1">Mô tả</label>
                                        <textarea name="description" id="ckeditor" cols="30" rows="10">
                                            {{old('description')}}
                                        </textarea>
                                        @if($errors->has('description'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{$errors->first('description')}}</strong>
                                        </div>
                                        @endif
                                        <br>
                                        <label class="control-label">Giá</label>
                                        <input id="unit_price" type="number" class="input-large form-control"  placeholder="Nhập giá sản phẩm ..." name="unit_price" value="{{old('unit_price')}}">
                                        @if($errors->has('unit_price'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{$errors->first('unit_price')}}</strong>
                                        </div>
                                        @endif
                                        <br>
                                        <label class="control-label">Giá khuyến mãi</label>
                                        <input id="promotion_price" type="number" class="input-large form-control" placeholder="Nhập giá khuyến mãi ..." name="promotion_price" value="{{old('promotion_price')}}">
                                        @if($errors->has('promotion_price'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{$errors->first('promotion_price')}}</strong>
                                        </div>
                                        @endif
                                        @if(Session::has('errorss'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{Session::get('errorss')}}</strong>
                                        </div>
                                        @endif
                                        <br>
                                        <label class="control-label">Số lượng</label>
                                        <input id="promotion_price" type="number" class="input-large form-control" placeholder="Nhập số lượng sản phẩm ..." name="qty" >
                                        @if($errors->has('qty'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{$errors->first('qty')}}</strong>
                                        </div>
                                        @endif
                                        @if(isset($errorss))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{$errorss}}</strong>
                                        </div>
                                        @endif
                                        <br>
                                        <label class="control-label">Đơn vị</label>
                                        <input id="unit" type="text" class="input-large form-control"  placeholder="Nhập đơn vị ..." name="unit" value="{{old('unit')}}">
                                        @if($errors->has('unit'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{$errors->first('unit')}}</strong>
                                        </div>
                                        @endif
                                        <br>
                                        <label class="control-label">Nguồn</label>
                                        <input id="origin" type="text" class="input-large form-control"  placeholder="Nhập nguồn sản phẩm ..."  name="origin" value="{{old('origin')}}">
                                        @if($errors->has('origin'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{$errors->first('origin')}}</strong>
                                        </div>
                                        @endif
                                        <br>
                                        <label class="control-label">Nguyên liệu thô</label>
                                        <input id="raw_material" type="text" class="input-large form-control" placeholder="Nhập nguyên liệu ..." name="raw_material" value="{{old('raw_material')}}">
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
                                                    <input type="file" name="myFile" id="myFile" onchange="showImage.call(this)">
                                                    <img id="image" class="imgpage" height="300px" width="300px" src="{{asset('admin/image/background/pngtree.jpg')}}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('myFile'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{$errors->first('myFile')}}</strong>
                                        </div>
                                    @endif
                                </div>
                                <!-- end row -->
                                <hr>
                                <div class="row mt-2">
                                    <div class="col-12">
                                        <div>
                                            <button type="submit" class="btn btn-primary waves-effect width-md waves-light">Thêm sản phẩm</button>
                                            <a href="{{route('list-admin.ds-product.list') }}" class="btn btn-danger waves-effect width-md waves-light">Hủy</a>
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
@include('ckfinder::setup')
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
    CKEDITOR.replace( 'ckeditor', options);
    CKFider.start();
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
@endsection