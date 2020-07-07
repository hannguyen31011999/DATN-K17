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