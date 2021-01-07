<?php
$row_breadcrumb = array($category['uri'] => subString($category['title'], 0, 6));
$id_list = array($category['id']);
$not_list = array($category['id']);
do {
	$row_category = getItems(array("table" => "category", "condition" => "where id in (".implode(",", $id_list).") and id not in (".implode(",", $not_list).")"));
	foreach ($row_category as $r_category) {
		if(intval($r_category['parent_id']) > 0) {
			$id_list[] = $r_category['parent_id'];
		}
		$row_breadcrumb[$r_category['uri']] = subString($r_category['title'], 0, 6);
		$not_list[] = $r_category['id'];
	}
} while (is_array($row_category) && !empty($row_category));
$row_breadcrumb = array_reverse($row_breadcrumb);

$id_list = array_reverse($id_list);

$template = "cart";
?>