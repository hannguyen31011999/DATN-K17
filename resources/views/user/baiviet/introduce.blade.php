@extends('user.master')

@section('css')
<style type="text/css">
    .circle{
        margin-right: 68px;
    }
</style>
@endsection
@section('title')
	Giới thiệu
@endsection
@section('shopping-cart')
<div class="beta-comp" >
    <div class="cart">
        <div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng <span id="count_span" ></span><i class="fa fa-chevron-down"></i></div>
        <div class="beta-dropdown cart-body">
            @include('user.template.cart')
        </div>
    </div>
</div>
@endsection
@section('content')
<div id="content">
            <div class="our-history">
                <h2 class="text-center wow fadeInDown">Những bếp trưởng đã cùng cộng tác với chúng tôi</h2>
                <div class="space35">&nbsp;</div>

                <div class="history-slider">
                    <div class="history-navigation">
                        <a data-slide-index="0" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">2014</span></a>
                        <a data-slide-index="1" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">2015</span></a>
                        <a data-slide-index="2" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">2016</span></a>
                        <a data-slide-index="3" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">2017</span></a>
                        <a data-slide-index="4" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">2018</span></a>
                        <a data-slide-index="5" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">2019</span></a>
                        <a data-slide-index="6" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">2020</span></a>
                    </div>

                    <div class="history-slides">
                        <div> 
                            <div class="row">
                            <div class="col-sm-5">
                                <img src="{{asset('admin/image/daubep/am-thuc-viet-la-so-1-the-gioi.jpg')}}" style="height: 320px;
        width: 450px;" alt="">
                            </div>
                            <div class="col-sm-7">
                                <h5 class="other-title">Dương Huy Khải</h5>
                                <div class="space20">&nbsp;</div>
                                <p>Khởi nghiệp từ con số không và với niềm đam mê vô tận dành cho ẩm thực, Dương Huy Khải đã từng theo học tại trường ẩm thực danh tiếng của pháp và tốt nghiệp xuất sắc thủ khoa. Sau đó, ông đã làm việc cho rất nhiều nhà hàng và khách sạn tầm cỡ nổi tiếng tại Mỹ. Tháng 6/2012, tại cuộc thi ẩm thực quốc tế ở Bắc Kinh, ông đã vượt qua hơn 200 đầu bếp đến từ nhiều nơi trên thế giới và giành huy chương vàng với món súp yến hảo hạng. Hiện ông đang là chủ của một nhà hàng cao cấp tại Mỹ và là đầu bếp đầu tiên được nhận một ngôi sao trên Đại lộ Cordon Bleu ở Pháp nơi vinh danh các đầu bếp thế giới. Ông cũng vận động thành lập và đã được giữ chức chủ tịch Hiệp hội đầu bếp Á Đông và Hiệp hội đầu bếp không biên giới. Tuy là một đầu bếp tầm cỡ thế giới nhưng ông cũng là một người rất đậm tình với quê hương Việt Nam và mong muốn đem ẩm thực Việt vươn xa ra thế giới.</p>
                            </div>
                            </div> 
                        </div>
                        <div> 
                            <div class="row">
                            <div class="col-sm-5">
                                <img src="{{asset('admin/image/daubep/duong-huy-khai-54126.jpg')}}" style="height: 320px;
        width: 450px;" alt="">
                            </div>
                            <div class="col-sm-7">
                                <h5 class="other-title">Michael Bảo Huỳnh</h5>
                                <div class="space20">&nbsp;</div>
                                <p>Ông là một đầu bếp tài năng và thành công trên nước Mỹ với các chuỗi nhà hàng nổi tiếng đồng thời ông cũng là giảng viên giảng dạy tại trường dạy nấu ăn nổi tiếng Culinary Institues of America. Ông cũng là đầu bếp Việt Nam đầu tiên ở Mỹ đoạt danh hiệu đầu bếp xuất sắc nhất New York do New York Times bình chọn và năm 2003. Ông được xem là "Người tạo hương vị" trong làng ẩm thực.</p>
                            </div>
                            </div> 
                        </div>
                        <div> 
                            <div class="row">
                            <div class="col-sm-5">
                                <img src="{{asset('admin/image/daubep/duong-huy-khai-54125.jpg')}}" style="height: 320px;
        width: 450px;" alt="">
                            </div>
                            <div class="col-sm-7">
                                <h5 class="other-title">Luke Nguyễn</h5>
                                <div class="space20">&nbsp;</div>
                                <p>Luke Nguyễn là đầu bếp người Úc gốc Việt khá quen thuộc với khán giả Việt nam với vai trò là ban giám khảo trong cuộc thi Masterchef Việt Nam. Anh là một người rất gần gũi và đặc biệt yêu thích ẩm thực đường phố Việt Nam. Anh cũng rất trân trọng những người nông dân chăn nuôi và trồng trọt tại quê hương Việt Nam. Hiện anh đang rất thành công với hệ thống nhà hàng Việt Nam Red Lantern tại Sydney Và cũng tham gia viết sách nấu ăn cũng như dẫn chương trình trong các chương trình ẩm thực trên truyền hình. Anh tham gia một bộ phim tài liệu về nền ẩm thực Việt nam và ngay sau khi kết thúc anh đã cho ra đời cuốn sách dạy nấu ăn mới mang tên Luke Nguyễn's Greater Mekong.</p>
                            </div>
                            </div> 
                        </div>
                        <div> 
                            <div class="row">
                            <div class="col-sm-5">
                                <img src="{{asset('admin/image/daubep/hai-mai-14-3648-x-2432-0001-read-only-1455402320.jpg')}}" style="height: 320px;
        width: 450px;" alt="">
                            </div>
                            <div class="col-sm-7">
                                <h5 class="other-title">Trần Văn Hai</h5>
                                <div class="space20">&nbsp;</div>
                                <p>Ông là một đầu bếp người Việt thành công trên nước Đức với các món ăn Nhật. Từ một người sang Đức dưới hình thức hợp tác lao động và không ai có thể tin được có một ngày ông lại được vinh danh trên đất nước này. Khi đã tích lũy được kha khá kinh nghiệm, ông đã mở một nhà hàng chuyên về món Nhật. Tên tuổi của ông trở nên vang dội khắp thủ đô Berlin nhờ tài nghệ và những món ăn độc đáo của chính mình. Ông cũng đã xuất hiện trong suốt 10 trang của cuốn sách " Berlin kocht" tiết lộ thủ thuật nấu ăn của 14 ngôi sao hàng đầu của các đầu bếp tại Berlin. Tuy là người chuyên về món Nhật nhưng ông cũng tích cực quảng bá các món ăn Việt Nam với bạn bè thế giới, giúp phát triển ẩm thực Việt.</p>
                            </div>
                            </div> 
                        </div>
                        <div> 
                            <div class="row">
                            <div class="col-sm-5">
                                <img src="{{asset('admin/image/daubep/duong-huy-khai-54118.jpg')}}" style="height: 320px;
        width: 450px;" alt="">
                            </div>
                            <div class="col-sm-7">
                                <h5 class="other-title">Nguyễn Thị Diệu Thảo</h5>
                                <div class="space20">&nbsp;</div>
                                <p>Có lẽ đối với khán giả màn ảnh nhỏ Việt Nam hẳn không ai còn xa lạ gì với cái tên này nữa, không ai là không biết đến cô. Cô không chỉ là đầu bếp giỏi mà còn là một chuyên gia, một nhà nghiên cứu giáo dục và ẩm thực nổi tiếng. Sinh năm 1961 tại Sài Gòn, cô may mắn được sinh ra trong cái nôi ẩm thực, một gia đình có truyền thống về ẩm thực. Có lẽ bởi điều này mà con đường nghiên cứu ẩm thực của cô có phần êm đẹp hơn người khác. Cô đã cho ra đời nhiều công trình sách nổi tiếng khác nhau, cống hiến cho nền ẩm thực Việt nam. cô là người có bề dày kinh nghiệm trong nền ẩm thực Việt, ngoài ra cô còn đóng góp tích cực cho Viện ẩm thực Việt Nam, về mô hình cho Bếp Việt và hành trình tìm ra chuẩn món Phở và cô cũng là chuyên gia tư vấn cho nhiều nhà hàng nổi tiếng.
                                Cô Diệu Thảo cho rằng: " Nếu chỉ có tố chất khéo léo và sự chú tâm học hỏi, chưa hẳn đã trở thành một đầu bếp giỏi. Trên hết, sự sáng tạo và suy nghĩ độc đáo mới giúp người nấu bếp khẳng định tay nghề và đẳng cấp của mình".</p>
                            </div>
                            </div> 
                        </div>
                        <div> 
                            <div class="row">
                            <div class="col-sm-5">
                                <img src="{{asset('admin/image/daubep/phan-ton-tinh-hai-396033.jpg')}}" style="height: 320px;
        width: 450px;" alt="">
                            </div>
                            <div class="col-sm-7">
                                <h5 class="other-title">Phan Tôn Tịnh Hải</h5>
                                <div class="space20">&nbsp;</div>
                                <p>Bếp trưởng - Đầu Bếp Phan Tôn Tịnh Hải sinh ra và lớn lên trong gia đình có cội nguồn Hoàng tộc. Thân mẫu của cô là nghệ nhân ẩm thực nổi tiếng xứ Huế. Có lẽ vì thế mà ngay từ khi lọt lòng mẹ, bếp trưởng Hải đã được làm quen với những tinh hoa, tinh túy của ẩm thực cung đình Huế. Không giấu giếm, bếp trưởng - Đầu bếp Hải đã gật đầu xác nhận chính nguồn gốc cội rễ đã góp phần giúp ích rất nhiều trong sự nghiệp bếp núc của cô. Thạc sĩ Phan Tôn Tịnh Hải hiện là Tổng Giám đốc Công ty cổ phần Nghệ thuật ẩm thực Việt (VCA) và là hiệu trưởng kiêm giảng viên trường đào tạo bếp Mint Culinary School.</p>
                            </div>
                            </div> 
                        </div>
                        <div> 
                            <div class="row">
                            <div class="col-sm-5">
                                <img src="{{asset('admin/image/daubep/christine-ha-396035.jpg')}}" style="height: 320px;
        width: 450px;" alt="">
                            </div>
                            <div class="col-sm-7">
                                <h5 class="other-title">Christine Hà</h5>
                                <div class="space20">&nbsp;</div>
                                <p>Đầu Bếp Christine Huyền Trân Hà hay còn gọi là Hà Huyền Trân, là một người Mỹ gốc Việt sinh năm 1979 tại Quận Los Angeles, California. Thị lực của cô bị yếu đi vào năm 1999 và bị mù hoàn toàn vào năm 2007. Cô tốt nghiệp ngành tài chính và quản lý hệ thống thông tin của Đại học Texas tại Austin năm 2001 và Cao học về Tiểu thuyết tại Đại học Houston.
                                Đầu Bếp Christine Hà hiện đang là giám khảo chính thức của chương trình MasterChef: Vua đầu bếp Việt Nam, mùa thứ 3. Quán quân Vua đầu bếp Mỹ năm 2012 - Christine Hà là một người khiếm thị đầu tiên tham dự chương trình tranh tài Vua Đầu Bếp MasterChef này.</p>
                            </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>

            <div class="space50">&nbsp;</div>
            <hr />
            <div class="space50">&nbsp;</div>
            <h2 class="text-center wow fadeInDown">Hoạt động của chúng tôi</h2>
            <div class="space20">&nbsp;</div>
            <p class="text-center wow fadeInLeft"></p>
            <div class="space35">&nbsp;</div>

            <div class="row">
                <div class="col-sm-2 col-sm-push-2">
                    <div class="beta-counter">
                        <p class="beta-counter-icon"><i class="fa fa-user"></i></p>
                        <p class="beta-counter-value timer numbers" data-to="19855" data-speed="2000">{{$countUser}}</p>
                        <p class="beta-counter-title">Người dùng đã đăng kí</p>
                    </div>
                </div>

                <div class="col-sm-2 col-sm-push-2">
                    <div class="beta-counter">
                        <p class="beta-counter-icon"><i class="fa fa-picture-o"></i></p>
                        <p class="beta-counter-value timer numbers" data-to="3568" data-speed="2000">{{$countProduct}}</p>
                        <p class="beta-counter-title">Sản phẩm đặc sắc</p>
                    </div>
                </div>

                <div class="col-sm-2 col-sm-push-2">
                    <div class="beta-counter">
                        <p class="beta-counter-icon"><i class="fa fa-shopping-cart"></i></p>
                        <p class="beta-counter-value timer numbers" data-to="258934" data-speed="2000">{{$countOrder}}</p>
                        <p class="beta-counter-title">Những đơn hàng đã giao</p>
                    </div>
                </div>

                <div class="col-sm-2 col-sm-push-2">
                    <div class="beta-counter">
                        <p class="beta-counter-icon"><i class="fa fa-pencil"></i></p>
                        <p class="beta-counter-value timer numbers" data-to="150" data-speed="2000">{{$countComment}}</p>
                        <p class="beta-counter-title">Bình luận về chúng tôi</p>
                    </div>
                </div>
            </div> <!-- .beta-counter block end -->
</div> <!-- #content -->
@endsection
@section('js')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript">
    var count = $('#count').val();
    if(count>0)
    {
        $('#count_span').text("("+count+")");
    }
    else
    {
        $('#count_span').text("(0)");
    }
</script>
@endsection