<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\News;
class NewsController extends Controller
{
    private $vnp_TmnCode = "LFKGQ0FH"; //Mã website tại VNPAY 
    private $vnp_HashSecret = "IPCQSWSJZHHOWPDWPODJDLZTAHCAIOZL"; //Chuỗi bí mật
    private $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    private $vnp_Returnurl = "https://suoitien2.000webhostapp.com/checkout";
    //
    public function index()
    {
    	$list = News::paginate(4);
    	return view('user.baiviet.blog',compact('list'));
    }

    public function detailPost($url,$id)
    {
    	$news = News::find($id);
    	return view('user.baiviet.detail_blog',compact('news'));
    }

    // Ngân hàng   NCB
    // Số thẻ  9704198526191432198
    // Tên chủ thẻ NGUYEN VAN A
    // Ngày phát hành  07/15
    // Mật khẩu OTP    123456

    public function CheckoutVnPay(Request $request)
    {
        session(['cost_id' => $request->id]);
        session(['url_prev' => url()->previous()]);
        $vnp_TmnCode = "LFKGQ0FH"; //Mã website tại VNPAY 
        $vnp_HashSecret = "IPCQSWSJZHHOWPDWPODJDLZTAHCAIOZL"; //Chuỗi bí mật
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "https://suoitien2.000webhostapp.com/checkout";
        $vnp_TxnRef = date("YmdHis"); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $request->amount*100;
        $vnp_Locale = 'vn';
        $vnp_IpAddr = request()->ip();

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
           // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        return redirect($vnp_Url);
    }

    public function return(Request $request)
    {
        $url = session('url_prev','/');
        if($request->vnp_ResponseCode == "00") {
            $this->apSer->thanhtoanonline(session('cost_id'));
            return redirect($url)->with('success' ,'Đã thanh toán phí dịch vụ');
        }
        session()->forget('url_prev');
        return redirect($url)->with('errors' ,'Lỗi trong quá trình thanh toán phí dịch vụ');
    }
}
