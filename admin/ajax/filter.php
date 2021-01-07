<?php 

	session_start();
		
	if (@$_POST['price'] != ""){
		$_SESSION['price'] = array("min" => implode("", array_slice(explode(":", $_POST['price']), 0, 1)), "max" => implode("", array_slice(explode(":", $_POST['price']), 1, 1)));
	}

die(json_encode(array("result" => 1,"data_array"=>$_SESSION['price'])));
?>