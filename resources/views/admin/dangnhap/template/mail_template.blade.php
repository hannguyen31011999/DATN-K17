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
                <td align="center" bgcolor="" style="padding: 40px 0 30px 0;">
                 <img src="https://image.freepik.com/free-vector/cupcake-logo-sweet-cake-logo-cake-shop-logo-cake-bakery-logo-vector-logotemplate_180795-14.jpg" width="300" height="250" style="display: block;" />
                </td>
             </tr>
             <tr>
              <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                 <table border="0" cellpadding="0" cellspacing="0" width="100%">
                     <tr>
                      <td>
                        Xin chào {{$name}}
                      </td>
                     </tr>
                     <tr>
                      <td>
                         Mã xác nhận:<a href="">{{$code}}</a>
                      </td>
                     </tr>
                     <tr>
                      <td style="padding: 20px 0  0 0;">
                        Để thay đổi mật khẩu tài khoản Alley Baker của bạn, bạn vui lòng nhấn vào đường link dưới đây:<br>
                      </td>
                     </tr>
                    <tr>
                      <td>
                        <p style="font-weight: bold;">URL:<a href="{{url('/password/reset')}}">{{'http://localhost:8000/password/reset?href='.$id}}</a></p>
                      </td>
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