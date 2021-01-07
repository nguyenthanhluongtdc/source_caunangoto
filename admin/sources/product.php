<?php
$table = "product";
$row_language = getItems(array("table" => "language", "orderby" => array("`index`")));

$filterStr = $com."_filter";

$classify = getLayout("classify");

if (is_file("./json/{$table}.json")) {
	$attribute_enable = getObjectVars(json_decode(file_get_contents("./json/{$table}.json")));
}
else {
	$attribute_enable = array();
}

switch (true) {
	case $act=="list":
		$filter_items = getItems(array("table" => "category", "condition" => "where type like 'product' order by `index`"));
		$items = getItems(array("table" => $table, "condition" => getFilter($filterStr, "where")." order by create_date desc, category_id, title", "limit" => 10, "pagination" => true));
		$paging = $pagination->getSource("&p");
		$template = "product/list";
		break;
	case $act=="edit":
		$row_direction = array( "Đông", "Tây", "Nam", "Bắc", "Đông Nam", "Tây Nam", "Đông Bắc", "Tây Bắc" ); // Bỏ
		$row_promotion_items = array("count" => 5, "items" => getItems(array("table" => "product", "condition" => "where id not like '{$_REQUEST['id']}' order by create_date desc")));
		if($_REQUEST['id'] != "") {
			$item=getItems(array("table" => $table, "id" => $_REQUEST['id']));
			if(!is_array($item)) { show_error(); exit(1); }
			$row_translate = array();
			foreach($row_language as $r_language):
				$row_translate[] = getTranslate($table, $r_language['id'], $_REQUEST['id']);
			endforeach;
		}
		// /* Bỏ
		$row_province = getItems(array("table" => "province", "orderby" => array("name not in ('Hồ Chí Minh', 'Hà Nội')", "type", "name")));
		$row_district = getItems(array("table" => "district", "condition" => "where pid like '{$item['province']}' order by type, name"));
		$row_ward = getItems(array("table" => "ward", "condition" => "where pid like '{$item['district']}' order by type, name"));
		// đến đây */
		$template = "product/edit";
		break;
	case $act=="save":
		if(isset($_POST['savebtn'])) {
			$data = array("title", "uri", "category_id", "brand_id", "combo", "serial","video", "serial_international", "thumbnail", "thumbnail_featured", "svg", "level", "province", "district", "ward", "address", "popular", "popular2", "popular3","product_new", "enable", "status");
			$combo = array();
			foreach ($_POST['combo_id'] as $key => $value) {
				$combo[$value] = $_POST['combo_percent'][$key];
			}
			$_POST['combo'] = json_encode((object)($combo));
			foreach ($attribute_enable['edit']['category'] as $k_attr => $v_attr) {
				if(!in_array($k_attr, $data))
					$data[] = $k_attr;
			}
			foreach ($attribute_enable['edit']['checkbox'] as $k_attr => $v_attr) {
				if(!in_array($k_attr, $data))
					$data[] = $k_attr;
				$_POST[$k_attr] = implode(",", $_POST[$k_attr]);
			}
			$_POST['level'] = intval($_POST['level']);
			$_POST["title"] = $_POST["title_{$row_language[0]['uri']}"];
			if($_POST['id']!="") {
				$maxId = $_POST['id'];
				$condition = "where id like '{$_POST['id']}'";
			}
			else{
				$maxId = $db->getMaxId($table);
				$data[] = "create_date";
			}
			if(!saveItem(array("table" => $table, "data" => $data, "condition" => @$condition))) {
				alert("Lỗi lưu dữ liệu!");
				back();
			}
			foreach($row_language as $r_language):
				$data = array("title", "price_sale", "price", "price_entry", "price_percent", "promotion_price", "promotion_percent", "promotion_type", "keyword", "desc", "h1", "h2", "h3");
				foreach (@$attribute_enable['edit']['input'] as $k_attr => $v_attr)
					if(!in_array($k_attr, $data))
						$data[] = $k_attr;
				foreach (@$attribute_enable['edit']['text'] as $k_attr => $v_attr)
					if(!in_array($k_attr, $data))
						$data[] = $k_attr;
				foreach (@$attribute_enable['edit']['editor'] as $k_attr => $v_attr)
					if(!in_array($k_attr, $data))
						$data[] = $k_attr;
				$price_type = $_POST["promotion_type_{$r_language['uri']}"];
				switch ($price_type) {
					case "0":
						$_POST["promotion_percent_{$r_language['uri']}"] = "";
						$_POST["price_sale_{$r_language['uri']}"] = "";
						break;
					case "2":
						$_POST["promotion_percent_{$r_language['uri']}"] = "";
						break;
					default:
						break;
				}
				$_POST["item_id_{$r_language['uri']}"] = $maxId;
				$_POST["language_id_{$r_language['uri']}"] = $r_language['id'];
				$_POST["table_name_{$r_language['uri']}"] = $table;
				$data = array_merge($data, array( "item_id", "language_id", "table_name" ));
				if(@$_POST['id'] != "") {
					$translate = getItems(array("table" => "translate", "id" => 0, "condition" => "where item_id like '{$_POST['id']}' and language_id like '{$r_language['id']}' and table_name like '{$table}'"));
					if(!is_array($translate) || empty($translate))
						$db->query("insert into tbl_translate (id, item_id, language_id, table_name) values (".$db->getMaxId("translate").", {$_POST['id']}, {$r_language['id']}, '{$table}')");
					$condition = "where item_id like '{$_POST['id']}' and language_id like '{$r_language['id']}' and table_name like '{$table}'";
				}
				if(!saveItem(array("table" => "translate", "data" => $data, "condition" => @$condition, "affix" => $r_language['uri']))) {
					alert("Lỗi lưu dữ liệu!");
					back();
				}
			endforeach;
			if(@$_POST['id'] != "")
				$db->query("delete from #_product_extend where type like 'image' and product_id like '{$maxId}'");
			if (is_array(@$_POST['image']) && !empty($_POST['image'])) {
				foreach ($_POST['image'] as $k_image => $r_image) {
					$data_image = array("id" => $db->getMaxId("product_extend"), "product_id" => $maxId, "thumbnail" => $r_image, "enable" => 1, "index" => $k_image+1, "type" => "image");
					$db->setTable("product_extend");
					$db->setCondition("");
					if(!$db->insert($data_image)) {
						alert("Lỗi lưu hình khác!");
						back();
					}
				}
			}
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