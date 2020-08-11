@extends('admin.mater-admin')
@section('header')
<title>Admin | Thống kê</title>
@endsection
@section('main-conten')
<br></br>
<select class="custom-select" id="nguoi-dung" name="list-order" style="width:145px;">
</select>
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
            $('#nguoi-dung').append($('<option />').val(i).attr("selected","selected").html(i));
            break;
        }
        $('#nguoi-dung').append($('<option />').val(i).html(i));
    }
    var order = $('#container').data('order');
    getData(order,n);
    function getData(order,nam)
    {
        var listOfValue = [];
        var listOfMonth = [];
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
                text: 'Thống kê người dùng đăng kí của năm '+ nam,
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
                pointFormat: '<span>{point.y} user</b><br/>',
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

        $(document).on('change', '#nguoi-dung',function(e){
            var nam = $(this).find(":selected").val();
            $.ajax({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'get',
                url: '/admin/thong-ke/nguoi-dung',
                data: {
                  "nam":nam
                },
                success: function(response) {
                    getData(response,nam);
                    console.log(response);
                    console.log(nam);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                }
            });
            e.preventDefault();
        });
    });
</script>
@endsection