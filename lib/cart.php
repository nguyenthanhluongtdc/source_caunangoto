<?php
$cart = array( "total_quantity" => 0, "total_price" => 0.0, "total_price_del" => 0.0, "product" => array() );
foreach ($_SESSION['cart'] as $id => $quantity) {
	$id_n = $id;
	if(is_array($_SESSION['cart_combo'][$id])) {
		$id_n = explode("_", $id);
		$r_product = getItems(array("table" => "product", "id" => $id_n[0]));
	}
	else
		$r_product = getItems(array("table" => "product", "id" => $id_n));
	$r_product['quantity'] = $quantity;
	if(floatval($r_product['price_sale']) > 0) {
		$price = floatval($r_product['price_sale']);
		if(floatval($r_product['price']) > 0)
			$price_del = floatval($r_product['price']);
		else
			$price_del = 0;
	}
	elseif(floatval($r_product['price']) > 0) {
		$price = floatval($r_product['price']);
		$price_del = 0;
	}
	else {
		$price = 0;
		$price_del = 0;
	}
	$r_product['title'] = '<a href="'.getURL($r_product['uri']).'" target="_blank">'.$r_product['title'].'</a>';
	if(is_array($_SESSION['cart_combo'][$id])) {
		$r_product['title'] = '<a href="'.getURL($r_product['uri']).'" target="_blank">'.$r_product['title'].'</a> (<font style="color:red;">'.format($price).$layout['product-item']['text-2']['value'].'</font> - <del class="text-muted">'.format($price_del).$layout['product-item']['text-2']['value'].'</del>)';
		foreach ($_SESSION['cart_combo'][$id] as $r_combo) {
			$price += floatval($r_combo['price_sale']);
			$price_del += floatval($r_combo['price_origin']);
			$r_cp = getItems(array("table" => "product", "id" => $r_combo['id']));
			$r_product['title'] .= '<font style="font-size:12px;"><br>+&nbsp;<a href="'.getURL($r_cp['uri']).'" target="_blank">'.$r_cp['title'].'</a> (<font style="color:red;">'.format($r_combo['price_sale']).$layout['product-item']['text-2']['value'].'</font> - <del class="text-muted">'.format($r_combo['price_origin']).$layout['product-item']['text-2']['value'].'</del>)</font>';
		}
	}
	$cart['total_quantity'] += $quantity;
	$cart['total_price'] += $price * $quantity;
	$cart['total_price_del'] += $price_del * $quantity;
	if($price > 0) {
		$r_product['total_price'] = format($price * $quantity)."đ";
		$r_product['price'] = format($price)."đ";
	}
	else {
		$r_product['total_price'] = "Liên hệ";
		$r_product['price'] = "Liên hệ";
	}
	if($price > 0) {
		$r_product['total_price_del'] = format($price_del * $quantity)."đ";
		$r_product['price_del'] = format($price_del)."đ";
	}
	else {
		$r_product['total_price_del'] = "";
		$r_product['price_del'] = "";
	}
	$r_product['id'] = $id;
	$cart['product'][] = $r_product;
}
if(floatval($cart['total_price']) > 0)
	$cart['total_price'] = format($cart['total_price']) . "đ";
else
	$cart['total_price'] = "Liên hệ";
if(floatval($cart['total_price_del']) > 0)
	$cart['total_price_del'] = format($cart['total_price_del']) . "đ";
else
	$cart['total_price_del'] = "";
?>
<script>
	function cartAjax(obj) {
		$.ajax({
			url: "<?= getAjaxURL() ?>ajax_cart.php",
			method: "post",
			data: obj,
			dataType: "json",
			success: function (json) {
				if(json.result == 1 || json.result == "1") {
					if(obj.action == "clearfromcart") {
						// $("html, body").animate({scrollTop:0},0);
						// window.location.reload(true);
						// return;
					}
					if(obj.action == "removefromcart" && $(".table-cart .tr-product").length <= 1) {
						// $("html, body").animate({scrollTop:0},0);
						// window.location.reload(true);
						// return;
					}
					cartReload();
					cartAlert(obj.msg, obj.lbl);
					if(obj.callback != undefined) {
						setTimeout(function () {
							obj.callback();
						}, 100);
					}
				}
				else {
					cartAlert("<?= $lang['column_22'] ?>", "label-danger");
				}
			},
			error: function (err) {
				console.log(err);
			}
		});
	}
	function cartReload() {
		if($(".cart-link").length > 0)
			$(".cart-link").load(" .cart-link > font");
		if($(".cart-table-container").length > 0)
			$(".cart-table-container").load(" .cart-table-container > .cart-table");
	}
	function cartAlert(msg, cls) {
		$(".cart-msg").remove();
		var lbl = $(document.createElement(`label`));
		lbl.attr("class", "cart-msg label " + cls);
		lbl.css("pointer-events", "none");
		lbl.html(msg);
		$("body").append(lbl);
		setTimeout(function () {
			lbl.animate({ "opacity": 1, "margin-top": "80px" }, 1000);
		}, 0);
		setTimeout(function () {
			lbl.animate({ "opacity": 0 }, 5000);
		}, 3000);
		setTimeout(function () {
			lbl.remove();
		}, 8000);
	}
	function cartSubmit() {
		if (confirm("Bạn chắc chắn muốn tiếp tục!"))
			return true;
		else
			return false;
	}
</script>
<style>
	.cart-msg {
		position: fixed;
		z-index: 999999999;
		top: 0;
		left: 50%;
		font-size: 18px;
		padding: 7px 10px;
		box-shadow: 0 0 3px #000;
		opacity: 0;
		-webkit-transform: translate(-50%, -100%);
		-ms-transform: translate(-50%, -100%);
		-o-transform: translate(-50%, -100%);
		transform: translate(-50%, -100%);
	}
</style>