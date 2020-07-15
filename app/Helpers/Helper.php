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

