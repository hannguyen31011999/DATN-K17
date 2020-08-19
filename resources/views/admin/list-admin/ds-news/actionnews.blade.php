@extends('admin.mater-admin')
@section('header')
<title>Admin | Bài viết</title>
<style>
    .heard-news {
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
        @if(isset($news))
        <form action="{{ route('list-admin.ds-news.edit-update', ['id'=> $news->id]) }}" method="POST" enctype="multipart/form-data">
            @else
            <form action="{{  route('list-admin.ds-news.edit-add') }}" method="POST" enctype="multipart/form-data">
                @endif
                @csrf
                <div class="card-box">
                    <div class="row">
                    <div class="conten-add-post">
                        <div class="col-xl-10 col-lg-12">
                            <h1 class="heard-news"><b> @if(isset($news)) Cập nhật @else Thêm @endif bài viết</b></h1>
                            <div class="control-group">
                                <div class="controls">
                                    <label class="control-label">Tiêu đề</label>
                                    <input id="title" type="text" class="input-large form-control"  placeholder="Nhập tiêu đề . . ." name="title" @if(isset($news)) value="{{$news->title}}" @endif value="{{old('title')}}">
                                    @if($errors->has('title'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{$errors->first('title')}}</strong>
                                    </div>
                                    @endif
                                    <br>
                                    <label class="control-label mt-1">Nội dung</label>
                                    <textarea name="content" id="ckeditor" cols="30" rows="10">@if(isset($news)) {{$news->content}} @endif{{old('content')}}</textarea>
                                    @if($errors->has('content'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{$errors->first('content')}}</strong>
                                    </div>
                                    @endif
                                    <div id="overlay"></div>
                                    <br>
                                </div>
                                <div class="controls">
                                    <div class="mt-3">
                                        <label for="showMethod">Hình</label>
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <input type="file" name="image" id="myFile" onchange="showImage.call(this)">
                                                @if(isset($news)) <img id="image" class="imgpage" height="300px" width="300px" src="{{asset('admin/image/posts/'.$news->image)}}" />
                                                @else <img id="image" class="imgpage" height="300px" width="300px" src="{{asset('admin/image/background/pngtree.jpg')}}" /> @endif
                                            </div>
                                        </div>
                                        @if($errors->has('image'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{$errors->first('image')}}</strong>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                   
                            <hr>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div>
                                        <button type="submit" class="btn btn-primary waves-effect width-md waves-light">@if(isset($news))Cập nhật @else Thêm @endif</button>
                                        <a href="{{route('list-admin.ds-news.list') }}" class="btn btn-danger waves-effect width-md waves-light">Hủy</a>
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
<script src="{{asset('ckeditor\ckeditor.js') }}"></script>
<!-- <script src="{{asset('ckfinder\ckfinder.js') }}"></script> -->
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
    CKEDITOR.replace( 'ckeditor',options);
</script>
@include('ckfinder::setup')
<script type="text/javascript">
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