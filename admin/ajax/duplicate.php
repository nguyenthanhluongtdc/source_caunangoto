<?php
session_start();
@define ( '_template' , '../../templates/');
@define ( '_source' , '../../sources/');
@define ( '_lib' , '../../lib/');
include_once _lib."config.php";
include_once _lib."class.database.php";
include_once _lib."functions.php";
$db = new database($config['database']);
$logged = @$_COOKIE['user']['username'] != "";
if(!$logged) die(0);

$table = $_POST['table'];
$id = $_POST['id'];

$db->setTable($table);
$db->setCondition("where id like '{$id}'");
$db->select();
if($db->num_rows() <= 0) {
	die(json_encode(array("status" => 0)));
	exit(1);
}
$item = $db->fetch_array();
$item['id'] = $db->getMaxId($table);
$create_date = @$item['create_date'];
if($item['uri'] != "") {
	$item['title'] = implode("", array_slice(explode(" - Copy", $item['title']), 0, 1)) . " - Copy";
	for ($i=1; true; $i++) {
		$uri = changeTitle($item['title'])."-{$i}";
		$unBreak = getItems(array("table" => $table, "condition" => "where uri like '{$uri}'", "id" => 0));
		if(!is_array($unBreak) || empty($unBreak))
			break;
		else
			$create_date = @$unBreak['create_date'];
	}
	$item['title'] .= " ({$i})";
	if(@$item['uri'] != "") {
		$item['uri'] = $uri;
		$item['uri'] = checkURI($table, $item);
	}
}
if(@$item['create_date'] != "") {
	$item['create_date'] = floatval($create_date) - 1;
}
$result = $db->insert($item);
if(in_array($table, array("category", "product", "product_tab", "post", "module"))):
	$db->setTable("translate");
	$db->setCondition("where item_id like '{$id}' and table_name like '{$table}'");
	$db->select();
	if($db->num_rows() <= 0) {
		die(json_encode(array("status" => 1, "id" => $item['id'])));
		exit(1);
	}
	$items = $db->result_array();
	for ($j=0; $j<count($items); $j++):
		$items[$j]['id'] = $db->getMaxId("translate");
		$items[$j]['item_id'] = $item['id'];
		$items[$j]['title'] = implode("", array_slice(explode(" - Copy", $items[$j]['title']), 0, 1)) . " - Copy ({$i})";
		$db->insert($items[$j]);
	endfor;
endif;
die(json_encode(array("status" => 1, "id" => $item['id'])));
?>