<?php
$table = "review";

switch (true) {
	case $act=="list":
		$items = getItems(array("table" => $table, "condition" => "order by create_date desc, email", "limit" => 20, "pagination" => true));
		$paging = $pagination->getSource("&p");
		$template = "review/list";
		break;
	case $act=="reply":
		if(@$_REQUEST['id'] == "")
			show_error();
		else {
			$item = getItems(array("table" => $table, "id" => $_REQUEST['id']));
			$child = getItems(array("table" => $table, "condition" => "where parent_id like '{$_REQUEST['id']}'", "id" => 0));
		}
		$template = "review/reply";
		break;
	case $act=="save":
		if(isset($_POST['savebtn'])) {
			$user = getUser();
			$data = array("reply_review", "reply_name");
			$_POST['reply_name'] = $user['fullname'];
			$condition = "where id like '{$_REQUEST['id']}'";
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