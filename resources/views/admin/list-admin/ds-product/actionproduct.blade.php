@extends('admin.mater-admin')
@section('header')
@endsection
@section('main-conten')

<div class="row">
    <div class="col-md-12">
        @if(isset($product))
        <form action="{{ route('list-admin.ds-product.edit-update', ['id'=> $product->id]) }}" method="POST" enctype="multipart/form-data">
            @else
            <form action="{{  route('list-admin.ds-product.edit-add') }}" method="POST" enctype="multipart/form-data">
                @endif
                @csrf
                <div class="card-box">
                    <div class="row">
                        <div class="col-xl-6 col-lg-8">
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
                                            <option value="{{$tpr->id}}" @if(isset($product)) @if($product->type_product_id == $tpr->id )  selected="selected" disabled="disabled" @endif   
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
                                <div class="controls">
                                    <div class="mt-3">
                                        <label for="showMethod">Hình</label>
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <input type="file" class="form-control" id="example-fileinput" name="image">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-xl-6 col-md-8">
                            @if(isset($product)) <img  class="imgpage" height="400px" width="400px" src="{{asset('img/product/'.$product->image)}}" /></td> @endif
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mt-2">
                        <div class="col-12">
                            <div>
                                <button type="submit" class="btn btn-outline-info btn-rounded waves-effect width-md waves-light">@if(isset($product))Cập nhật @else Thêm @endif</button>
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
@include('ckfinder::setup')
@endsection