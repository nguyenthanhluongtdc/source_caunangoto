<?php
$type = @$_REQUEST['type'];
if($type == "") show_error();
$table = "option";
$row_language = getItems(array("table" => "language", "orderby" => array("`index`")));
$filterStr = $com."_filter";
// $category_nam = getItems(array("table" => "option", "condition" => "where uri like 'nam' and enable>0", "id" => 0));
// $category_nu = getItems(array("table" => "option", "condition" => "where uri like 'nu-1' and enable>0", "id" => 0));

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
		$filter_items = getItems(array("table" => "category", "condition" => "where type like 'product' order by `index`"));
		$items = getItems(array("table" => $table, "condition" => "where type like '{$type}' ".getFilter($filterStr, "and")." order by `index`", "limit" => 10, "pagination" => true));
		$paging = $pagination->getSource("&p");
		$template = "option/list";
		break;
	case $act=="edit":
		if($_REQUEST['id'] != "") {
			$item = getItems(array("table" => $table, "id" => $_REQUEST['id']));
			if($_GET['type'] == "couple") {
				$item['female_id'] = explode(",", $item['category_id']);
				$item['male_id'] = $item['female_id'][0];
				$item['female_id'] = $item['female_id'][1];
			}
		}
		$row_translate = array();
		foreach($row_language as $r_language):
			$row_translate[] = getTranslate($table, $r_language['id'], $_REQUEST['id']);
		endforeach;
		$template = "option/edit";
		break;
	case $act=="save":
		if(isset($_POST['savebtn'])) {
			// if(count(explode("www.youtube.com", @$_POST['video'])) > 1 || count(explode("youtu.be", @$_POST['video'])) > 1) {
			// 	if(@$_POST['thumbnail'] == "" || !is_file("../".@$_POST['thumbnail']))
			// 		$_POST['thumbnail'] = getYoutubeImg($_POST['video']);
			// }
			$data = array("title", "thumbnail","video", "link", "enable", "index", "type");
			if ($_GET['uri_enable'] == "1") {
				$data[] = "uri";
				$data[] = "uri_enable";
				$_POST['uri_enable'] = "1";
			}
			foreach ($attribute_enable[$_GET['type']]['edit']['category'] as $k_attr => $v_attr) {
				if(!in_array($k_attr, $data))
					$data[] = $k_attr;
			}
			// if($_GET['type'] == "couple") {
			// 	if($_POST['male_id'] != "" && $_POST['female_id'] != "") {
			// 		$db->query("update #_product set female_id='{$_POST['female_id']}' where id like '{$_POST['male_id']}'");
			// 		$_POST['category_id'] = "{$_POST['male_id']},{$_POST['female_id']}";
			// 		$data[] = "category_id";
			// 	}
			// 	else {
			// 		alert("Đã có lỗi xảy ra!");
			// 		back();
			// 	}
			// }
			foreach ($attribute_enable[$_GET['type']]['edit']['checkbox'] as $k_attr => $v_attr) {
				if(!in_array($k_attr, $data))
					$data[] = $k_attr;
				$_POST[$k_attr] = implode(",", $_POST[$k_attr]);
			}
			$_POST["title"] = $_POST["title_{$row_language[0]['uri']}"];
			if(@$_POST['id'] != "")
				$condition = "where id like '{$_POST['id']}'";
			else
				$maxId = $db->getMaxId($table);
			if(!saveItem(array("table" => $table, "data" => $data, "condition" => @$condition))) {
				alert("Lỗi lưu dữ liệu!");
				back();
			}
			foreach($row_language as $r_language):
				$data = array("keyword", "desc", "h1", "h2", "h3");
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