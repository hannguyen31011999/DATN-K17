@extends('admin.mater-admin')
@section('header')
<title>Admin | Trang chủ</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="Responsive bootstrap 4 admin template" name="description">
<meta content="Coderthemes" name="author">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<style>
    .text-truncate {
        margin-left: -100px;
    }

    .scrollbar {
        margin-left: 22px;
        float: unset;
        height: 300px;
        background: #ffffff;
        overflow-y: scroll;
        margin-bottom: 25px;
    }

    .force-overflow {
        min-height: 450px;
    }

    #my-style::-webkit-scrollbar {
        width: 1px;
        background-color: #edf0f0;
    }

    #my-style::-webkit-scrollbar-thumb {
        background-color: #0ae;
        background-image: -webkit-gradient(linear, 0 0, 0 100%,
                color-stop(.5, rgba(255, 255, 255, .2)),
                color-stop(.5, transparent), to(transparent));
    }

    #my-style::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        border-radius: 50px;
        background-color: blue;
    }

    #my-style::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        background-color: #F5F5F5;
    }

    .ctext-wrap {
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        background: #c7edee;
        border-radius: 3px;
        display: inline-block;
        padding: 12px;
        position: relative;
    }
</style>
@endsection
@section('main-conten')
<br>
<div class="row">
    <div class="col-xl-3 col-sm-6">
        <div class="card bg-pink">
            <div class="card-body widget-style-2">
                <div class="text-white media">
                    <div class="media-body align-self-center">
                        <h2 class="my-0 text-white"><span data-plugin="counterup">{{$sluser}}</span></h2>
                        <p class="mb-0">Người dùng</p>
                    </div>
                    <i class="ion-md-person"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card bg-info">
            <div class="card-body widget-style-2">
                <div class="text-white media">
                    <div class="media-body align-self-center">
                        <h2 class="my-0 text-white"><span data-plugin="counterup">{{$sloder}}</span></h2>
                        <p class="mb-0">Đơn Hàng</p>
                    </div>
                    <i class="ion-ios-pricetag"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card bg-purple">
            <div class="card-body widget-style-2">
                <div class="text-white media">
                    <div class="media-body align-self-center">
                        <h2 class="my-0 text-white"><span data-plugin="counterup">{{$slNews}}</span></h2>
                        <p class="mb-0">Bài viết</p>
                    </div>
                    <i class="ion-md-paper-plane"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card bg-primary">
            <div class="card-body widget-style-2">
                <div class="text-white media">
                    <div class="media-body align-self-center">
                        <h2 class="my-0 text-white"><span data-plugin="counterup">{{$slComment}}</span></h2>
                        <p class="mb-0">Bình luận</p>
                    </div>
                    <i class="mdi mdi-comment-multiple"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="card-box" style="background: white">
            <div class="row">
                <div class="col-6">
                    <div class="avatar-md bg-info rounded-circle">
                        <i class="ion-logo-usd avatar-title font-26 text-white">+</i>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <h3 class="my-0 font-weight-bold" style="margin-left: -75px">
                            @foreach( $oddetail as $dxs)
                            {{thousandSeperator($dxs->tong)}}<i>VNĐ</i>
                            @endforeach</h3>
                        <p class="mb-0 mt-1 text-truncate">Danh thu hiện tại tháng này</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end card-box-->
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card-box" style="background: white">
            <div class="row">
                <div class="col-6">
                    <div class="avatar-md bg-warning rounded-circle">
                        <i class="ion-md-cart avatar-title font-26 text-white">+</i>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <h3 class="my-0 font-weight-bold"><span data-plugin="counterup">{{$odernew}}</span></h3>
                        <p class="mb-0 mt-1 text-truncate">Đơn hàng mới</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end card-box-->
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card-box" style="background: white">
            <div class="row">
                <div class="col-6">
                    <div class="avatar-md bg-success rounded-circle">
                        <i class="ion-md-contacts avatar-title font-26 text-white">+</i>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <h3 class="my-0 font-weight-bold"><span data-plugin="counterup">{{$usernew}}</span></h3>
                        <p class="mb-0 mt-1 text-truncate">Người dùng mới</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end card-box-->
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card-box" style="background: white">
            <div class="row">
                <div class="col-6">
                    <div class="avatar-md bg-primary rounded-circle">
                        <i class=" far fa-star avatar-title font-26 text-white"></i>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <h3 class="my-0 font-weight-bold"><span data-plugin="counterup">{{$slmember}}</span></h3>
                        <p class="mb-0 mt-1 text-truncate">Thành viên</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end card-box-->
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header py-3 bg-transparent">
                <div class="card-widgets">
                    <a data-toggle="collapse" href="#cardCollpase3" role="button" aria-expanded="false" aria-controls="cardCollpase3"><i class="mdi mdi-minus"></i></a>
                </div>
                <h5 class="header-title mb-0">Đơn hàng chưa xác nhận</h5>
            </div>
            <div id="cardCollpase3" class="collapse show">
                <div class="card-body">
                    <div class="chat-conversation">
                        <div class="scrollbar" id="my-style">
                            @foreach($odercxd as $dx)
                            <li class="list-group-item border-0 pt-2">
                                <a href="{{route('list-admin.ds-order.list')}}">
                                    <img style="width: 60px;margin-top: -10px;" src="{{asset('admin/image/background/doi-tra-hang.png')}}" />
                                    <a style="font-size: 30px" class=" title mb-4">{{thousandSeperator($dx->tong)}}<i>VNĐ</i> <br> </a>
                                    <?php $a = ($dx->created_at);
                                    $myDate = new DateTime($a); ?>
                                    <a class="header-title mb-4">MÃ: {{$dx->id}} -NG: {{$myDate->format('d/m/yy - H:i')}}</a>
                                </a>
                            </li>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end card-->
    </div>
    <div class="col-xl-4">
        <div class="card">
            <div class="card-header py-3 bg-transparent">
                <div class="card-widgets">
                    <a data-toggle="collapse" href="#cardCollpase3" role="button" aria-expanded="false" aria-controls="cardCollpase3"><i class="mdi mdi-minus"></i></a>
                </div>
                <h5 class="header-title mb-0">Bình luận gần đây</h5>
            </div>
            <div id="cardCollpase3" class="collapse show">
                <div class="card-body">
                    <div class="chat-todoapp">
                        <div class="scrollbar" id="my-style">
                            <div class="force-overflow">
                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 314px;margin-left:-20px">
                                    <ul class="conversation-list slimscroll" style="min-height: 330px; overflow: hidden; width: 350pxs; height: 314px;">
                                        @foreach($commet as $cm)
                                        <li class="clearfix">
                                            <div>
                                                <div class="chat-avatar">
                                                    <img style="width: 60%" src="{{asset('admin/image/background/1200.png')}}" alt="male">
                                                    <!-- <i> {{$cm->created_at->format('d/m/yy - H:i')}}</i> -->
                                                </div>
                                                <div class="ctext-wrap" style="width: 280px">
                                                    @foreach($user as $u)
                                                    @if($cm->user_id == $u->id)
                                                    <h5> <u>{{$u->email}}</u></h5>
                                                    @endif
                                                    @endforeach
                                                    @foreach($product as $up)
                                                    @if($cm->product_id == $up->id)
                                                    <h5>Sản phẩm: {{$up->product_name}}</5>
                                                        @endif
                                                        @endforeach
                                                        <h6>Nội dung : {{$cm->content}}</h6>
                                                        <h5> {{$cm->updated_at->format('d/m/yy - H:i')}}</h5>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end Chat -->
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header py-3 bg-transparent">
                <div class="card-widgets">
                    <a data-toggle="collapse" href="#cardCollpase3" role="button" aria-expanded="false" aria-controls="cardCollpase3"><i class="mdi mdi-minus"></i></a>
                </div>
                <h5 class="header-title mb-0">Người dùng gần đây</h5>
            </div>
            <div id="cardCollpase3" class="collapse show">
                <div class="card-body">
                    <div class="scrollbar" id="my-style">
                        <div>
                            @foreach($user_nearest as $usn)
                            <li class="list-group-item border-0 pt-2">
                                <img style="width:45px;margin-top: -1px" src="{{asset('admin/image/background/user.png')}}" alt="male">
                                <a style="border-top-right-radius: 22px;border-bottom-right-radius: 22px">
                                    {{$usn->email}}
                                    <br>
                                    <!-- {{$usn->created_at->format('d/m/y - H:i')}} -->
                                </a>
                            </li>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end card-->
    </div>
</div>
<div class="card">
<div id="container" data-order="{{ $orderYear }}"></div>
</div>
<div class="card">
    <div class="card-body">
        <h4 class="header-title mb-4">Bài viết gần đây</h4>
        <div class="table-responsive">
            <table class="table mb-0">
                <thead class="table-info">
                    <tr>
                        <th>Tiêu đề</th>
                        <th>Nội dung</th>
                        <th>Hình ảnh</th>
                        <th>Người viết</th>
                        <th>Thời gian</th>
                        <th>Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $new_nearest as $ns )
                    <tr>
                        <td>{{ $ns->title }}</td>
                        <td>{{ $ns->content }}</td>
                        <td>
                            <div class="thumbnail">
                                <img src="{{asset('admin/image/posts/'.$ns->image)}}" alt="" />
                            </div>
                        </td>
                        @foreach($user as $us)
                        @if($ns->user_id_create == $us->id)
                        <td>{{$us->email}}</td>
                        @endif
                        @endforeach
                        <td>{{ $us->updated_at->format('d/m/20y - H:i') }}</td>
                        <td>
                            <a href="{{route('list-admin.ds-news.update', ['id'=>$ns->id])}}" class="text-primary font-20"><i class="fas fa-pencil-alt"></i> </a>
                            <hr>
                            <a href="{{route('list-admin.ds-news.delete', ['id'=>$ns->id])}}" class="text-danger font-20" onclick="return confirm('Bạn chất chắn xóa ?');"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h4 class="header-title mb-4">Sản phẩm gần đây</h4>
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <thead class="table-info">
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Loại</th>
                            <th>Mô tả</th>
                            <th>Giá</th>
                            <th>Giá khuyến mãi</th>
                            <th>Hình</th>
                            <th>Đơn vị</th>
                            <th>Nguyên liệu thô</th>
                            <th>Nguồn</th>
                            <th>Thời gian</th>
                            <th>Tác vụ</th>
                        </tr>
                    </thead>
                <tbody>
                    @foreach( $product_nearest as $pr )
                    <tr>
                        <td>{{ $pr->product_name }}</td>
                        @foreach( $listtypeproduct as $tpr )
                        @if( $pr->type_product_id == $tpr->id)
                        <td>{{ $tpr->type_name}}</td>
                        @endif
                        @endforeach
                        <td>{{ $pr->description }}</td>
                        <td><span class="badge badge-purple">{{thousandSeperator($pr->unit_price) }} VNĐ</span></td>
                        <td><span class="badge badge-primary">{{ thousandSeperator($pr->promotion_price) }} VNĐ</span></td>
                        <td>
                            <div class="thumbnail">
                                <img src="{{asset('admin/image/product/'.$pr->image)}}" alt="" />
                            </div>
                        </td>
                        <td>{{ $pr->unit }}</td>
                        <td>{{ $pr->raw_material }}</td>
                        <td>{{ $pr->origin }}</td>
                        <td>{{ $pr->updated_at->format('d/m/20y - H:i') }}</td>
                        <td>
                            <a href="{{route('list-admin.ds-product.update', ['id'=>$pr->id])}}" class="text-primary font-20"><i class="fa fa-wrench"></i> </a>
                            <hr>
                            <a href="{{route('list-admin.ds-product.delete', ['id'=>$pr->id])}}" class="text-danger font-20" onclick="return confirm('Bạn chất chắn xóa ?');"><i class="far fa-trash-alt"></i></a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<!-- end card-->
@endsection
@section('script')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.jss"></script>
<script>
    $(document).ready(function() {
        var order = $('#container').data('order');
        var listOfValue = [];
        var listOfYear = [];
        order.forEach(function(element) {
            var userDate = element.date;
            var date_string = moment(userDate, "YYYY-MM-DD").format("DD/MM/YYYY");
            // var date1 = new Date(element.date).toLocaleString();
            listOfYear.push(date_string);
            listOfValue.push(element.value);
        });
        console.log(listOfValue);
        var chart = Highcharts.chart('container', {

            title: {
                text: 'Đơn hàng theo ngày'
            },

            subtitle: {
                text: ''
            },

            xAxis: {
                categories: listOfYear,
            },

            series: [{
                type: 'column',
                colorByPoint: true,
                data: listOfValue,
                showInLegend: false
            }]
        });

        $('#plain').click(function() {
            chart.update({
                chart: {
                    inverted: false,
                    polar: false
                },
                subtitle: {
                    text: 'Plain'
                }
            });
        });

        $('#inverted').click(function() {
            chart.update({
                chart: {
                    inverted: true,
                    polar: false
                },
                subtitle: {
                    text: 'Inverted'
                }
            });
        });

        $('#polar').click(function() {
            chart.update({
                chart: {
                    inverted: false,
                    polar: true
                },
                subtitle: {
                    text: 'Polar'
                }
            });
        });
    });
</script>
<script src="{{asset('admin/assets/js/pages/dashboard3.init.js') }}"></script>
@endsection