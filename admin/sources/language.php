<?php
$table = "language";

switch (true) {
	case $act=="list":
		$items = getItems(array("table" => $table, "orderby" => array("`index`"), "limit" => 10, "pagination" => true));
		$paging = $pagination->getSource("&p");
		$template = "language/list";
		break;
	case $act=="edit":
		if($_REQUEST['id'] != "") {
			$item = getItems(array("table" => $table, "id" => $_REQUEST['id']));
			if(!is_array(@$item)) show_error();
		}
		$template = "language/edit";
		break;
	case $act=="save":
		if(isset($_POST['savebtn'])) {
			if(@$_POST['url'] != "")
				$_POST['thumbnail'] = $_POST['url'];
			$data = array("title", "uri", "thumbnail", "index", "enable");
			if(@$_POST['id'] != "")
				$condition = "where id like '{$_POST['id']}'";
			if(saveItem(array("table" => $table, "data" => $data, "condition" => @$condition)))
				redirect( preg_replace('/(&id=\d*)/', '', str_replace("&act=save", "&act=list", getCurrentPageURL())) );
			else {
				alert("Lỗi lưu dữ liệu!");
				back();
			}
		}
		else {
			alert("Không nhận được dữ liệu!");
			back();
		}
		break;
	default:
		show_error();
		break;
}
?>