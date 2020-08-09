<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description">
    <meta content="Coderthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('img/logo/logo2.jpg') }}">
    <!-- Plugins css-->
    <link href="{{asset('admin/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
    <!-- App css -->
    <link href="{{asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
    <link href="{{asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/assets/css/imgpage.css') }}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-stylesheet">
    <link href="{{asset('admin/assets/libs/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/assets/libs/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/assets/libs/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/assets/libs/datatables/select.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
    @yield('header')
    <style>
        body {
            background-image: url(image/background/Banh.jpg);
            margin: 0;
            font-family: Lato, sans-serif;
            font-size: 1.0rem;
            font-weight: 400;
            line-height: 1.25;
            color: #1b0202;
            text-align: left;
        }

        .navbar-custom {
            background-image: url(image/background/backgrounduser.png);
        }

        .left-side-menu {
            width: 240px;
            background: #ffffff;
            bottom: 0;
            position: fixed;
            padding: 14px 0;
            -webkit-transition: all .2s ease-out;
            transition: all .2s ease-out;
            top: 70px;
        }

        .logo-box {
            background-color: #ffffff;
            height: 70px;
            width: 240px;
            float: left;
            -webkit-transition: all .2s ease-out;
            transition: all .2s ease-out;
        }

        #sidebar-menu>ul>li>a.active {
            color: #3bc0c3;
            background: #ffffff;
            border: dashed;
        }

        #sidebar-menu>ul>li>a {
            color: #000000;
            display: block;
            padding: 10px 20px;
            position: relative;
            -webkit-transition: all .4s;
            transition: all .4s;
            font-size: 17px;
        }

        .col-xl-10.col-lg-12 {
            margin: 0 auto;
        }

        .conten-add-post {
            width: 100%;
        }

        .header-title {
            font-size: 18px;
            margin: 0 0 15px 0;
            text-transform: uppercase;
            font-weight: 600;

        }

        .card-box {
            background-color: #e7ebeb;
            padding: 1.25rem;
            -webkit-box-shadow: 0 1px 2px 0 rgba(33, 37, 41, .1);
            box-shadow: 0 1px 2px 0 rgba(33, 37, 41, .1);
            margin-bottom: 24px;
            border-radius: 2.25rem;
            margin-top: 20px;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #000000;
        }

        div.dataTables_wrapper div.dataTables_filter input {
            margin-left: 0.5em;
            display: inline-block;
            width: 195px;
            height: 39px;
            color: #3bc0c3;
        }

        label {
            font-size: 16px !important;
        }

        .form-control {
            color: #000000;
            background-color: #fff;
            border: 1px solid #000;
        }

        .custom-select {
            color: #000000;
            border: 1px solid #000;
        }

        @media all and (max-width: 480px) {
            button.button-menu-mobile.waves-effect {
                top: -45px;
            }
            input#seach {
                    float: right;
                    height: 37px;
                    width: 42%!important;
                }
            a.btn.btn-primary.waves-effect.waves-light {
                top: 37px;
                left: -17px;
            }
        }

        /* Dành cho máy tính bảng */
        @media all and (max-width: 1024px) {}
    </style>
</head>

<body>

    <div id="wrapper">
        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-right mb-0">
                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" href="#" data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="false">
                <li class=" far fa-clock font-20" id="clockDiv" style="margin-top:25px;"></li>
                <span class="pro-user-name ml-1">
                    <li class=" far fa-user font-20"></li>
                </span>
                <!-- <img src="{{asset('img/logo/logo2.jpg')}}" alt="user-image" class="rounded-circle"> -->
                <span class="pro-user-name ml-1">
                    {{Session::get('email')}} <i class="mdi mdi-chevron-down"></i>
                </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <a href="{{url('/admin/profile')}}" class="dropdown-item notify-item">
                        <i class="far fa-star"></i>
                        <span>Thông tin</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <!-- item-->
                    <a href="{{url('logout')}}" class="dropdown-item notify-item">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Đăng xuất</span>
                    </a>
                </div>
                </li>
            </ul>
            <!-- LOGO -->
            <div class="logo-box">
                <a href="index.html" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <img src="{{asset('admin/image/logo/logo.png')}}" alt="" height="18">
                        <!-- <span class="logo-lg-text-dark">Velonic</span> -->
                    </span>
                    <span class="logo-sm">
                        <!-- <span class="logo-lg-text-dark">V</span> -->
                        <img src="{{asset('admin/image/logo/logo.png')}}" alt="" height="22">
                    </span>
                </a>
                <a href="{{route('dashboard')}}" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="{{asset('admin/image/logo/logo.png')}}" alt="" height="70">
                        <!-- <span class="logo-lg-text-dark">Velonic</span> -->
                    </span>
                    <span class="logo-sm">
                        <!-- <span class="logo-lg-text-dark">V</span> -->
                        <img src="{{asset('admin/image/logo/logo.png')}}" alt="" height="30">
                    </span>
                </a>
            </div>
            <!-- LOGO -->
            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                <li>
                    <button class="button-menu-mobile waves-effect">
                        <i class="mdi mdi-menu"></i>
                    </button>
                </li>
            </ul>
        </div>
        <!-- end Topbar -->
        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 309px;">
                <div class="slimscroll-menu" style="overflow: hidden; width: auto; height: 309px;">
                    <!--- Sidemenu -->
                    <div id="sidebar-menu" class="mm-active">
                        <ul class="metismenu mm-show" id="side-menu">

                            <li>
                                <a href="{{route('dashboard')}}" class="waves-effect ">
                                    <i class="ion-md-speedometer font-20"></i>
                                    <span> Trang chủ </span>
                                </a>
                            </li>
                            <li class="menu-title">Bài viết</li>
                            <li>
                                <a href="{{route('list-admin.ds-news.list')}}" class="waves-effect ">
                                    <i class="ion ion-ios-create font-20"></i>
                                    <span>Quản lí bài viết </span>
                                </a>
                                <!-- <a href="{{url('/list-news/add')}}" class="waves-effect ">
                                    <i class="ion ion-ios-create"></i>
                                    <span>Thêm bài viết </span>
                                </a> -->
                            </li>
                            <li class="menu-title">SẢN PHẨM</li>
                            <li>
                                <a href="javascript: void(0);" class="waves-effect">
                                    <i class=" ion ion-ios-list font-20"></i>
                                    <span>Quản lí sản phẩm</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level mm-collapse" aria-expanded="false">
                                    <li><a href="{{route('list-admin.ds-product.list')}}">Sản phẩm</a></li>
                                    <li><a href="{{route('list-admin.ds-typeproduct.list')}}">Loại sản phẩm</a></li>
                                </ul>
                            </li>
                            <li class="menu-title">Đơn hàng</li>
                            <li>
                                <a href="{{route('list-admin.ds-order.list')}}" class="waves-effect ">
                                    <i class="ion-md-cart font-20"></i>
                                    <span>Quản lý đơn hàng</span>
                                </a>
                            </li>
                            <li class="menu-title">Bình Luận</li>
                            <li>
                                <a href="{{route('list-admin.ds-comment.list')}}" class="waves-effect ">
                                    <i class=" fas fa-comment font-20"></i>
                                    <span>Quản lý bình luận</span>
                                </a>
                            </li>
                            <li class="menu-title">QUẢN LÍ TÀI KHOẢN</li>
                            <li class="mm-active">
                                <a href="{{route('list-admin.ds-user.list')}}" class="waves-effect ">
                                    <i class=" fas fa-address-book font-20 "></i>
                                    <span>Người dùng</span>
                                </a>
                            </li>
                            <li class="mm-active">
                                <a href="{{route('list-admin.ds-member.list')}}" class="waves-effect ">
                                    <i class="ion ion-md-people font-20"></i>
                                    <span>Thành viên</span>
                                </a>
                            </li>
                            <li class="mm-active">
                                <a href="{{url('admin/profile')}}" class="waves-effect ">
                                    <i class="ion ion-ios-finger-print font-20"></i>
                                    <span>Admin</span>
                                </a>
                            </li>
                            <li class="menu-title">CẤU HÌNH</li>
                            <li class="mm-active">
                                <a href="javascript: void(0);" class="waves-effect ">
                                    <i class="fa fa-cogs font-20"></i>
                                    <span>Cài dặt</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Sidebar -->
                    <div class="clearfix"></div>
                </div>
                <div class="slimScrollBar" style="background: rgb(158, 165, 171); width: 5px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 158.081px;"></div>
                <div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
            </div>
            <!-- Sidebar -left -->
        </div>
        <!-- Left Sidebar End -->
        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================= -->
        <div class="content-page">
            <div class="content">
                <!-- Start Content-->
                <div class="container-fluid">
                    <!-- start page title -->

                    <!-- end page title -->
                    @yield('main-conten')
                    <!-- end container-fluid -->
                </div>
            </div>
            <!-- end content -->
            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            2020 © cao thắng by <a href="">cdth17pma</a>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->
        <!-- END wrapper -->
        <!-- /Right-bar -->
        <!-- Right bar overlay-->
        <!-- Vendor js -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="{{asset('admin/assets/js/vendor.min.js') }}"></script>

        <script src="{{asset('admin/assets/libs/moment/moment.min.js') }}"></script>
        <script src="{{asset('admin/assets/libs/jquery-scrollto/jquery.scrollTo.min.js') }}"></script>
        <script src="{{asset('admin/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

        <script src="{{ asset('admin/assets/js/pages/sweet-alerts.init.js') }}"></script>
        <!-- Chat app -->
        <script src="{{asset('admin/assets/js/pages/jquery.chat.js') }}"></script>

        <!-- Todo app -->
        <script src="{{asset('admin/assets/js/pages/jquery.todo.js') }}"></script>

        <!--Morris Chart-->
        <script src="{{asset('admin/assets/libs/morris-js/morris.min.js') }}"></script>
        <script src="{{asset('admin/assets/libs/raphael/raphael.min.js') }}"></script>

        <!-- Sparkline charts -->
        <script src="{{asset('admin/assets/libs/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

        <!-- Dashboard init JS -->
        <script src="{{asset('admin/assets/js/pages/dashboard.init.js') }}"></script>

        <!-- App js -->
        <script src="{{asset('admin/assets/js/app.min.js') }}"></script>
        @yield('script')
        <script src="{{asset('admin/assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{asset('admin/assets/libs/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <!-- Buttons examples -->
        <script src="{{asset('admin/assets/libs/datatables/dataTables.buttons.min.js') }}"></script>
        <script src="{{asset('admin/assets/libs/datatables/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{asset('admin/assets/libs/jszip/jszip.min.js') }}"></script>
        <script src="{{asset('admin/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
        <script src="{{asset('admin/assets/libs/pdfmake/vfs_fonts.js') }}"></script>
        <script src="{{asset('admin/assets/libs/datatables/buttons.html5.min.js') }}"></script>
        <script src="{{asset('admin/assets/libs/datatables/buttons.print.min.js') }}"></script>

        <!-- Responsive examples -->
        <script src="{{asset('admin/assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
        <script src="{{asset('admin/assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>

        <script src="{{asset('admin/assets/libs/datatables/dataTables.keyTable.min.js') }}"></script>
        <script src="{{asset('admin/assets/libs/datatables/dataTables.select.min.js') }}"></script>

        <script src="{{asset('admin/assets/libs/datatables/dataTables.select.min.js') }}"></script>
        <script src="{{asset('admin/assets/libs/datatables/mycreate.js') }}"></script>

        <!-- Datatables init -->
        <script src="{{asset('admin/assets/js/pages/datatables.init.js') }}"></script>
</body>

</html>