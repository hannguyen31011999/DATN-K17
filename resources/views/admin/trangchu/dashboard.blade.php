@extends('admin.mater-admin')
@section('header')
<title>Admin | Trang chủ</title>
@endsection
@section('main-conten')
<div class="row">
@include('sweetalert::alert')
                            <div class="col-xl-3 col-sm-6">
                                <div class="card bg-pink">
                                    <div class="card-body widget-style-2">
                                        <div class="text-white media">
                                            <div class="media-body align-self-center">
                                                <h2 class="my-0 text-white"><span data-plugin="counterup">50</span></h2>
                                                <p class="mb-0">Daily Visits</p>
                                            </div>
                                            <i class="ion-md-eye"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-sm-6">
                                <div class="card bg-purple">
                                    <div class="card-body widget-style-2">
                                        <div class="text-white media">
                                            <div class="media-body align-self-center">
                                                <h2 class="my-0 text-white"><span data-plugin="counterup">12056</span></h2>
                                                <p class="mb-0">Sales</p>
                                            </div>
                                            <i class="ion-md-paper-plane"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-sm-6">
                                <div class="card bg-info">
                                    <div class="card-body widget-style-2">
                                        <div class="text-white media">
                                            <div class="media-body align-self-center">
                                                <h2 class="my-0 text-white"><span data-plugin="counterup">1268</span></h2>
                                                <p class="mb-0">New Orders</p>
                                            </div>
                                            <i class="ion-ios-pricetag"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-sm-6">
                                <div class="card bg-primary">
                                    <div class="card-body widget-style-2">
                                        <div class="text-white media">
                                            <div class="media-body align-self-center">
                                                <h2 class="my-0 text-white"><span data-plugin="counterup">145</span></h2>
                                                <p class="mb-0">New Users</p>
                                            </div>
                                            <i class="mdi mdi-comment-multiple"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-md bg-info rounded-circle">
                                                <i class="ion-logo-usd avatar-title font-26 text-white"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-right">
                                                <h3 class="my-0 font-weight-bold"><span data-plugin="counterup">15852</span></h3>
                                                <p class="mb-0 mt-1 text-truncate">Total Sales</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card-box-->
                            </div>

                            <div class="col-md-6 col-xl-3">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-md bg-warning rounded-circle">
                                                <i class="ion-md-cart avatar-title font-26 text-white"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-right">
                                                <h3 class="my-0 font-weight-bold"><span data-plugin="counterup">956</span></h3>
                                                <p class="mb-0 mt-1 text-truncate">New Orders</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card-box-->
                            </div>

                            <div class="col-md-6 col-xl-3">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-md bg-success rounded-circle">
                                                <i class="ion-md-contacts avatar-title font-26 text-white"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-right">
                                                <h3 class="my-0 font-weight-bold"><span data-plugin="counterup">5210</span></h3>
                                                <p class="mb-0 mt-1 text-truncate">New Users</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card-box-->
                            </div>

                            <div class="col-md-6 col-xl-3">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-md bg-primary rounded-circle">
                                                <i class="ion-md-eye avatar-title font-26 text-white"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-right">
                                                <h3 class="my-0 font-weight-bold"><span data-plugin="counterup">20544</span></h3>
                                                <p class="mb-0 mt-1 text-truncate">Unique Visitors</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card-box-->
                            </div>
                        </div>
@endsection
@section('script')
@endsection