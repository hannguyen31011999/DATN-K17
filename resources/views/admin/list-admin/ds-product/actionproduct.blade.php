@extends('admin.mater-admin')
@section('header')
<link href="{{asset('admin\assets\libs\datatables\dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{asset('admin\assets\libs\datatables\buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{asset('admin\assets\libs\datatables\responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{asset('admin\assets\libs\datatables\select.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('main-conten')
<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <div class="row">
                <div class="col-xl-6 col-lg-8">
                    <h1 class="m-t-0 header-title mb-4"><b>@if(isset($product)) Cập nhật @else Thêm @endif sản phẩm</b></h1>
                    <div class="control-group">
                        <div class="controls">
                            <label class="control-label">Tên Sản phẩm</label>
                            <input id="title" type="text" class="input-large form-control" name="name_product">
                            <label class="control-label">Loại sản phẩm</label>
                            <select class="custom-select " id="luot_choi" name="type_product_id">
                                <option>1</option>
                                <option>2</option>       
                                <option>3</option>               
                            </select>
                            <label class="control-label mt-1">Mô tả</label>
                            <textarea name=description id="text" cols="30" rows="10"></textarea>
                        </div>
                        <div class="controls">
                            <div>
                                <label for="showEasing">Giá</label>
                                <input id="showEasing" type="text" placeholder="..." class="input-mini form-control" name="unit_price">
                            </div>
                            <div class="mt-3">
                                <label for="hideEasing">Đơn vị</label>
                                <input id="hideEasing" type="text" placeholder="Hộp" class="input-mini form-control" name="unit">
                            </div>
                            <div class="mt-3">
                                <label for="showMethod">Hình</label>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <input type="file" class="form-control" id="example-fileinput" name="image">
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <label for="hideMethod" class="m-t-10">Nguồn</label>
                                <input id="hideMethod" type="text" placeholder="TP HCM" class="input-mini form-control" name="origin">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-xl-6 col-md-8">
                    @khung hinh
                </div>
            </div>
            <!-- end row -->

            <div class="row mt-2">
                <div class="col-12">
                    <div>
                        <button type="button" class="btn btn-outline-info btn-rounded waves-effect width-md waves-light">Info</button>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- end col -->
</div>
@endsection
@section('script')
<!-- Required datatable js -->
<script src="{{asset('admin\assets\libs\datatables\jquery.dataTables.min.js') }}"></script>
<script src="{{asset('admin\assets\libs\datatables\dataTables.bootstrap4.min.js') }}"></script>
<!-- Buttons examples -->
<script src="{{asset('admin\assets\libs\datatables\dataTables.buttons.min.js') }}"></script>
<script src="{{asset('admin\assets\libs\datatables\buttons.bootstrap4.min.js') }}"></script>
<script src="{{asset('admin\assets\libs\jszip\jszip.min.js') }}"></script>
<script src="{{asset('admin\assets\libs\pdfmake\pdfmake.min.js') }}"></script>
<script src="{{asset('admin\assets\libs\pdfmake\vfs_fonts.js') }}"></script>
<script src="{{asset('admin\assets\libs\datatables\buttons.html5.min.js') }}"></script>
<script src="{{asset('admin\assets\libs\datatables\buttons.print.min.js') }}"></script>

<!-- Responsive examples -->
<script src="{{asset('admin\assets\libs\datatables\dataTables.responsive.min.js') }}"></script>
<script src="{{asset('admin\assets\libs\datatables\responsive.bootstrap4.min.js') }}"></script>

<script src="{{asset('admin\assets\libs\datatables\dataTables.keyTable.min.js') }}"></script>
<script src="{{asset('admin\assets\libs\datatables\dataTables.select.min.js') }}"></script>

<!-- Datatables init -->
<script src="{{asset('admin\assets\js\pages\datatables.init.js') }}"></script>
<script src="{{asset('ckeditor\ckeditor.js') }}"></script>
<script src="{{asset('ckeditor\ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('text', {
        filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',
    });
</script>
@include('ckfinder::setup')
<script type="text/javascript">
    $(document).ready(function() {
        $("#datatable").DataTable({
            language: {
                paginate: {
                    previous: "<i class='mdi mdi-chevron-left'>",
                    next: "<i class='mdi mdi-chevron-right'>"
                }
            },
            drawCallback: function() {
                $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
            }
        })
    });
</script>
@endsection