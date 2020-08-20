@extends('user.master')

@section('css')
<style type="text/css">
 p{
        margin-top: 5px;
        line-height: 1.4rem;
    }
    .content-thanhtoan{
        background-color: #ece7e7;
    }
    .content-thanhtoan p{
        font-size: 16px;
        
    }
</style>
@endsection
@section('title')
	Bài viết
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-8 content">
                <h4>CHÍNH SÁCH GIAO DỊCH, THANH TOÁN</h4>
                <hr width="100%">
                <div class="content-thanhtoan">
                    <p>1. Khách hàng tìm kiếm sản phẩm theo nhu cầu trên website suoitien3.000webhostapp.com và liên hệ với Cake Localtion Bakery để được tư vấn về thông tin sản phẩm phù hợp với nhu cầu của khách hàng.</p>
                    <p>2.  Cake Localtion Bakery sẽ hướng dẫn khách hàng tới cửa hàng gần nhất của Cake Localtion Bakery để mua hàng. Trường hợp khách hàng thường xuyên, có ký hợp đồng mua bán thì các bên sẽ thực hiện giao dịch và thanh toán theo các điều kiện cụ thể trong hợp đồng.</p>
                    <p>3.  Khách Hàng thực hiện thanh toán bằng tiền mặt tại cửa hàng của Cake Localtion Bakery hoặc chuyển khoản vào tài khoản của Cake Localtion Bakery.</p>
                </div>
            </div>
            <div class="col-sm-2">
            </div>
        </div>
    </div>
@endsection
@section('js')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('user/ajax/trangchu.js')}}"></script>
<script type="text/javascript">
    var count = $('#count').val();
    if(count>0)
    {
        $('#count_p').text("("+count+")");
    }
    else
    {
        $('#count_p').text("(0)");
    }
</script>
@endsection