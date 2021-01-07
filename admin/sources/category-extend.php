<?php
$type = @$_REQUEST['type'];
if($type == "") show_error();
$table = "category_extend";
$row_language = getItems(array("table" => "language", "orderby" => array("`index`")));
$category = getItems(array("table" => "category", "id" => $_REQUEST['category_id']));

if(is_array(@$category)) {
	$r_tmp = getTranslate("category", $row_language[0]['id'], $category['id']);
	foreach($r_tmp as $column => $value):
		$category[$column] = $value;
	endforeach;
}
else
	show_error();

if (is_file("./json/{$table}.json")) {
	$attribute_enable = getObjectVars(json_decode(file_get_contents("./json/{$table}.json")));
	$attribute_enable = arraySync($attribute_enable);
	if (!is_array($attribute_enable[$_GET['type']]))
		$attribute_enable[$_GET['type']] = $attribute_enable['default'];
}
else
	$attribute_enable = array();

switch (true) {
	case $act=="list":
		$items = getItems(array("table" => $table, "condition" => "where type like '{$_GET['type']}' and category_id like '{$category['id']}'", "limit" => 20, "pagination" => true));
		$paging = $pagination->getSource("&p");
		$template = "category-extend/list";
		break;
	case $act=="edit":
		if($_REQUEST['id'] != "") {
			$item = getItems(array("table" => $table, "id" => $_REQUEST['id']));
			if(!is_array($item)) { show_error(); exit(1); }
			$row_translate = array();
			foreach($row_language as $r_language):
				$row_translate[] = getTranslate($table, $r_language['id'], $_REQUEST['id']);
			endforeach;
		}
		$template = "category-extend/edit";
		break;
	case $act=="save":
		if(isset($_POST['savebtn'])) {
			if(count(explode("www.youtube.com", @$_POST['link'])) > 1 || count(explode("youtu.be", @$_POST['link'])) > 1) {
				if(@$_POST['thumbnail'] == "" || !is_file("../".@$_POST['thumbnail']))
					$_POST['thumbnail'] = getYoutubeImg($_POST['link']);
			}
			$data = array("title", "category_id", "thumbnail", "popular", "enable", "index", "type");
			$_POST['title'] = $_POST['title_'.$row_language[0]['uri']];
			if($_POST['id']!="")
				$condition = "where id like '{$_POST['id']}'";
			else
				$maxId = $db->getMaxId($table);
			if(!saveItem(array("table" => $table, "data" => $data, "condition" => @$condition))) {
				alert("Lỗi lưu dữ liệu!");
				back();
			}
			foreach($row_language as $r_language):
				$data = array("title");
				foreach ($attribute_enable[$_GET['type']]['edit']['input'] as $k_attr => $v_attr)
					if(!in_array($k_attr, $data))
						$data[] = $k_attr;
				foreach ($attribute_enable[$_GET['type']]['edit']['text'] as $k_attr => $v_attr)
					if(!in_array($k_attr, $data))
						$data[] = $k_attr;
				foreach ($attribute_enable[$_GET['type']]['edit']['editor'] as $k_attr => $v_attr)
					if(!in_array($k_attr, $data))
						$data[] = $k_attr;
				if(@$_POST['id'] != "") {
					$translate = getItems(array("table" => "translate", "id" => 0, "condition" => "where item_id like '{$_POST['id']}' and language_id like '{$r_language['id']}' and table_name like '{$table}'"));
					if(!is_array($translate) || empty($translate))
						$db->query("insert into tbl_translate (id, item_id, language_id, table_name) values (".$db->getMaxId("translate").", {$_POST['id']}, {$r_language['id']}, '{$table}')");
					$condition = "where item_id like '{$_POST['id']}' and language_id like '{$r_language['id']}' and table_name like '{$table}'";
				}
				else {
					$data = array_merge($data, array( "item_id", "language_id", "table_name" ));
					$_POST["item_id_{$r_language['uri']}"] = $maxId;
					$_POST["language_id_{$r_language['uri']}"] = $r_language['id'];
					$_POST["table_name_{$r_language['uri']}"] = $table;
				}
				if(!saveItem(array("table" => "translate", "data" => $data, "condition" => @$condition, "affix" => $r_language['uri']))) {
					alert("Lỗi lưu dữ liệu!");
					back();
				}
			endforeach;
			redirect( preg_replace('/(&id=\d*)/', '', str_replace("&act=save", "&act=list", getCurrentPageURL())) );
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