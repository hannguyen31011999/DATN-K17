@extends('user.master')

@section('css')
<style type="text/css">
    .content-thanhtoan p{
        font-size: 16px;
        line-height: 1.4rem;
    }
    .content-thanhtoan b{
        font-size: 17px;
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
                <h4>CHÍNH SÁCH BẢO MẬT</h4>
                <hr width="100%">
                <div class="content-thanhtoan">
                    <h5>1. Mục đích và phạm vi thu thập thông tin</h5>
                    <p>- Các thông tin giao dịch như: lịch sử đơn hàng, giá trị giao dịch sẽ được Cake Local Bakery lưu trữ nhằm giải quyết những vấn đề phát sinh nếu có.</p>
                    <p>- Mục đích chính của việc thu thập thông tin là nhằm nâng cao chất lượng dịch vụ, nâng cao tiện ích nhằm chăm sóc khách hàng một cách tốt nhất.</p>
                    <h5>2. Phạm vi sử dụng thông tin</h5>
                    <b>Thông tin của Quý khách chúng tôi có thể sử dụng cho một số công việc như sau:</b>
                    <p>- Gửi thư tới Quý khách để giới thiệu sản phẩm mới và những chương trình khuyến mãi của Cake Local Bakery thông báo, hỗ trợ chăm sóc khách hàng.</p>
                    <p>- Giải quyết các vấn đề tranh chấp phát sinh nếu có.</p>
                    <b>Thông tin về khách hàng là vấn đề mang tính cá nhân, sự tôn trọng khách hàng vì vậy trong mọi trường hợp chúng tôi cam kết:</b>
                    <p>- Không bán, trao đổi, chia sẻ thông tin cho bên thứ ba.</p>
                    <p>- Không đưa khách hàng vào những sự việc vi phạm pháp luật.</p>
                    <b>Chỉ chia sẻ thông tin khách hàng trong trường hợp sau:</b>
                    <p>- Để bảo vệ Cake Local Bakery trong trường hợp có tranh chấp phát sinh cần giải quyết.</p>
                    <p>- Chia sẻ theo yêu cầu từ các cơ quan Nhà nước.</p>
                    <b>Trong những trường hợp còn lại, chúng tôi sẽ có thông báo cụ thể cho Quý Khách Hàng khi phải tiết lộ thông tin cho một bên thứ ba và thông tin này chỉ được cung cấp khi được sự phản hồi đồng ‎ý‎ từ phía Quý Khách Hàng.</b>
                    <h5>3. Thời gian lưu trữ thông tin</h5>
                    <p>- Cake Local Bakery sẽ lưu trữ bất kỳ thông tin nào bạn nhập trên website hoặc gửi đến Cake Local Bakery. Những thông tin đó sẽ được sử dụng cho mục đích nâng cao chất lượng phục vụ Quý Khách của chúng tôi và để liên lạc với Quý khách khi cần.</p>
                    <h5>4. Địa chỉ của đơn vị thu thập và quản lý thông tin cá nhân</h5>
                    <h5>5. Phương tiện và công cụ để người dùng tiếp cận và chỉnh sửa dữ liệu cá nhân của mình.</h5>
                    <p>- Quý khách có thể tiếp cận và chỉnh sửa dữ liệu cá nhân của mình thông qua các phương tiện và công cụ phổ biến như: máy tính , điện thoại thông minh, ipad,…</p>
                    <h5>6. Cam kết bảo mật thông tin cá nhân khách hàng</h5>
                    <p>- Chúng tôi bảo mật tuyệt đối các thông tin tài khoản của Quý khách hàng.</p>
                    <p>- Quý khách hàng phải có trách nhiệm bảo vệ mật khẩu của mình tránh để bên thứ ba nắm được thông tin tài khoản, mật khẩu của Quý khách.</p>
                    <p>- Trường hợp có thắc mắc và cần giải đáp về thông tin cá nhân Quý khách hàng vui lòng liên hệ với chúng tôi quá số điện thoại hotline hoặc email để được giải đáp.</p>
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