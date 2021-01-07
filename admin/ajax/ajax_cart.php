<?php
session_start();
switch (true) {
	case $_POST['action'] == "addtocart" && $_POST['id'] != "":
		if(intval($_POST['quantity']) <= 0)
			$_POST['quantity'] = 1;
		if(@$_SESSION['cart'][$_POST['id']] != "")
			$_SESSION['cart'][$_POST['id']] += intval($_POST['quantity']);
		else{
			$_SESSION['cart'][$_POST['id']] = intval($_POST['quantity']);
		}
		$_SESSION['cart_type'][$_POST['id']] = @$_POST['type'];
		$_SESSION['cart_color'][$_POST['id']] = @$_POST['color_id'];
		if(isset($_POST['combo']) && !is_array($_SESSION['cart_combo'][$_POST['id']])) {
			foreach ($_POST['combo'] as $r_combo) {
				if(!is_array($_SESSION['cart_combo'][$_POST['id']]))
					$_SESSION['cart_combo'][$_POST['id']] = array();
				$_SESSION['cart_combo'][$_POST['id']][] = array(
					"id" => $r_combo['id'],
					"price_sale" => $r_combo['price_sale'],
					"price_origin" => $r_combo['price_origin']
				);
			}
		}
		break;
	case $_POST['action'] == "removefromcart" && $_POST['id'] != "":
		unset($_SESSION['cart'][$_POST['id']]);
		unset($_SESSION['cart_type'][$_POST['id']]);
		unset($_SESSION['cart_combo'][$_POST['id']]);
		unset($_SESSION['cart_color'][$_POST['id']]);
		break;
	case $_POST['action'] == "clearfromcart":
		unset($_SESSION['cart']);
		unset($_SESSION['cart_type']);
		unset($_SESSION['cart_combo']);
		unset($_SESSION['cart_color']);
		break;
	case $_POST['action'] == "updatefromcart" && $_POST['id'] != "" && ($_POST['quantity'] != "" || $_POST['color_id'] != ""):
		if(isset($_SESSION['cart'][$_POST['id']])) {
			if($_POST['quantity'] != "")
				$_SESSION['cart'][$_POST['id']] = $_POST['quantity'];
			if($_POST['color_id'] != "")
				$_SESSION['cart_color'][$_POST['id']] = $_POST['color_id'];
		}
		else
			die(json_encode(array("result" => 0)));
		break;
	
	default:
		break;
}
die(json_encode(array("result" => 1, "post" => $_POST, "session" => $_SESSION)));
?>