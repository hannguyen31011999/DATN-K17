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
			if($sodu<100)
			{
				return strval($songuyen).'.0'.$sodu."."."000";
			}
			return strval($songuyen).'.'.$sodu."."."000";
		}
		else
		{
			return strval($thounsand)."."."000";
		}
	}
}

if (! function_exists('slipString')) {
	function slipString($str)
	{
		for ($i=0; $i < strlen($str); $i++) { 
			if($str[$i]==" ")
			{
				$str[$i] = "-";
			}
		}
		return $str;
	}
}
