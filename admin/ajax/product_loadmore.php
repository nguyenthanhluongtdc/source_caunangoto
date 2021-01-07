<?php
session_start();
@define ( '_template' , '../../templates/');
@define ( '_source' , '../../sources/');
@define ( '_lib' , '../../lib/');
include_once _lib."config.php";
include_once _lib."class.database.php";
// include_once _lib."pagination.php";
include_once _lib."functions.php";
$db = new database($config['database']);
// $where = "where enable>0 order by level desc, create_date desc limit {$_POST['current']}, {$_POST['step']}";
// if ($_POST['product_id'] != "") {
// 	$id_list = explode(",", $_POST['category_id']);
// 	$whr = array();
// 	foreach ($id_list as $id_l) {
// 		$whr[] = "find_in_set({$id_l}, category_id)";
// 	}
// 	if (!empty($whr))
// 		$whr = "(".implode(" and ", $whr).")";
// 	else
// 		$whr = "true";
// 	$where = "where {$whr} and id not like '{$_POST['product_id']}' and enable>0 order by level desc, create_date desc limit {$_POST['current']}, {$_POST['step']}";
// }
// elseif ($_POST['category_id'] != "") {
// 	$where = "where find_in_set({$_POST['category_id']}, category_id) and enable>0 order by level desc, create_date desc limit {$_POST['current']}, {$_POST['step']}";
// }
// $row_product = getItems(array("table" => "product", "condition" => $where));
// if(is_array($row_product) && !empty($row_product)) {
// 	$continue = intval($_POST['count']) > (intval($_POST['current']) + intval($_POST['step'])) ? "1" : "0";
// 	$result = array();
// 	foreach ($row_product as $r_product) {
// 		$result[] = getProductItem($r_product);
// 	}
// 	die(json_encode(array("result" => "1", "continue" => $continue, "data" => $result, "current" => (intval($_POST['current']) + count($row_product)))));
// }
// else
// 	die(json_encode(array("result" => "0")));
// function getProductItem($r_product) {
// 	return sprintf('<div class="product-item display-flex" style="opacity: 0;">
// 		<div class="item-thumbnail display-flex flex-center-center">
// 			<img class="flex-shrink-0" src="%s">
// 		</div>
// 		<div class="item-heading display-flex flex-column flex-center-center">
// 			<div class="item-title text-center">%s</div>
// 			<div>
// 				<a href="%s.html" class="btn btn-success item-btn">Xem thêm</a>
// 			</div>
// 		</div>
// 	</div>', $r_product['thumbnail'], $r_product['title'], $_POST['lang'].$r_product['uri']);
// }	

	if(isset($_POST['pageCurrent'])){
		$pageCurrent = $_POST['pageCurrent'];
	}else $error .= "has error"; 

	if(isset($_POST['numberProduct'])){
		$numberProduct = $_POST['numberProduct'];
	}else $error = "has error";

	$start = ($pageCurrent * $numberProduct);
	
	$numberProduct +=1;

	$result = getItems(array('table'=>'product','condition'=> 'where enable > 0 and popular2 > 0 limit '.$start.','.$numberProduct.' ')) ;

	echo json_encode($result)

?>