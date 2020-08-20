@extends('user.master')

@section('css')
<style type="text/css">
    p{
        margin-top: 5px;
        font-size: 16px;
    }
</style>
@endsection
@section('title')
	Bài viết
@endsection
@section('content')
    <div class="container" style="background-color: ">
        <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-8 content">
                <h4>CHÍNH SÁCH VÀ QUY ĐỊNH CHUNG</h4>
                <hr width="100%">
                <h5>1.Tiêu chuẩn dịch vụ</h5>
                <p>- Cake Localtion Bakery là thương hiệu bánh ngọt Pháp của công ty cổ phần bánh ngọt Cake Localtion.</p>
                <p>- Các sản phẩm của chúng tôi được làm từ các nguyên liệu nhập khẩu của các nước có truyền thống làm bánh như: Newzeland, Mỹ, Pháp, Bỉ.</p>
                <p>- Quy mô xưởng sản xuất rộng hơn 2000m2 với các thiết bị tiên tiến hiện đại theo tiêu chuẩn ISO 2018, toàn bộ nhà máy được sơn phủ bởi sơn EPOXY đặc biệt.</p>
                <h5>2.Quy định</h5>
                <p>- Alley Bakery luôn đảm bảo và mang đến cho khách hàng những sản phẩm chất lượng nhất, đảm bảo tuyệt đối về an toàn vệ sinh thực phẩm.</p>
                <p>- Anh Hòa Bakery cam kết đối với khách hàng về sản phẩm bánh tươi hoàn toàn không chất bảo quản, thực sự lành mạnh, tốt cho sức khỏe và dồn nén những đam mê của một tập thể tâm huyết với nghề - tâm huyết với khách hàng.</p>
                <p>- Website: wwww.suoitien3.000webhostapp.com là website giới thiệu sản phẩm thuộc sở hữu bởi CÔNG TY CỔ PHẦN BÁNH NGỌT Cake Localtion, được thành lập và hoạt động theo Giấy chứng nhận đăng ký doanh nghiệp số 0104802706  do Sở Kế hoạch và Đầu tư Tp. Hồ Chí Minh cấp lần đầu ngày 21/07/2010, đăng ký thay đổi lần thứ 9 ngày 25/07/2018.</p>
                <p>- www.suoitien3.000webhostapp.com là website giới thiệu sản phẩm do Cake Localtion Bakery sản xuất và phân phối.</p>
                <h5>3.Quy trình</h5>
                <p>- Sau khi sản xuất tại xưởng, bánh sẽ được bảo quản và vận chuyển đến hệ thống cửa hàng Alley Bakery trên địa bàn Cake Localtion.</p>
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