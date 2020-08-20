@extends('admin.mater-admin')
@section('header')
<title>Admin | Thống kê</title>
@endsection
@section('main-conten')
<br></br>
<div class="card">
<div class="card-body">
<form action="" method="POST" id="submit-doanhthu">
    @csrf
    <label>Chọn năm</label>
    <br>
    <select class="custom-select" id="doanh-thu" name="list-order" style="width:100px;"></select>
    <br>
    <label style="margin-top: 5px;">Chọn doanh thu theo tháng</label>
    <br>
    <select class="custom-select" id="doanh-thu-month" name="list-order" style="width:100px;">
        <option>
            Tháng
        </option>
    </select>
    <button class="btn btn-primary waves-effect waves-light">Tìm kiếm</button>
</form>
</select>

<br></br>
<div id="chart-content">
    @include('admin.list-admin.ds-thongke.content_chart')
</div>
</div>
</div>
@endsection
@section('script')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.jss"></script>
<script type="text/javascript">
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
                text: 'Tổng doanh thu của năm '+ nam,
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
                  text: 'Đơn vị VNĐ'
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
}

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
                  text: 'Đơn vị VNĐ'
                }
              },
            tooltip: {
                headerFormat: '<span style="font-size:11px">Ngày {point.x}</span><br>',
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
}
$(document).ready(function(){
    var year = new Date();
    var n = year.getFullYear();
    var order = $('#container').data('order');
    for (var i = 2015; i <= n; i++) {
        if(i==n)
        {
            $('#doanh-thu').append($('<option />').val(i).attr("selected","selected").html(i));
            break;
        }
        $('#doanh-thu').append($('<option />').val(i).html(i));
    }

    for (var i = 1; i <= 12; i++) {
        $('#doanh-thu-month').append($('<option />').val(i).html(i));
    }
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

        $('#submit-doanhthu').submit(function(e) {
            var nam = $('#doanh-thu').val();
            var thang = $('#doanh-thu-month').val();
            if(thang=="Tháng")
            {
                $.ajax({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'get',
                    url: '/admin/thong-ke/doanh-thu',
                    data: {
                      "nam":nam
                    },
                    success: function(response) {
                        getData(response,nam);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                    }
                });
            }
            else
            {
                $.ajax({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: '/admin/thong-ke/doanh-thu',
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
            }
            e.preventDefault();
        });

        // $(document).on('change', '#doanh-thu',function(e){
        //     var nam = $(this).find(":selected").val();
        //     $.ajax({
        //         headers: {
        //           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         type: 'get',
        //         url: '/admin/thong-ke/doanh-thu',
        //         data: {
        //           "nam":nam
        //         },
        //         success: function(response) {
        //             getData(response,nam);
        //         },
        //         error: function (jqXHR, textStatus, errorThrown) {
        //         }
        //     });
        //     e.preventDefault();
        // });   
    });
    

</script>
@endsection