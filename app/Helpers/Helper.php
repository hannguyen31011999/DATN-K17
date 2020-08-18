<?php

if (! function_exists('convert_phone')) {
	function convert_phone($phone)
	{
		for($i=0;$i<strlen($phone);$i++){
			if($i>=4&&$i<7){
				$phone[$i] = '*';
			}
		}
		return $phone;
	}
}

if (! function_exists('randomCode')) {
	function randomCode($length)
	{
		$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		$charactersLength = strlen($characters);
		$random = '';
		for ($i = 0; $i < $length; $i++) {
        	$random .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $random;
	}
}

if (! function_exists('thousandSeperator')) {
	function thousandSeperator($number)
	{
		$thounsand = $number/1000;
		if(($thounsand/1000)==1)
		{
			$milion = $thounsand/1000;
			return strval($milion)."."."000"."."."000";
		}
		else if(($thounsand/1000)>1)
		{
			$milion = $thounsand/1000;
			$songuyen = (int)($milion);
			$sodu = ($milion-$songuyen)*1000;
			if($sodu!=0)
			{
				if($sodu<100)
				{
					return strval($songuyen).'.0'.$sodu."."."000";
				}
				return strval($songuyen).'.'.$sodu."."."000";
			}
			return strval($songuyen).'.'."000"."."."000";
		}
		else
		{
			if($thounsand-(int)$thounsand!=0)
			{
				$songuyen = (int)($thounsand)+1;
				$sodu = $thounsand-(int)($thounsand);
				$sodu *=10;
				return strval($songuyen)."."."000";
			}
			return strval($thounsand)."."."000";
		}
	}
}

if (! function_exists('slipString')) {
	function slipString($str)
	{
		for ($i=0; $i < strlen($str); $i++) { 
			if($str[$i]==" "||$str[$i]==",")
			{
				$str[$i] = "-";
			}
		}
		return $str;
	}
}

if (! function_exists('slipContent')) {
	function slipContent($str)
	{
		return substr($str,0,120);
	}
}

if (! function_exists('utf8convert')) {
		function utf8convert($str) {
		    if(!$str) return false;

		    $utf8 = array(

		    'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',

		    'd'=>'đ|Đ',

		    'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',

		    'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',

		    'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',

		    'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',

		    'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',

		    );

		    foreach($utf8 as $ascii=>$uni) $str = preg_replace("/($uni)/i",$ascii,$str);

			return $str;
		}
}

if (! function_exists('utf8tourl')) {
	function utf8tourl($text){
        $text = strtolower(utf8convert($text));
        $text = str_replace( "ß", "ss", $text);
        $text = str_replace( "%", "", $text);
        $text = preg_replace("/[^_a-zA-Z0-9 -] /", "",$text);
        $text = str_replace(array('%20', ' '), '-', $text);
        $text = str_replace("----","-",$text);
        $text = str_replace("---","-",$text);
        $text = str_replace("--","-",$text);
        $text = str_replace(",","-",$text);
		return $text;
	}
}

