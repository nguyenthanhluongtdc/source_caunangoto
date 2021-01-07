<?php
$table = "contact";
if (is_file("./json/{$table}.json")) {
	$row_type = getObjectVars(json_decode(file_get_contents("./json/{$table}.json")));
	if (@$row_type[$_GET['type']] == "")
		show_error();
}
else
	$row_type = array();

switch (true) {
	case $act=="list":
		$items = getItems(array("table" => $table, "condition" => "where type like '{$_GET['type']}' order by create_date desc, email"));
		$items = $pagination->paging($items, 20, $_GET['p']);
		$paging = $pagination->getSource("&p");
		$template = "contact/list";
		break;
	case $act=="view":
		if($_REQUEST['id'] != "") {
			$item = getItems(array("table" => $table, "id" => $_REQUEST['id']));
			$row_attribute = array(
				"Họ tên" => $item['name'],
				"Giới tính" => $item['gender'],
				"Điện thoại" => $item['tel']!="..." ? '<a href="tel:'.$item['tel'].'">'.$item['tel'].'</a>' : "...",
				"Email" => '<a href="mailto:'.$item['email'].'">'.$item['email'].'</a>',
				"Độ tuổi" => $item['age'],
				"Địa chỉ" => $item['address'],
				// "First" => $item['first_tag'],
				"Sản phẩm" => ($item['third_tag']!="..." && $item['second_tag']!="...") ? '<a href="'.$item['third_tag'].'">'.$item['second_tag'].'</a>' : "...",
				// "Third tag" => $item['third_tag'],
				"Ngày tạo" => date('d/m/Y', $item['create_date']),
				"Nội dung" => $item['content'],
			);
		}
		$template = "contact/view";
		break;
	// case $act=="save":
	// 	if(isset($_POST['savebtn'])) {
	// 		$data = array("hoten", "diachi", "dienthoai", "email", "giaban", "noidung", "ngaygui");
	// 		if(@$_POST['id'] != "")
	// 			$condition = "where id like '{$_POST['id']}'";
	// 		if(saveItem(array("table" => $table, "data" => $data, "condition" => @$condition)))
	// 			redirect( preg_replace('/(&id=\d*)/', '', str_replace("&act=save", "&act=list", getCurrentPageURL())) );
	// 		else {
	// 			alert("Lỗi lưu dữ liệu!");
	// 			back();
	// 		}
	// 	}
	// 	else {
	// 		alert("Không nhận được dữ liệu!");
	// 		back();
	// 	}
	// 	break;
	default:
		show_error();
		break;
}
?>