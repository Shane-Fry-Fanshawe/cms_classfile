<?php

	function redirect_to($location) {
		if($location != NULL) {
			header("Location: {$location}");
			exit;
		}
	}

//Multi Page functions

function multiReturns($value){
	//on the php he set it to 6, and that gets passed to $value

	$addPassed = $value;
	$newResult = 7 + $addPassed;
	//echo $newResult;

	$newResult2 = $value * 12;

	return array($newResult, $newResult2);


}




?>
