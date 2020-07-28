$(document).ready(function() {

    // Cấu hình các nhãn phân trang
    $('#datatable').dataTable({
        "language": {
            "sProcessing": "Đang xử lý...",
            "sLengthMenu": "Xem _MENU_ mục",
            "sZeroRecords": "Không tìm thấy dòng nào phù hợp",
            "sInfo": "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
            "sInfoEmpty": "Đang xem 0 đến 0 trong tổng số 0 mục",
            "sInfoFiltered": "(được lọc từ _MAX_ mục)",
            "sInfoPostFix": "",
            "sSearch": "Tìm kiếm:",
            "sUrl": "",
            "oPaginate": {
                "sFirst": "Đầu",
                "sPrevious": "Trước",
                "sNext": "Tiếp",
                "sLast": "Cuối"
            }
        },
        "processing": true, // tiền xử lý trước
        "aLengthMenu": [
            [5, 10, 20, 50],
            [5, 10, 20, 50]
        ], // danh sách số trang trên 1 lần hiển thị bảng
        "order": [
            [1, 'desc']
        ] //sắp xếp giảm dần theo cột thứ 1
    });

});
var myVar = setInterval(function() {
    Clock()
}, 1000);


function Clock() {
    a = new Date();
    w = Array("Chủ Nhật", "Thứ hai", "Thứ ba", "Thứ tư", "Thứ năm", "Thứ sáu", "Thứ bảy");
    var a = w[a.getDay()],
        w = new Date,
        d = w.getDate();
    m = w.getMonth() + 1;
    y = w.getFullYear();
    h = w.getHours();
    mi = w.getMinutes();
    se = w.getSeconds();
    if (10 > d) {
        d = "0" + d
    }
    if (10 > m) {
        m = "0" + m
    }
    if (10 > h) {
        h = "0" + h
    }
    if (10 > mi) {
        mi = "0" + mi
    }
    if (10 > se) {
        se = "0" + se
    }
    document.getElementById("clockDiv").innerHTML = a + " | " + d + " / " + m + " / " + y + " | " + h + ":" + mi + ":" + se;
}
$(document).ready(function() {
    $('a.login-window').click(function() {
        //lấy giá trị thuộc tính href - chính là phần tử "#login-box"
        var loginBox = $(this).attr('href');
        
        //cho hiện hộp đăng nhập trong 300ms
        $(loginBox).fadeIn(300);
 
        // thêm phần tử id="over" vào sau body
        $('body').append('<div id="over">');
        $('#over').fadeIn(300);
        return false;
 });
 
 // khi click đóng hộp thoại
 $(document).on('click', "a.close, #over", function() {
       $('#over, .login').fadeOut(300 , function() {
           $('#over').remove();
       });
      return false;
 });
});



