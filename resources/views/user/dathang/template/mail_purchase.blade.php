<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body{
            background: rgb(235, 232, 198);
            font-family: arial;
            font-size: 14px;
        }
    </style>
</head>
<body style="margin: 0; padding: 0;">
 <table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
   <td>
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
         <tr>
          <td>
          <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
             <tr>
                <td align="center" bgcolor="" style="padding: 40px 0 20px 0;">
                 <img src="https://image.freepik.com/free-vector/cupcake-logo-sweet-cake-logo-cake-shop-logo-cake-bakery-logo-vector-logotemplate_180795-14.jpg" width="300" height="250" style="display: block;" />
                </td>
             </tr>
             <tr>
              <td bgcolor="#ffffff" style="padding: 20px 30px 40px 30px;">
                 <table border="0" cellpadding="0" width="100%">
                     <tr>
                      <td colspan="2">
                        <h3 style="margin-left: 10px;">Đơn hàng của bạn:</h3>
                      </td>
                      <td>
                      <td colspan="2">
                        <h4 style="margin-left: 10px;">Ngày đặt:{{date_format($date,"d/m/Y H:i:s")}}</h4>
                      </td>
                     </tr>
                     <tr>
                      <th>
                        Hình ảnh
                      </th>
                      <th>
                        Tên sản phẩm
                      </th>
                      <th>
                        Số lượng
                      </th>
                      <th>
                        Đơn giá
                      </th>
                      <th>
                        Thành tiền
                      </th>
                     </tr>
                     @foreach($cart as $carts)
                     <tr>
                      <th>
                        <img src="https://alleybaker.000webhostapp.com/image/{{$carts->options['img']}}" width="80" height="60">
                      </th>
                      <th>
                        <span>{{$carts->name}}</span>
                      </th>
                      <th>
                        {{$carts->qty}}
                      </th>
                      <th>
                        {{thousandSeperator($carts->price)}}
                      </th>
                      <th>
                        {{thousandSeperator($carts->qty*$carts->price)}}
                      </th>
                     </tr>
                     @endforeach
                     <tr>
                      <th>
                      </th>
                      <th>
                      </th>
                      <th>
                      </th>
                      <th>
                      </th>
                      <th>
                         Tổng tiền: {{$total}}
                      </th>
                     </tr>
                    </table>
                </td>
             </tr>
            </table>
          </td>
         </tr>
        </table>
   </td>
  </tr>
 </table>
</body>
</html>