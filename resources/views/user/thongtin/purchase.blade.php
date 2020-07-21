@extends('user.master')

@section('css')
<link rel="stylesheet" title="style" href="{{asset('user/assets/dest/css/thongtin.css')}}">
<style type="text/css">
  table {
  border-collapse: collapse;
}
</style>
@endsection

@section('title')
	Thông tin khách hàng
@endsection
@section('content')
<div class="container">
    <div class="row profile">
    @include('user.thongtin.template.menu')
    <div class="col-md-9">
          <ul class="nav nav-tabs">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#general">Tất cả</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#regions">Chờ thanh toán</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#contact">Chờ lấy hàng</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#policy">Đang giao</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#email">Đã giao</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#setting">Đã hủy</a>
              </li>
              <li class="nav-item">
              </li>
          </ul>
          <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane container active" id="general">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <br></br>
                                    <table class="table table-borderless mb-0">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <tr></tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane container fade" id="regions">
                .....
              </div>
              <div class="tab-pane container fade" id="contact">
                .....
              </div>
              <div class="tab-pane container fade" id="policy">
                
              </div>
              <div class="tab-pane container fade" id="email">
                
              </div>
              <div class="tab-pane container fade" id="setting">
                
              </div>
            </div>
      </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{asset('js/jquery.min.js')}}"></script>
@endsection