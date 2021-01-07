<?php
$type = $_REQUEST['type'];
$table = "category";
if($type == "" && !in_array($act, array( "quick-add", "quick-edit", "edit", "list" ))) show_error();
// $row_type = array("product" => "Danh mục sản phẩm", "post" => "Danh mục bài viết", "page" => "Danh mục trang");
$row_language = getItems(array("table" => "language", "orderby" => array("`index`")));

$title_suffix = array("product" => "sản phẩm", "post" => "bài viết", "page" => "trang");
$filterStr = $type."_".$com."_filter";

if (is_file("./json/{$table}.json")) {
	$attribute_enable = getObjectVars(json_decode(file_get_contents("./json/{$table}.json")));
	$row_type = $attribute_enable['type'];
}
else {
	$attribute_enable = $row_type = array();
}

// switch (true) {
// 	case $_GET['type'] == "page":
// 		$attribute_enable["edit"]["editor"]["description"] = "Mô tả (nếu có)";
// 		$attribute_enable["edit"]["editor"]["content"] = "Nội dung";
// 		break;
	
// 	default:
// 		# code...
// 		break;
// }

$user = getUser();
switch (true) {
	case $act=="list":
		$filter_items = getItems(array("table" => $table, "condition" => "where type like '{$type}' and `lock`<1 order by `index`"));
		// $filter_module = getItems(array("table" => "module"));
		$items = getItems(array("table" => $table, "condition" => "where type like '{$type}' ".getFilter($filterStr, "and")." and (`lock`<1 or ".($user['type']=="master"?"true":"false").") order by parent_id", "limit" => 20, "pagination" => true));
		$paging = $pagination->getSource("&p");
		$template = "category/list";
		$title = "Danh mục " . $title_suffix[$type] . " (" . $pagination->count_item . ")";
		break;
	case $act=="edit":
		$row_category = getItems(array("table" => $table, "condition" => "where id not like '{$_REQUEST['id']}' and (`lock`<1 or ".($user['type']=="master"?"true":"false").") order by type desc, `index`"));
		// $row_module = getItems(array("table" => "module"));
		if($_REQUEST['id'] != "") {
			$item=getItems(array("table" => $table, "id" => $_REQUEST['id']));
			if (@$item['checkbox_admin'] == "")
				$item['checkbox_admin'] = $attribute_enable['edit']['checkbox_admin_default'];
				// $item['checkbox_admin'] = implode(",", array_keys($attribute_enable['edit']['checkbox_admin']['list']));
			$checkbox_admin = explode(",", $item['checkbox_admin']);
			if(!is_array($item)) { show_error(); exit(1); }
			$row_translate = array();
			foreach($row_language as $r_language):
				$row_translate[] = getTranslate($table, $r_language['id'], $_REQUEST['id']);
			endforeach;
			$title = "Cập nhật danh mục " . $title_suffix[$type] . " '" . subString($row_translate[0]['title'], 0, 5) . "'";
		}
		else {
			if (@$item['checkbox_admin'] == "")
				$item['checkbox_admin'] = $attribute_enable['edit']['checkbox_admin_default'];
				// $item['checkbox_admin'] = implode(",", array_keys($attribute_enable['edit']['checkbox_admin']['list']));
			$checkbox_admin=explode(",", $item['checkbox_admin']);
			$title = "Thêm danh mục " . $title_suffix[$type];
		}
		$template = "category/edit";
		break;
	case $act=="save":
		if(isset($_POST['savebtn'])) {
			$data = array("lock", "title", "uri", "thumbnail", "video", "svg", "related_id", "type", "index", "enable", "popular", "admin", "checkbox_admin");
			foreach ($attribute_enable['edit']['category'] as $k_attr => $v_attr) {
				if(!in_array($k_attr, $data))
					$data[] = $k_attr;
			}
			foreach ($attribute_enable['edit']['checkbox'] as $k_attr => $v_attr) {
				if(!in_array($k_attr, $data))
					$data[] = $k_attr;
				$_POST[$k_attr] = implode(",", $_POST[$k_attr]);
			}
			if(!in_array("checkbox_admin", $data))
				$data[] = "checkbox_admin";
			$_POST["checkbox_admin"] = implode(",", $_POST["checkbox_admin"]);
			if($_POST['link']!="")
				$_POST['uri'] = $_POST['link'];
			if($_POST['url']!="")
				$_POST['thumbnail'] = $_POST['url'];
			$_POST["title"] = $_POST["title_{$row_language[0]['uri']}"];
			if($_POST['id']!="") {
				$maxId = $_POST['id'];
				$condition = "where id like '{$_POST['id']}'";
			}
			else {
				$maxId = $db->getMaxId($table);
				$data[] = "create_date";
			}
			if(!saveItem(array("table" => $table, "data" => $data, "condition" => @$condition))) {
				alert("Lỗi lưu dữ liệu!");
				back();
			}
			foreach($row_language as $r_language):
				$data = array("title", "keyword", "desc", "h1", "h2", "h3");
				foreach (@$attribute_enable['edit']['input'] as $k_attr => $v_attr) {
					if(!in_array($k_attr, $data))
						$data[] = $k_attr;
				}
				foreach (@$attribute_enable['edit']['text'] as $k_attr => $v_attr) {
					if(!in_array($k_attr, $data))
						$data[] = $k_attr;
				}
				foreach (@$attribute_enable['edit']['editor'] as $k_attr => $v_attr) {
					if(!in_array($k_attr, $data))
						$data[] = $k_attr;
				}
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
			if(@$_POST['id'] != "")
				$db->query("delete from #_category_extend where type like 'image' and category_id like '{$maxId}'");
			if (is_array(@$_POST['image']) && !empty($_POST['image'])) {
				foreach ($_POST['image'] as $k_image => $r_image) {
					$data_image = array("id" => $db->getMaxId("category_extend"), "category_id" => $maxId, "thumbnail" => $r_image, "enable" => 1, "index" => $k_image+1, "type" => "image");
					$db->setTable("category_extend");
					$db->setCondition("");
					if(!$db->insert($data_image)) {
						alert("Lỗi lưu hình khác!");
						back();
					}
				}
			}
			if($_POST['quick_add'] == "1" || $_POST['quick_add'] == 1) {
				closeWindow(false);
			}
			else {
				if ($_POST['edit'] == "1" || $_POST['edit'] == 1)
					redirect( str_replace("&act=save", "&act=edit", getCurrentPageURL())."&id={$_POST['id']}" );
				else
					redirect( preg_replace('/(&id=\d*)/', '', str_replace("&act=save", "&act=list", getCurrentPageURL())) );
			}
		}
		else {
			alert("Không nhận được dữ liệu!");
			back();
		}
		break;
	case $act=="quick-add":
		$row_category = getItems(array("table" => $table, "condition" => "where id not like '{$_REQUEST['id']}' order by type desc, `index`"));
		// $row_module = getItems(array("table" => "module"));
		if($_REQUEST['id'] != "") {
			$item=getItems(array("table" => $table, "id" => $_REQUEST['id']));
			if (@$item['checkbox_admin'] == "")
				$item['checkbox_admin'] = $attribute_enable['edit']['checkbox_admin_default'];
				// $item['checkbox_admin'] = implode(",", array_keys($attribute_enable['edit']['checkbox_admin']['list']));
			$checkbox_admin=explode(",", $item['checkbox_admin']);
			if(!is_array($item)) { show_error(); exit(1); }
			$row_translate = array();
			foreach($row_language as $r_language):
				$row_translate[] = getTranslate($table, $r_language['id'], $_REQUEST['id']);
			endforeach;
			$title = "Cập nhật danh mục '" . subString($row_translate[0]['title'], 0, 5) . "'";
		}
		else {
			if (@$item['checkbox_admin'] == "")
				$item['checkbox_admin'] = $attribute_enable['edit']['checkbox_admin_default'];
				// $item['checkbox_admin'] = implode(",", array_keys($attribute_enable['edit']['checkbox_admin']['list']));
			$checkbox_admin=explode(",", $item['checkbox_admin']);
			$title = "Thêm danh mục";
		}
		$template = "category/quick_add";
		break;
	default:
		show_error();
		break;
}
?>