<?php
session_start();

if (@$_POST['price'] != "")
	$_SESSION['product_filter2']['price'] = array("min" => implode("", array_slice(explode(":", $_POST['price']), 0, 1)), "max" => implode("", array_slice(explode(":", $_POST['price']), 1, 1)));
// if (is_array($_POST['checked_brand']) && !empty($_POST['checked_brand'])) {
	
// 	$_SESSION['product_filter2']['checked_brand'] = $_POST['checked_brand'];

// }else{
// 	unset($_SESSION['product_filter2']['checked_brand']);
// }

die(json_encode(array("result" => 1,'data'=>$_SESSION['product_filter2'])));
?>