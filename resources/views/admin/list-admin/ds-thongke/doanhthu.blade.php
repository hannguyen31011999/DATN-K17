@extends('admin.mater-admin')
@section('header')
<title>Admin | Thống kê</title>
@endsection
@section('main-conten')
<br></br>
<div id="container" data-order="{{ $total }}">
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
        var order = $('#container').data('order');
        var listOfValue = [];
        var listOfMonth = [];
        var year = new Date();
        order.forEach(function(element){
            listOfMonth.push(element.month);
            listOfValue.push(parseInt(element.total));
        });
        console.log(listOfValue);
        console.log(listOfMonth);
Highcharts.chart('container',{
    chart: {
        type: 'column'
      },
    title: {
        text: 'Tổng doanh thu của năm '+ year.getFullYear(),
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
          text: 'Đơn vị triệu'
        }
      },
    tooltip: {
        headerFormat: '<span style="font-size:11px">Tháng {point.x}</span><br>',
        pointFormat: '<span>{point.y}VNĐ</b><br/>',
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
    });
</script>
@endsection