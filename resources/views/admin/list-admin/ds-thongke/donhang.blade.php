@extends('admin.mater-admin')
@section('header')
<title>Admin | Thống kê</title>
@endsection
@section('main-conten')
<br></br>
<form action="" method="POST" id="submit-donhang">
    @csrf
<select class="custom-select" id="don-hang" name="list-order" style="width:145px;">
</select>
    <select class="custom-select" id="donhang-month" name="list-order" style="width:145px; margin-left: 15px;">
        <option>
            Tháng
        </option>
    </select>
    <button class="btn btn-primary waves-effect waves-light">Tìm kiếm</button>
</form>
<br></br>
<div id="chart-content">
    @include('admin.list-admin.ds-thongke.content_chart')
</div>
@endsection
@section('script')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.jss"></script>
<script type="text/javascript">
$(document).ready(function(){
    var year = new Date();
    var n = year.getFullYear();
    for (var i = 2015; i <= n; i++) {
        if(i==n)
        {
            $('#don-hang').append($('<option />').val(i).attr("selected","selected").html(i));
            break;
        }
        $('#don-hang').append($('<option />').val(i).html(i));
    }
    for (var i = 1; i <= 12; i++) {
        $('#donhang-month').append($('<option />').val(i).html(i));
    }
    var order = $('#container').data('order');
    getData(order,n);
        $('#plain').click(function () {
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

        $('#inverted').click(function () {
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

        $('#polar').click(function () {
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

        $(document).on('change', '#don-hang',function(e){
            var nam = $(this).find(":selected").val();
            $.ajax({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'get',
                url: '/admin/thong-ke/don-hang',
                data: {
                  "nam":nam
                },
                success: function(response) {
                    getData(response,nam);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                }
            });
            e.preventDefault();
        });

        $('#submit-donhang').submit(function(e) {
            var nam = $('#don-hang').val();
            var thang = $('#donhang-month').val();
            $.ajax({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/admin/thong-ke/don-hang',
                data: {
                  "nam":nam,
                  "thang":thang
                },
                success: function(response) {
                    getDatabyMonth(response,nam,thang);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                }
            });
            e.preventDefault();
        });
    });

function getDatabyMonth(order,nam,thang)
    {
        var listOfValue = [];
        var listOfMonth = [];
        order.forEach(function(element){
            listOfMonth.push(element.day);
            listOfValue.push(parseInt(element.total));
        });
        Highcharts.chart('container',{
            chart: {
                type: 'column'
              },
            title: {
                text: 'Tổng doanh thu của tháng '+ thang + " năm "+nam,
              },
            accessibility: {
                announceNewData: {
                  enabled: true
                }
              },
            xAxis: {
                title: {
                    text: 'Ngày'
                },
                categories: listOfMonth,
            },
            yAxis: {
                title: {
                  text: 'Đơn vị'
                }
              },
            tooltip: {
                headerFormat: '<span style="font-size:11px">Ngày {point.x}</span><br>',
                pointFormat: '<span>{point.y} đơn hàng</b><br/>',
            },
            series: [
                {
                    type: 'column',
                    colorByPoint: true,
                    data: listOfValue,
                    showInLegend: false
                }
            ]
        });
    }
    function getData(order,nam)
    {
        var listOfValue = [];
        var listOfMonth = [];
        order.forEach(function(element){
            listOfMonth.push(element.month);
            listOfValue.push(parseInt(element.total));
        });
        Highcharts.chart('container',{
            chart: {
                type: 'column'
              },
            title: {
                text: 'Tổng đơn hàng của năm '+ nam,
              },
            accessibility: {
                announceNewData: {
                  enabled: true
                }
              },
            xAxis: {
                title: {
                    text: 'Tháng'
                },
                categories: listOfMonth,
            },
            yAxis: {
                title: {
                  text: 'Đơn vị'
                }
              },
            tooltip: {
                headerFormat: '<span style="font-size:11px">Tháng {point.x}</span><br>',
                pointFormat: '<span>{point.y} Đơn hàng</b><br/>',
            },
            series: [
                {
                    type: 'column',
                    colorByPoint: true,
                    data: listOfValue,
                    showInLegend: false
                }
            ]
        });
    }
</script>
@endsection