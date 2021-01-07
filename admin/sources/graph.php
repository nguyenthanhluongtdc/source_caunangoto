<?php
$row_position = array(
	// Layout index
	'layout-index' => array("type" => "container", "name" => "layout-index", "title" => "Banner chạy", "column" => 5, "layout" => array(
		array("type" => "image-list", "name" => "layout-index", "group" => "slider", "title" => "banner chạy", "link" => true, "input-type" => "input"),
		array("type" => "image", "name" => "layout-index", "group" => "best-seller", "title" => "best seller"),
	)),
	
	'layout-index-product' => array("type" => "position", "name" => "layout-index", "group" => "product", "title" => "Chuyên mục sản phẩm trang chủ", "nosub" => 2, "column" => 5, "layout" => array(
	)),
	// Layout header
	'layout-menu-top-left' => array("type" => "container", "name" => "layout-header", "title" => "Menu top bên trái", "column" => 5, "layout" => array(
		array("type" => "input-list", "name" => "layout-header", "group" => "menu-top-left", "title" => "menu top bên trái", "link" => true, "input-type" => "input"),
	)),
	// 'layout-menu-top-right' => array("type" => "container", "name" => "layout-header", "title" => "Menu top bên phải", "column" => 5, "layout" => array(
	// 	array("type" => "input-list", "name" => "layout-header", "group" => "menu-top-right", "title" => "menu top bên phải", "link" => true, "input-type" => "input"),
	// )),
	'layout-menu-center' => array("type" => "position", "name" => "layout-header", "group" => "menu-center", "title" => "Menu chính", "column" => 6, "nosub" => true, "layout" => array(
		array("type" => "image", "name" => "layout-header", "group" => "logo", "title" => "logo"),
		array("type" => "input", "name" => "layout-header", "group" => "hotline-text-1", "title" => "hotline top 1", "link" => true),
		array("type" => "input", "name" => "layout-header", "group" => "hotline-text-2", "title" => "hotline top 2", "link" => true),
	)),
	'layout-menu-product' => array("type" => "position", "name" => "layout-header", "group" => "menu-product", "title" => "Menu danh mục sản phẩm", "column" => 6, "nosub" => 2, "layout" => array(
	)),
	// Layout footer
	// Classify
	'classify-home' => array("type" => "position", "name" => "classify", "group" => "home", "title" => "Trang chủ", "column" => 6, "limit" => array( "level-1" => 1 ), "nosub" => true, "layout" => array()),
	'classify-contact' => array("type" => "position", "name" => "classify", "group" => "contact", "title" => "Trang liên hệ", "column" => 6, "limit" => array( "level-1" => 1 ), "nosub" => true, "layout" => array()),
	'classify-search' => array("type" => "position", "name" => "classify", "group" => "search", "title" => "Trang tìm kiếm", "column" => 6, "limit" => array( "level-1" => 1 ), "nosub" => true, "layout" => array()),
	'classify-cart' => array("type" => "position", "name" => "classify", "group" => "cart", "title" => "Giỏ hàng", "column" => 6, "limit" => array( "level-1" => 1 ), "nosub" => true, "layout" => array()),
	'classify-best-seller' => array("type" => "position", "name" => "classify", "group" => "best-seller", "title" => "Best seller", "column" => 6, "limit" => array( "level-1" => 1 ), "nosub" => true, "layout" => array()),

		// Layout color
	'layout-color' => array("type" => "container", "name" => "layout-color", "title" => "Màu sắc", "column" => 3, "layout" => array(
		array("type" => "color", "name" => "layout-color", "group" => "color-menu-top-bg", "title" => "nền menu top"),
		array("type" => "color", "name" => "layout-color", "group" => "color-menu-top-fg", "title" => "chữ menu top"),
		array("type" => "color", "name" => "layout-color", "group" => "color-menu-top-fv", "title" => "chữ nổi chuột menu top"),
		array("type" => "color", "name" => "layout-color", "group" => "color-menu-center-bg", "title" => "nền menu chính"),
		array("type" => "color", "name" => "layout-color", "group" => "color-menu-center-fg", "title" => "chữ menu chính"),
		array("type" => "color", "name" => "layout-color", "group" => "color-menu-center-fv", "title" => "chữ nổi chuột menu chính"),
		array("type" => "color", "name" => "layout-color", "group" => "color-menu-center-bg-brand", "title" => "nền chuỗi danh mục sản phẩm"),
		array("type" => "color", "name" => "layout-color", "group" => "color-menu-center-fg-brand", "title" => "chữ chuỗi danh mục sản phẩm"),
		array("type" => "color", "name" => "layout-color", "group" => "color-menu-center-bg-sub", "title" => "nền menu danh mục sản phẩm"),
		array("type" => "color", "name" => "layout-color", "group" => "color-menu-center-bv-sub", "title" => "nền nổi chuột menu danh mục sản phẩm"),
		array("type" => "color", "name" => "layout-color", "group" => "color-menu-center-fg-sub", "title" => "chữ menu danh mục sản phẩm"),
		array("type" => "color", "name" => "layout-color", "group" => "color-menu-center-fv-sub", "title" => "chữ nổi chuột menu danh mục sản phẩm"),
	)),
	'layout-image' => array("type" => "container", "name" => "layout-image", "title" => "Hình ảnh", "column" => 6, "layout" => array(
		array("type" => "image", "name" => "layout-image", "group" => "image-search-icon", "title" => "nút tìm kiếm"),
	)),
);
// file_put_contents(_theme.$information['theme']."/graph.json", json_encode(($row_position)));
if (is_file("./json/graph.json"))
	$row_position = getObjectVars(json_decode(file_get_contents("./json/graph.json")));
if (is_file("./json/option.json")) {
	$row_option_type = getObjectVars(json_decode(file_get_contents("./json/option.json")));
	$row_option_type = $row_option_type;
}
$row_language = getItems(array("table" => "language", "condition" => "order by `index`"));
$lang = getItems(array("table" => "language", "id" => 0, "condition" => "limit 1"));
foreach ($lang as $k => $l)
	$lang[$k] = mb_strtolower($l, "UTF-8");
$user = getUser();
$row_category = getItems(array("table" => "category", "condition" => "order by title"));
$row_option = getItems(array("table" => "option", "condition" => "where uri not like '' order by title"));
$unlist = array();
foreach ($row_position as $r_position) {
	if(@$r_position['name'] != "")
		$unlist[] = "'".$r_position['name']."'";
	if(is_array($r_position['layout']) && !empty($r_position['layout'])) {
		foreach ($r_position['layout'] as $r_layout) {
			if(@$r_layout['name'] != "")
				$unlist[] = "'".$r_layout['name']."'";
		}
	}
}
if(is_array($unlist) && !empty($unlist))
	$db->query("delete from #_layout where name not in (".implode(",", $unlist).")");
$template = "graph/edit";
function getGraph($opts = array()) {
	global $db, $row_language;
	if(!is_array($opts) || empty($opts))
		return "Error!";
	switch (true) {
		case $opts['type'] == "image":
			$item = getItems(array("table" => "layout", "id" => 0, "condition" => "where name like '{$opts['name']}'"));
			$group = array("class" => @$opts['group']!="" ? "group group-{$opts['name']}" : "", "attribute" => @$opts['group']!="" ? $opts['group'] : "");
			$link = array("attribute" => "", "function" => "", "class" => "");
			if(@$opts['group'] != "") {
				$value = getGroupValues($item['value'], $opts['group']);
				$item['value'] = $value['value'];
				$item['link'] = $value['link'];
			}
			elseif(@$opts['link'] === true) {
				$value = getImageValues($item['value']);
				$item['value'] = $value['value'];
				$item['link'] = $value['link'];
			}
			if(@$opts['link'] === true) {
				$link = array(
					'attribute' => "data-link=\"".($item['link']!=""?$item['link']:"")."\"",
					'function' => "linkPopup('#{$bg['name']}_input_{$group['attribute']}', '{$bg['title']}');",
					'class' => 'link'
				);
			}
			$result = array("<div class=\"panel panel-primary panel-{$opts['name']}\"><div class=\"panel-heading\">Hình {$opts['title']}</div><div class=\"panel-body\"><div class=\"image-container\"><button type=\"button\" class=\"close image-close\" onclick=\"$('#{$opts['name']}_input_{$group['attribute']}').val(''); $('#{$opts['name']}_input_{$group['attribute']}').attr('data-link', ''); $('#{$opts['name']}_img_{$group['attribute']}').attr('src','');\">x</button><div onclick=\"openBrowser('#{$opts['name']}_img_{$group['attribute']}', '#{$opts['name']}_input_{$group['attribute']}', false); {$link['function']}\"><img id=\"{$opts['name']}_img_{$group['attribute']}\" src=\"../{$item['value']}\" onerror=\"imgError(this)\" title=\"Chọn hình {$opts['title']}\" style=\"cursor: pointer;\"><input class=\"input {$group['class']} {$link['class']}\" id=\"{$opts['name']}_input_{$group['attribute']}\" name=\"{$opts['name']}\" type=\"hidden\" data-type=\"image\" value=\"{$item['value']}\" data-name=\"{$opts['name']}\" data-value=\"\" data-group=\"{$group['attribute']}\" {$link['attribute']}><div class=\"image-label\">Hình {$opts['title']}</div></div></div></div></div>");
			break;
		case $opts['type'] == "mp4":
			$item = getItems(array("table" => "layout", "id" => 0, "condition" => "where name like '{$opts['name']}'"));
			$group = array("class" => @$opts['group']!="" ? "group group-{$opts['name']}" : "", "attribute" => @$opts['group']!="" ? $opts['group'] : "");
			$link = array("attribute" => "", "function" => "", "class" => "");
			if(@$opts['group'] != "") {
				$value = getGroupValues($item['value'], $opts['group']);
				$item['value'] = $value['value'];
				$item['link'] = $value['link'];
			}
			elseif(@$opts['link'] === true) {
				$value = getImageValues($item['value']);
				$item['value'] = $value['value'];
				$item['link'] = $value['link'];
			}
			if(@$opts['link'] === true) {
				$link = array(
					'attribute' => "data-link=\"".($item['link']!=""?$item['link']:"")."\"",
					'function' => "linkPopup('#{$bg['name']}_input_{$group['attribute']}', '{$bg['title']}');",
					'class' => 'link'
				);
			}
			$result = array("<div class=\"panel panel-primary panel-{$opts['name']}\"><div class=\"panel-heading\">Hình {$opts['title']}</div><div class=\"panel-body\"><div class=\"mp4-container\"><button type=\"button\" class=\"close mp4-close\" onclick=\"$('#{$opts['name']}_input_{$group['attribute']}').val(''); $('#{$opts['name']}_input_{$group['attribute']}').attr('data-link', ''); $('#{$opts['name']}_img_{$group['attribute']}').attr('src','');\">x</button><div onclick=\"openBrowser('#{$opts['name']}_img_{$group['attribute']}', '#{$opts['name']}_input_{$group['attribute']}', false); {$link['function']}\"><video id=\"{$opts['name']}_img_{$group['attribute']}\" controls src=\"../{$item['value']}\" title=\"Chọn video\" style=\"cursor: pointer;\">Your browser does not support the video tag.</video><input class=\"input {$group['class']} {$link['class']}\" id=\"{$opts['name']}_input_{$group['attribute']}\" name=\"{$opts['name']}\" type=\"hidden\" data-type=\"mp4\" value=\"{$item['value']}\" data-name=\"{$opts['name']}\" data-value=\"\" data-group=\"{$group['attribute']}\" {$link['attribute']}><div class=\"mp4-label\">Video {$opts['title']}</div></div></div></div></div>");
			break;
		case $opts['type'] == "color":
			$item = getItems(array("table" => "layout", "id" => 0, "condition" => "where name like '{$opts['name']}'"));
			$group = array("class" => @$opts['group']!="" ? "group group-{$opts['name']}" : "", "attribute" => @$opts['group']!="" ? $opts['group'] : "");
			if(@$opts['group'] != "") {
				$value = getGroupValues($item['value'], $opts['group']);
				$item['value'] = $value['value'];
			}
			$style = $item['value'] != "" ? "style=\"background-color: {$item['value']};\"" : "";
			$function = "colorPopup('#{$opts['name']}_input_{$group['attribute']}', '{$opts['title']}');";
			$result = array("<div class=\"panel panel-primary panel-{$opts['name']}\"><div class=\"panel-heading\">Màu {$opts['title']}</div><div class=\"panel-body\"><div class=\"color-container\"><button type=\"button\" class=\"close color-close\" onclick=\"$('#{$opts['name']}_input_{$group['attribute']}').val(''); $('#{$opts['name']}_input_{$group['attribute']}').css('background-color', '#eeeeee');\">x</button><input id=\"{$opts['name']}_input_{$group['attribute']}\" class=\"input form-control text-center {$group['class']}\" name=\"{$opts['name']}\" type=\"text\" value=\"{$item['value']}\" data-type=\"color\" data-name=\"{$opts['name']}\" data-value=\"\" data-group=\"{$group['attribute']}\" placeholder=\"Không màu\" onclick=\"{$function}\" {$style} multiple readonly><div class=\"color-label\">Màu {$opts['title']}</div></div></div></div>");
			break;
		case $opts['type'] == "input":
			$item = getItems(array("table" => "layout", "id" => 0, "condition" => "where name like '{$opts['name']}'"));
			$group = array("class" => @$opts['group']!="" ? "group group-{$opts['name']}" : "", "attribute" => @$opts['group']!="" ? $opts['group'] : "");
			if(@$opts['group'] != "") {
				$value = getGroupValues($item['value'], $opts['group']);
				$item['value'] = $value['value'];
			}
			$attribute = array();
			$function = array();
			foreach ($row_language as $r_language) {
				$attribute[] = "data-value_{$r_language['uri']}='".$item['value_'.$r_language['uri']]."'";
				$fn = "inputPopup('#{$bg['name']}_input_{$group['attribute']}', 'value_{$r_language['uri']}', '{$bg['title']} {$r_language['title']}', {$k_language});";
				$function[] = $fn;
			}
			$attribute = implode("", $attribute);
			$function = implode(" ", $function);
			if($bg['link'] === true) {
				$link = array(
					'attribute' => "data-link=\"".($item['link']!=""?$item['link']:"")."\"",
					'function' => "linkPopup('#{$bg['name']}_input_{$group['attribute']}', '{$bg['title']}');",
					'class' => "link"
				);
			}
			$result = array("<div class=\"panel panel-primary panel-{$opts['name']}\"><div class=\"panel-heading\">Chuỗi {$opts['title']}</div><div class=\"panel-body\"><div class=\"text-container\"><button type=\"button\" class=\"close text-close\" onclick=\"removeText('#{$opts['name']}_input_{$group['attribute']}');\">x</button><textarea id=\"{$opts['name']}_input_{$group['attribute']}\" class=\"input text form-control {$group['class']} {$link['class']}\" name=\"{$opts['name']}\" data-type=\"text\" data-name=\"{$opts['name']}\" data-value=\"\" {$link['attribute']} {$attribute} placeholder=\"Không có nội dung\" onclick=\"{$function} {$link['function']}\" readonly>{$item['value']}</textarea><div class=\"text-label\">Chuỗi {$opts['title']}</div></div></div></div>");
			break;
		case $opts['type'] == "email":
			$item = getItems(array("table" => "layout", "id" => 0, "condition" => "where name like '{$opts['name']}'"));
			$group = array("class" => @$opts['group']!="" ? "group group-{$opts['name']}" : "", "attribute" => @$opts['group']!="" ? $opts['group'] : "");
			if(@$opts['group'] != "") {
				$value = getGroupValues($item['value'], $opts['group']);
				$item['value'] = $value['value'];
			}
			$attribute = array();
			$function = array();
			foreach ($row_language as $r_language) {
				$attribute[] = "data-value_{$r_language['uri']}='".$item['value_'.$r_language['uri']]."'";
				$fn = "emailPopup('#{$bg['name']}_input_{$group['attribute']}', 'value_{$r_language['uri']}', '{$bg['title']} {$r_language['title']}', {$k_language});";
				$function[] = $fn;
			}
			$attribute = implode("", $attribute);
			$function = implode(" ", $function);
			if($bg['link'] === true) {
				$link = array(
					'attribute' => "data-link=\"".($item['link']!=""?$item['link']:"")."\"",
					'function' => "linkPopup('#{$bg['name']}_input_{$group['attribute']}', '{$bg['title']}');",
					'class' => "link"
				);
			}
			$result = array("<div class=\"panel panel-primary panel-{$opts['name']}\"><div class=\"panel-heading\">Chuỗi {$opts['title']}</div><div class=\"panel-body\"><div class=\"text-container\"><button type=\"button\" class=\"close text-close\" onclick=\"removeText('#{$opts['name']}_input_{$group['attribute']}');\">x</button><textarea id=\"{$opts['name']}_input_{$group['attribute']}\" class=\"input text form-control {$group['class']} {$link['class']}\" name=\"{$opts['name']}\" data-type=\"text\" data-name=\"{$opts['name']}\" data-value=\"\" {$link['attribute']} {$attribute} placeholder=\"Không có nội dung\" onclick=\"{$function} {$link['function']}\" readonly>{$item['value']}</textarea><div class=\"text-label\">Chuỗi {$opts['title']}</div></div></div></div>");
			break;
		case $opts['type'] == "tel":
			$item = getItems(array("table" => "layout", "id" => 0, "condition" => "where name like '{$opts['name']}'"));
			$group = array("class" => @$opts['group']!="" ? "group group-{$opts['name']}" : "", "attribute" => @$opts['group']!="" ? $opts['group'] : "");
			if(@$opts['group'] != "") {
				$value = getGroupValues($item['value'], $opts['group']);
				$item['value'] = $value['value'];
			}
			$attribute = array();
			$function = array();
			foreach ($row_language as $r_language) {
				$attribute[] = "data-value_{$r_language['uri']}='".$item['value_'.$r_language['uri']]."'";
				$fn = "telPopup('#{$bg['name']}_input_{$group['attribute']}', 'value_{$r_language['uri']}', '{$bg['title']} {$r_language['title']}', {$k_language});";
				$function[] = $fn;
			}
			$attribute = implode("", $attribute);
			$function = implode(" ", $function);
			if($bg['link'] === true) {
				$link = array(
					'attribute' => "data-link=\"".($item['link']!=""?$item['link']:"")."\"",
					'function' => "linkPopup('#{$bg['name']}_input_{$group['attribute']}', '{$bg['title']}');",
					'class' => "link"
				);
			}
			$result = array("<div class=\"panel panel-primary panel-{$opts['name']}\"><div class=\"panel-heading\">Chuỗi {$opts['title']}</div><div class=\"panel-body\"><div class=\"text-container\"><button type=\"button\" class=\"close text-close\" onclick=\"removeText('#{$opts['name']}_input_{$group['attribute']}');\">x</button><textarea id=\"{$opts['name']}_input_{$group['attribute']}\" class=\"input text form-control {$group['class']} {$link['class']}\" name=\"{$opts['name']}\" data-type=\"text\" data-name=\"{$opts['name']}\" data-value=\"\" {$link['attribute']} {$attribute} placeholder=\"Không có nội dung\" onclick=\"{$function} {$link['function']}\" readonly>{$item['value']}</textarea><div class=\"text-label\">Chuỗi {$opts['title']}</div></div></div></div>");
			break;
		case $opts['type'] == "text":
			$item = getItems(array("table" => "layout", "id" => 0, "condition" => "where name like '{$opts['name']}'"));
			$group = array("class" => @$opts['group']!="" ? "group group-{$opts['name']}" : "", "attribute" => @$opts['group']!="" ? $opts['group'] : "");
			if(@$opts['group'] != "") {
				$value = getGroupValues($item['value'], $opts['group']);
				$item['value'] = $value['value'];
			}
			$attribute = array();
			$function = array();
			foreach ($row_language as $r_language) {
				$attribute[] = "data-value_{$r_language['uri']}='".$item['value_'.$r_language['uri']]."'";
				$fn = "textPopup('#{$bg['name']}_input_{$group['attribute']}', 'value_{$r_language['uri']}', '{$bg['title']} {$r_language['title']}', {$k_language});";
				$function[] = $fn;
			}
			$attribute = implode("", $attribute);
			$function = implode(" ", $function);
			if($bg['link'] === true) {
				$link = array(
					'attribute' => "data-link=\"".($item['link']!=""?$item['link']:"")."\"",
					'function' => "linkPopup('#{$bg['name']}_input_{$group['attribute']}', '{$bg['title']}');",
					'class' => "link"
				);
			}
			$result = array("<div class=\"panel panel-primary panel-{$opts['name']}\"><div class=\"panel-heading\">Chuỗi {$opts['title']}</div><div class=\"panel-body\"><div class=\"text-container\"><button type=\"button\" class=\"close text-close\" onclick=\"removeText('#{$opts['name']}_input_{$group['attribute']}');\">x</button><textarea id=\"{$opts['name']}_input_{$group['attribute']}\" class=\"input text form-control {$group['class']} {$link['class']}\" name=\"{$opts['name']}\" data-type=\"text\" data-name=\"{$opts['name']}\" data-value=\"\" {$link['attribute']} {$attribute} placeholder=\"Không có nội dung\" onclick=\"{$function} {$link['function']}\" readonly>{$item['value']}</textarea><div class=\"text-label\">Chuỗi {$opts['title']}</div></div></div></div>");
			break;
		case $opts['type'] == "editor":
			$item = getItems(array("table" => "layout", "id" => 0, "condition" => "where name like '{$opts['name']}'"));
			$group = array("class" => @$opts['group']!="" ? "group group-{$opts['name']}" : "", "attribute" => @$opts['group']!="" ? $opts['group'] : "");
			if(@$opts['group'] != "") {
				$value = getGroupValues($item['value'], $opts['group']);
				$item['value'] = $value['value'];
			}
			$attribute = array();
			$function = array();
			foreach ($row_language as $r_language) {
				$attribute[] = "data-value_{$r_language['uri']}='".$item['value_'.$r_language['uri']]."'";
				$fn = "editorPopup('#{$bg['name']}_input_{$group['attribute']}', 'value_{$r_language['uri']}', '{$bg['title']} {$r_language['title']}', {$k_language});";
				$function[] = $fn;
			}
			$attribute = implode("", $attribute);
			$function = implode(" ", $function);
			if($bg['link'] === true) {
				$link = array(
					'attribute' => "data-link=\"".($item['link']!=""?$item['link']:"")."\"",
					'function' => "linkPopup('#{$bg['name']}_input_{$group['attribute']}', '{$bg['title']}');",
					'class' => "link"
				);
			}
			$result = array("<div class=\"panel panel-primary panel-{$opts['name']}\"><div class=\"panel-heading\">Chuỗi {$opts['title']}</div><div class=\"panel-body\"><div class=\"text-container\"><button type=\"button\" class=\"close text-close\" onclick=\"removeText('#{$opts['name']}_input_{$group['attribute']}');\">x</button><textarea id=\"{$opts['name']}_input_{$group['attribute']}\" class=\"input text form-control {$group['class']} {$link['class']}\" name=\"{$opts['name']}\" data-type=\"text\" data-name=\"{$opts['name']}\" data-value=\"\" {$link['attribute']} {$attribute} placeholder=\"Không có nội dung\" onclick=\"{$function} {$link['function']}\" readonly>{$item['value']}</textarea><div class=\"text-label\">Chuỗi {$opts['title']}</div></div></div></div>");
			break;
		case $opts['type'] == "video":
			$item = getItems(array("table" => "layout", "id" => 0, "condition" => "where name like '{$opts['name']}'"));
			$group = array("class" => @$opts['group']!="" ? "group group-{$opts['name']}" : "", "attribute" => @$opts['group']!="" ? $opts['group'] : "");
			if(@$opts['group'] != "") {
				$value = getGroupValues($item['value'], $opts['group']);
				$item['value'] = $value['value'];
			}
			$opacity = $item['value'] == "" ? "style=\"opacity:0;\"" : "";
			$result = array("<div class=\"panel panel-primary panel-{$opts['name']}\"><div class=\"panel-heading\">Video {$opts['title']}</div><div class=\"panel-body\"><div class=\"video-container\" style=\"float: left; width: calc(100% / ".min($column, count($opts['layout']))." - 16px);\"><button type=\"button\" class=\"close video-close\" onclick=\"$('#{$opts['name']}_input_{$group['attribute']}').val(''); $('#{$opts['name']}_video_{$group['attribute']}').css('opacity', '0');\">x</button><div class='iframe-container' title=\"Nhập link youtube video {$opts['title']}\" id=\"{$opts['name']}_video_{$group['attribute']}\" onclick=\"var result=prompt('Nhập link youtube video {$opts['title']}'); if(!result) return; $('#{$opts['name']}_input_{$group['attribute']}').val(result); $(this).find('iframe').attr('src', result.replace('/watch?v=', '/embed/')); $(this).css('opacity', '1');\" {$opacity}>".getYoutubeIframe($item['value'])."</div><input class=\"input {$group['class']}\" id=\"{$opts['name']}_input_{$group['attribute']}\" name=\"{$opts['name']}\" type=\"hidden\" value=\"{$item['value']}\" data-type=\"video\" data-name=\"{$opts['name']}\" data-value=\"\" data-group=\"{$group['attribute']}\"><div class=\"video-label\">Video {$opts['title']}</div></div></div></div>");
			break;
		case $opts['type'] == "position":
			$class = "";
			$column = 4;
			if($opts['fullwidth'] === true) {
				$class="fullwidth";
			}
			if(intval($opts['column']) > 0) {
				$column = $opts['column'];
			}
			$row_position = getItems(array("table" => "layout", "id" => 0, "condition" => "where name like '{$opts['name']}'"));
			if(@$opts['group'] != "") {
				$value = getGroupValues($row_position['value'], $opts['group']);
				$row_position = $value['value'];
			}
			$layout = "";
			if(is_array($opts['layout']) && !empty($opts['layout'])) {
				foreach ($opts['layout'] as $bg) {
					$item = getItems(array("table" => "layout", "id" => 0, "condition" => "where name like '{$bg['name']}'"));
					$group = array("class" => @$bg['group']!="" ? "group group-{$bg['name']}" : "", "attribute" => @$bg['group']!="" ? $bg['group'] : "");
					$link = array("attribute" => "", "function" => "", "class" => "");
					if(@$bg['group'] != "")
						$value = getGroupValues($item['value'], $bg['group']);
					elseif (@$bg['link'] === true)
						$value = getImageValues($item['value']);
					$item['value'] = $value['value'];
					$item['link'] = $value['link'];
					if($value['type'] == "text" || @$bg['input-type'] != "") {
						foreach ($row_language as $r_language)
							$item['value_'.$r_language['uri']] = $value['value_'.$r_language['uri']];
					}
					if(@$bg['link'] === true) {
						$link = array(
							'attribute' => "data-link=\"".($item['link']!=""?$item['link']:"")."\"",
							'function' => "linkPopup('#{$bg['name']}_input_{$group['attribute']}', '{$bg['title']}');",
							'class' => "link"
						);
					}
					switch ($bg['type']) {
						case "image":
							if($bg['link'] === true) {
								$link = array(
									'attribute' => "data-link=\"".($item['link']!=""?$item['link']:"")."\"",
									'function' => "linkPopup('#{$bg['name']}_input_{$group['attribute']}', '{$bg['title']}');",
									'class' => "link"
								);
							}
							if(@$bg['input-type'] != "") {
								$input = array(
									'attribute' => "",
									'function' => "",
								);
								foreach ($row_language as $k_language => $r_language) {
									$input['attribute'] .= " data-value_{$r_language['uri']}='".$item['value_'.$r_language['uri']]."'";
									$input['function'] .= " {$bg['input-type']}Popup('#{$bg['name']}_input_{$group['attribute']}', 'value_{$r_language['uri']}', '{$bg['title']} {$r_language['title']}', {$k_language});";
								}
								$input['function'] = "{$link['function']}{$input['function']}";
							}
							else {
								$input['function'] = "{$link['function']}";
							}
							$layout .= "<div class=\"image-container\" style=\"float: left; width: calc(100% / ".min($column, count($opts['layout']))." - 16px);\"><button type=\"button\" class=\"close image-close\" onclick=\"$('#{$bg['name']}_input_{$group['attribute']}').val(''); $('#{$bg['name']}_input_{$group['attribute']}').attr('data-link', ''); $('#{$bg['name']}_img_{$group['attribute']}').attr('src','');\">x</button><div onclick=\"openBrowser('#{$bg['name']}_img_{$group['attribute']}', '#{$bg['name']}_input_{$group['attribute']}', false); {$input['function']}\"><img id=\"{$bg['name']}_img_{$group['attribute']}\" src=\"../{$item['value']}\" onerror=\"imgError(this)\" title=\"Chọn hình {$bg['title']}\" style=\"cursor: pointer;\"><input class=\"input layout-input {$group['class']} {$link['class']}\" id=\"{$bg['name']}_input_{$group['attribute']}\" name=\"{$bg['name']}\" type=\"hidden\" data-type=\"image\" value=\"{$item['value']}\" data-name=\"{$bg['name']}\" data-value=\"\" {$link['attribute']}{$input['attribute']} data-group=\"{$group['attribute']}\"><div class=\"image-label\">Hình {$bg['title']}</div></div></div>";
							break;
						case "mp4":
							$layout .= "<div class=\"mp4-container\" style=\"float: left; width: calc(100% / ".min($column, count($opts['layout']))." - 16px);\"><button type=\"button\" class=\"close mp4-close\" onclick=\"$('#{$bg['name']}_input_{$group['attribute']}').val(''); $('#{$bg['name']}_input_{$group['attribute']}').attr('data-link', ''); $('#{$bg['name']}_img_{$group['attribute']}').attr('src','');\">x</button><div onclick=\"openBrowser('#{$bg['name']}_img_{$group['attribute']}', '#{$bg['name']}_input_{$group['attribute']}', false); {$link['function']}\"><video id=\"{$bg['name']}_img_{$group['attribute']}\" controls src=\"{$item['value']}\" title=\"Chọn video\" style=\"cursor: pointer;\">Your browser does not support the video tag.</video><input class=\"input layout-input {$group['class']} {$link['class']}\" id=\"{$bg['name']}_input_{$group['attribute']}\" name=\"{$bg['name']}\" type=\"hidden\" data-type=\"mp4\" value=\"{$item['value']}\" data-name=\"{$bg['name']}\" data-value=\"\" {$link['attribute']} data-group=\"{$group['attribute']}\"><div class=\"mp4-label\">Video {$bg['title']}</div></div></div>";
							break;
						case "color":
							$style = $item['value'] != "" ? "style=\"background-color: {$item['value']};\"" : "";
							$function = "colorPopup('#{$bg['name']}_input_{$group['attribute']}', '{$bg['title']}');";
							$layout .= "<div class=\"color-container\" style=\"float: left; width: calc(100% / ".min($column, count($opts['layout']))." - 16px);\"><button type=\"button\" class=\"close color-close\" onclick=\"$('#{$bg['name']}_input_{$group['attribute']}').val(''); $('#{$bg['name']}_input_{$group['attribute']}').css('background-color', '#eeeeee');\">x</button><input class=\"input layout-input form-control text-center {$group['class']}\" id=\"{$bg['name']}_input_{$group['attribute']}\" name=\"{$bg['name']}\" type=\"text\" value=\"{$item['value']}\" data-type=\"color\" data-name=\"{$bg['name']}\" data-value=\"\" data-group=\"{$group['attribute']}\" placeholder=\"Không màu\" onclick=\"{$function}\" {$style} multiple readonly><div class=\"color-label\">Màu {$bg['title']}</div></div>";
							break;
						case "video":
							$opacity = $item['value'] == "" ? "style=\"opacity:0;\"" : "";
							$layout .= "<div class=\"video-container\" style=\"float: left; width: calc(100% / ".min($column, count($opts['layout']))." - 16px);\"><button type=\"button\" class=\"close video-close\" onclick=\"$('#{$bg['name']}_input_{$group['attribute']}').val(''); $('#{$bg['name']}_video_{$group['attribute']}').css('opacity', '0');\">x</button><div class='iframe-container' title=\"Nhập link youtube video {$bg['title']}\" id=\"{$bg['name']}_video_{$group['attribute']}\" onclick=\"var result=prompt('Nhập link youtube video {$bg['title']}'); if(!result) return; $('#{$bg['name']}_input_{$group['attribute']}').val(result); $(this).find('iframe').attr('src', result.replace('/watch?v=', '/embed/')); $(this).css('opacity', '1');\" {$opacity}>".getYoutubeIframe($item['value'])."</div><input class=\"input layout-input {$group['class']}\" id=\"{$bg['name']}_input_{$group['attribute']}\" name=\"{$bg['name']}\" type=\"hidden\" value=\"{$item['value']}\" data-type=\"video\" data-name=\"{$bg['name']}\" data-value=\"\" data-group=\"{$group['attribute']}\"><div class=\"video-label\">Video {$bg['title']}</div></div>";
							break;
						case "input":
							$attribute = array();
							$function = array();
							foreach ($row_language as $k_language => $r_language) {
								$attribute[] = "data-value_{$r_language['uri']}='".$item['value_'.$r_language['uri']]."'";
								$fn = "inputPopup('#{$bg['name']}_input_{$group['attribute']}', 'value_{$r_language['uri']}', '{$bg['title']} {$r_language['title']}', {$k_language});";
								$function[] = $fn;
							}
							$attribute = implode("", $attribute);
							$function = implode(" ", $function);
							if($bg['link'] === true) {
								$link = array(
									'attribute' => "data-link=\"".($item['link']!=""?$item['link']:"")."\"",
									'function' => "linkPopup('#{$bg['name']}_input_{$group['attribute']}', '{$bg['title']}');",
									'class' => "link"
								);
							}
							$layout .= "<div class=\"text-container\" style=\"float: left; width: calc(100% / ".min($column, count($opts['layout']))." - 16px);\"><button type=\"button\" class=\"close text-close\" onclick=\"removeText('#{$bg['name']}_input_{$group['attribute']}');\">x</button><textarea class=\"input text form-control layout-input {$group['class']} {$link['class']}\" id=\"{$bg['name']}_input_{$group['attribute']}\" name=\"{$bg['name']}\" type=\"hidden\" data-type=\"text\" data-name=\"{$bg['name']}\" data-value=\"\" data-group=\"{$group['attribute']}\" {$link['attribute']} {$attribute} placeholder=\"Không có nội dung\" onclick=\"{$function} {$link['function']}\" readonly>{$item['value']}</textarea><div class=\"text-label\">Chuỗi {$bg['title']}</div></div>";
							break;
						case "email":
							$attribute = array();
							$function = array();
							foreach ($row_language as $k_language => $r_language) {
								$attribute[] = "data-value_{$r_language['uri']}='".$item['value_'.$r_language['uri']]."'";
								$fn = "emailPopup('#{$bg['name']}_input_{$group['attribute']}', 'value_{$r_language['uri']}', '{$bg['title']} {$r_language['title']}', {$k_language});";
								$function[] = $fn;
							}
							$attribute = implode("", $attribute);
							$function = implode(" ", $function);
							if($bg['link'] === true) {
								$link = array(
									'attribute' => "data-link=\"".($item['link']!=""?$item['link']:"")."\"",
									'function' => "linkPopup('#{$bg['name']}_input_{$group['attribute']}', '{$bg['title']}');",
									'class' => "link"
								);
							}
							$layout .= "<div class=\"text-container\" style=\"float: left; width: calc(100% / ".min($column, count($opts['layout']))." - 16px);\"><button type=\"button\" class=\"close text-close\" onclick=\"removeText('#{$bg['name']}_input_{$group['attribute']}');\">x</button><textarea class=\"input text form-control layout-input {$group['class']} {$link['class']}\" id=\"{$bg['name']}_input_{$group['attribute']}\" name=\"{$bg['name']}\" type=\"hidden\" data-type=\"text\" data-name=\"{$bg['name']}\" data-value=\"\" data-group=\"{$group['attribute']}\" {$link['attribute']} {$attribute} placeholder=\"Không có nội dung\" onclick=\"{$function} {$link['function']}\" readonly>{$item['value']}</textarea><div class=\"text-label\">Chuỗi {$bg['title']}</div></div>";
							break;
						case "tel":
							$attribute = array();
							$function = array();
							foreach ($row_language as $k_language => $r_language) {
								$attribute[] = "data-value_{$r_language['uri']}='".$item['value_'.$r_language['uri']]."'";
								$fn = "telPopup('#{$bg['name']}_input_{$group['attribute']}', 'value_{$r_language['uri']}', '{$bg['title']} {$r_language['title']}', {$k_language});";
								$function[] = $fn;
							}
							$attribute = implode("", $attribute);
							$function = implode(" ", $function);
							if($bg['link'] === true) {
								$link = array(
									'attribute' => "data-link=\"".($item['link']!=""?$item['link']:"")."\"",
									'function' => "linkPopup('#{$bg['name']}_input_{$group['attribute']}', '{$bg['title']}');",
									'class' => "link"
								);
							}
							$layout .= "<div class=\"text-container\" style=\"float: left; width: calc(100% / ".min($column, count($opts['layout']))." - 16px);\"><button type=\"button\" class=\"close text-close\" onclick=\"removeText('#{$bg['name']}_input_{$group['attribute']}');\">x</button><textarea class=\"input text form-control layout-input {$group['class']} {$link['class']}\" id=\"{$bg['name']}_input_{$group['attribute']}\" name=\"{$bg['name']}\" type=\"hidden\" data-type=\"text\" data-name=\"{$bg['name']}\" data-value=\"\" data-group=\"{$group['attribute']}\" {$link['attribute']} {$attribute} placeholder=\"Không có nội dung\" onclick=\"{$function} {$link['function']}\" readonly>{$item['value']}</textarea><div class=\"text-label\">Chuỗi {$bg['title']}</div></div>";
							break;
						case "text":
							$attribute = array();
							$function = array();
							foreach ($row_language as $k_language => $r_language) {
								$attribute[] = "data-value_{$r_language['uri']}='".$item['value_'.$r_language['uri']]."'";
								$fn = "textPopup('#{$bg['name']}_input_{$group['attribute']}', 'value_{$r_language['uri']}', '{$bg['title']} {$r_language['title']}', {$k_language});";
								$function[] = $fn;
							}
							$attribute = implode("", $attribute);
							$function = implode(" ", $function);
							if($bg['link'] === true) {
								$link = array(
									'attribute' => "data-link=\"".($item['link']!=""?$item['link']:"")."\"",
									'function' => "linkPopup('#{$bg['name']}_input_{$group['attribute']}', '{$bg['title']}');",
									'class' => "link"
								);
							}
							$layout .= "<div class=\"text-container\" style=\"float: left; width: calc(100% / ".min($column, count($opts['layout']))." - 16px);\"><button type=\"button\" class=\"close text-close\" onclick=\"removeText('#{$bg['name']}_input_{$group['attribute']}');\">x</button><textarea class=\"input text form-control layout-input {$group['class']} {$link['class']}\" id=\"{$bg['name']}_input_{$group['attribute']}\" name=\"{$bg['name']}\" type=\"hidden\" data-type=\"text\" data-name=\"{$bg['name']}\" data-value=\"\" data-group=\"{$group['attribute']}\" {$link['attribute']} {$attribute} placeholder=\"Không có nội dung\" onclick=\"{$function} {$link['function']}\" readonly>{$item['value']}</textarea><div class=\"text-label\">Chuỗi {$bg['title']}</div></div>";
							break;
						case "editor":
							$attribute = array();
							$function = array();
							foreach ($row_language as $k_language => $r_language) {
								$attribute[] = "data-value_{$r_language['uri']}='".$item['value_'.$r_language['uri']]."'";
								$fn = "editorPopup('#{$bg['name']}_input_{$group['attribute']}', 'value_{$r_language['uri']}', '{$bg['title']} {$r_language['title']}', {$k_language});";
								$function[] = $fn;
							}
							$attribute = implode("", $attribute);
							$function = implode(" ", $function);
							if($bg['link'] === true) {
								$link = array(
									'attribute' => "data-link=\"".($item['link']!=""?$item['link']:"")."\"",
									'function' => "linkPopup('#{$bg['name']}_input_{$group['attribute']}', '{$bg['title']}');",
									'class' => "link"
								);
							}
							$layout .= "<div class=\"text-container\" style=\"float: left; width: calc(100% / ".min($column, count($opts['layout']))." - 16px);\"><button type=\"button\" class=\"close text-close\" onclick=\"removeText('#{$bg['name']}_input_{$group['attribute']}');\">x</button><textarea class=\"input text form-control layout-input {$group['class']} {$link['class']}\" id=\"{$bg['name']}_input_{$group['attribute']}\" name=\"{$bg['name']}\" type=\"hidden\" data-type=\"text\" data-name=\"{$bg['name']}\" data-value=\"\" data-group=\"{$group['attribute']}\" {$link['attribute']} {$attribute} placeholder=\"Không có nội dung\" onclick=\"{$function} {$link['function']}\" readonly>{$item['value']}</textarea><div class=\"text-label\">Chuỗi {$bg['title']}</div></div>";
							break;
						case "image-list":
							$layout_str = "";
							$item_value = json_decode($item['value']);
							if (is_array($item_value) && !empty($item_value)) {
								foreach ($item_value as $k_item_value => $r_item_value) {
									$r_item_value_arr = get_object_vars($r_item_value);
									if($bg['link'] === true) {
										$link = array(
											'attribute' => "data-link=\"".($r_item_value_arr['link']!=""?$r_item_value_arr['link']:"")."\"",
											'function' => "linkPopup('#{$bg['name']}_input_{$group['attribute']}_{$k_item_value}', '{$bg['title']}');",
										);
									}
									if(@$bg['input-type'] != "") {
										$input = array(
											'attribute' => "",
											'function' => "",
										);
										foreach ($row_language as $k_language => $r_language) {
											$input['attribute'] .= " data-value_{$r_language['uri']}='".$r_item_value_arr['value_'.$r_language['uri']]."'";
											$input['function'] .= " {$bg['input-type']}Popup('#{$bg['name']}_input_{$group['attribute']}_{$k_item_value}', 'value_{$r_language['uri']}', '{$bg['title']} {$r_language['title']}', {$k_language});";
										}
										$input['function'] = "{$link['function']}{$input['function']}";
									}
									else {
										$input['function'] = "{$link['function']}";
									}
									$layout_str .= "<div class=\"image-container\" style=\"float: left; width: calc(100% / ".$opts['column']." - 17px);\"><button type=\"button\" class=\"close image-close\" onclick=\"$(this).parent().remove();\">x</button><div onclick=\"openBrowser('#{$bg['name']}_img_{$group['attribute']}_{$k_item_value}', '#{$bg['name']}_input_{$group['attribute']}_{$k_item_value}', false); {$input['function']}\"><img id=\"{$bg['name']}_img_{$group['attribute']}_{$k_item_value}\" src=\"../{$r_item_value->value}\" onerror=\"imgError(this)\" title=\"Chọn hình {$bg['title']}\" style=\"cursor: pointer;\"><input id=\"{$bg['name']}_input_{$group['attribute']}_{$k_item_value}\" name=\"{$bg['name']}[]\" type=\"hidden\" value=\"{$r_item_value->value}\" data-value=\"\" {$link['attribute']}{$input['attribute']}><div class=\"image-label\">Hình {$bg['title']}</div></div></div>";
								}
							}
							else
								$item['value'] = array();
							$layout .= "<div class=\"clearfix\"></div><div class=\"image-list-container\" data-name=\"{$bg['name']}\" data-group=\"{$group['attribute']}\" data-type=\"{$bg['type']}\" data-title=\"{$bg['title']}\" data-count=\"".count($item_value)."\"><input class=\"input group group-{$bg['name']}\" type=\"hidden\" data-name=\"{$bg['name']}\" data-group=\"{$group['attribute']}\" data-type=\"{$bg['type']}\"><div class=\"add-container display-flex flex-center-center\" style=\"float: left; width: calc(100% / ".$opts['column']." - 17px);\" onclick=\"addImage(this, '{$bg['link']}', '{$bg['input-type']}');\"><span class=\"fa fa-plus\"></span></div>{$layout_str}</div><div class=\"clearfix\"></div>";
							break;
						case "input-list":
							$layout_str = "";
							$item_value = json_decode($item['value']);
							if (is_array($item_value) && !empty($item_value)) {
								foreach ($item_value as $k_item_value => $r_item_value) {
									$r_item_value_arr = get_object_vars($r_item_value);
									if($bg['link'] === true) {
										$link = array(
											'attribute' => "data-link=\"".($r_item_value_arr['link']!=""?$r_item_value_arr['link']:"")."\"",
											'function' => "linkPopup('#{$bg['name']}_input_{$group['attribute']}_{$k_item_value}', '{$bg['title']}');",
										);
									}
									if(@$bg['input-type'] != "") {
										$input = array(
											'attribute' => "",
											'function' => "",
										);
										foreach ($row_language as $k_language => $r_language) {
											$input['attribute'] .= " data-value_{$r_language['uri']}='".$r_item_value_arr['value_'.$r_language['uri']]."'";
											$input['function'] .= " {$bg['input-type']}Popup('#{$bg['name']}_input_{$group['attribute']}_{$k_item_value}', 'value_{$r_language['uri']}', '{$bg['title']} {$r_language['title']}', {$k_language});";
										}
										$input['function'] = "{$link['function']}{$input['function']}";
									}
									else {
										$input['function'] = $link['function'];
									}
									$layout_str .= "<div class=\"text-container\" style=\"float: left; width: calc(100% / ".$opts['column']." - 17px);\"><button type=\"button\" class=\"close text-close\" onclick=\"$(this).parent().remove();\">x</button><div onclick=\"{$input['function']}\"><textarea class=\"form-control\" id=\"{$bg['name']}_input_{$group['attribute']}_{$k_item_value}\" name=\"{$bg['name']}[]\" type=\"hidden\" data-value=\"\" data-type=\"text\" {$link['attribute']}{$input['attribute']} placeholder=\"Không có nội dung\" readonly>{$r_item_value_arr['value_'.$row_language[0]['uri']]}</textarea><div class=\"text-label\">Chuỗi {$bg['title']}</div></div></div>";
								}
							}
							else
								$item['value'] = array();
							$layout .= "<div class=\"clearfix\"></div><div class=\"input-list-container\" data-name=\"{$bg['name']}\" data-group=\"{$group['attribute']}\" data-type=\"{$bg['type']}\" data-title=\"{$bg['title']}\" data-count=\"".count($item_value)."\"><input class=\"input group group-{$bg['name']}\" type=\"hidden\" data-name=\"{$bg['name']}\" data-group=\"{$group['attribute']}\" data-type=\"{$bg['type']}\"><div class=\"add-container display-flex flex-center-center\" style=\"float: left; width: calc(100% / ".$opts['column']." - 17px);\" onclick=\"addInput(this, '{$bg['link']}', '{$bg['input-type']}');\"><span class=\"fa fa-plus\"></span></div>{$layout_str}</div><div class=\"clearfix\"></div>";
							break;
						default: break;
					}
				}
			}
			$group = array("class" => @$opts['group']!="" ? "group group-{$opts['name']}" : "", "attribute" => @$opts['group']!="" ? $opts['group'] : "");
			$limit = (is_array($opts['limit'])&&!empty($opts['limit']) ? $opts['limit'] : array());
			$limit_json = json_encode($limit);
			if(@$opts['nosub'] != "")
				$nosub = "nosub-".$opts['nosub'];
			else
				$nosub = "";
			$result = array("<div class=\"panel panel-primary panel-position {$class}\"><div class=\"panel-heading\">{$opts['title']}</div><div class=\"position-container panel-body {$nosub} ".(@$opts['lock']==true?"lock-panel":"")."\" data-limit='{$limit_json}'><input class=\"input {$group['class']}\" type=\"hidden\" name=\"position[{$opts['name']}]\" value=\"\" data-type=\"position\" data-name=\"{$opts['name']}\" data-value=\"\" data-group=\"{$group['attribute']}\">{$layout}<div class=\"clearfix\"></div><div class=\"sortable-container\"><div class=\"well sortable\" data-level=\"1\" data-limit=\"".@$limit['level-1']."\" data-index=\"{$group['attribute']}\" data-count=\"".count($row_position)."\" style=\"min-height: 50px;\">");
			foreach ($row_position as $k_position => $v_position) {
				$object = get_object_vars($v_position);
				$r_category = getItems(array("table" => "category", "id" => $object['id']));
				if(is_array($r_category) && !empty($r_category)) {
					$r_category['lock-attribute'] = "lock-{$r_category['lock']}"." ".(count(explode("category_image", $r_category['checkbox_admin']))>1 ? "" : "lock-image")." ".(count(explode("category_tab", $r_category['checkbox_admin']))>1 ? "" : "lock-tab");
					$dtt = $group['attribute'] . "-" . $k_position;
					$rs = "<div data-id=\"{$r_category['id']}\" data-t=\"{$dtt}\" data-type=\"{$r_category['type']}\" class=\"category {$r_category['lock-attribute']} enable-{$r_category['enable']} text-primary\"><div>{$r_category['title']} <span class=\"text-muted fa fa-lock\" title=\"Danh mục được khóa vì lý do kỹ thuật\" style=\"margin-top: 0; margin-left: 5px; cursor: help;\"></span></div><button class=\"close hidden\" type=\"button\" title=\"Gỡ bỏ\" onclick=\"removeCategory(this);\">x</button><button class=\"close edit\" type=\"button\" title=\"Chỉnh sửa\" onclick=\"editCategory(this);\"><span class=\"fa fa-pencil\"></span></button><button class=\"close children\" type=\"button\" title=\"Danh mục con\" onclick=\"toggleChildren(this);\" data-text=\"{$r_category['title']}\"><span class=\"fa fa-chevron-down\"></span></button><button class=\"close imglist\" type=\"button\" title=\"Danh sách ảnh\" onclick=\"showImageList(this);\"><span class=\"fa fa-image\"></span></button><button class=\"close tablist\" type=\"button\" title=\"Danh sách thẻ\" onclick=\"showTabList(this);\"><span class=\"fa fa-tag\"></span></button></div>";
					$result[] = $rs;
				}
				elseif(count(explode("o-", $object['id'])) > 1) {
					$r_option = getItems(array("table" => "option", "id" => str_replace("o-", "", $object['id'])));
					$dtt = $group['attribute'] . "-" . $k_position;
					if(is_array($r_option) && !empty($r_option)) {
						$rs = "<div data-id=\"o-{$r_option['id']}\" data-t=\"{$dtt}\" data-type=\"{$r_option['type']}\" class=\"category option enable-{$r_option['enable']} text-muted\"><div>{$r_option['title']}</div><button class=\"close hidden\" type=\"button\" title=\"Gỡ bỏ\" onclick=\"removeCategory(this);\">x</button><button class=\"close children\" type=\"button\" title=\"Danh mục con\" onclick=\"toggleChildren(this);\" data-text=\"{$r_option['title']}\"><span class=\"fa fa-chevron-down\"></span></button></div>";
						$result[] = $rs;
					}
				}
			}
			$result[] = "</div>";
			$result[] = getPositionPanel($group['attribute'], $row_position, $limit, $nosub, 1);
			$result[] = "</div></div>";
			$result[] = getPositionClose($group['attribute'], $row_position, $nosub, 1);
			$result[] = "</div>";
			break;
		case $opts['type'] == "container" || $opts['type'] == "template":
			$class = "";
			$column = 4;
			if($opts['fullwidth'] === true) {
				$class="fullwidth";
			}
			if(intval($opts['column']) > 0) {
				$column = $opts['column'];
			}
			$layout = "";
			if(is_array($opts['layout']) && !empty($opts['layout'])) {
				foreach ($opts['layout'] as $bg) {
					$item = getItems(array("table" => "layout", "id" => 0, "condition" => "where name like '{$bg['name']}'"));
					$group = array("class" => @$bg['group']!="" ? "group group-{$bg['name']}" : "", "attribute" => @$bg['group']!="" ? $bg['group'] : "");
					$link = array("attribute" => "", "function" => "", "class" => "");
					if(@$bg['group'] != "")
						$value = getGroupValues($item['value'], $bg['group']);
					elseif(@$bg['link'] === true)
						$value = getImageValues($item['value']);
					$item['value'] = $value['value'];
					$item['link'] = $value['link'];
					if($value['type'] == "text" || @$bg['input-type'] != "") {
						foreach ($row_language as $r_language)
							$item['value_'.$r_language['uri']] = $value['value_'.$r_language['uri']];
					}
					switch ($bg['type']) {
						case "image":
							if($bg['link'] === true) {
								$link = array(
									'attribute' => "data-link=\"".($item['link']!=""?$item['link']:"")."\"",
									'function' => "linkPopup('#{$bg['name']}_input_{$group['attribute']}', '{$bg['title']}');",
									'class' => "link"
								);
							}
							if(@$bg['input-type'] != "") {
								$input = array(
									'attribute' => "",
									'function' => "",
								);
								foreach ($row_language as $k_language => $r_language) {
									$input['attribute'] .= " data-value_{$r_language['uri']}='".$item['value_'.$r_language['uri']]."'";
									$input['function'] .= " {$bg['input-type']}Popup('#{$bg['name']}_input_{$group['attribute']}', 'value_{$r_language['uri']}', '{$bg['title']} {$r_language['title']}', {$k_language});";
								}
								$input['function'] = "{$link['function']}{$input['function']}";
							}
							else {
								$input['function'] = "{$link['function']}";
							}
							$layout .= "<div class=\"image-container\" style=\"float: left; width: calc(100% / ".min($column, count($opts['layout']))." - 16px);\"><button type=\"button\" class=\"close image-close\" onclick=\"$('#{$bg['name']}_input_{$group['attribute']}').val(''); $('#{$bg['name']}_input_{$group['attribute']}').attr('data-link', ''); $('#{$bg['name']}_img_{$group['attribute']}').attr('src','');\">x</button><div onclick=\"openBrowser('#{$bg['name']}_img_{$group['attribute']}', '#{$bg['name']}_input_{$group['attribute']}', false); {$input['function']}\"><img id=\"{$bg['name']}_img_{$group['attribute']}\" src=\"../{$item['value']}\" onerror=\"imgError(this)\" title=\"Chọn hình {$bg['title']}\" style=\"cursor: pointer;\"><input class=\"input layout-input {$group['class']} {$link['class']}\" id=\"{$bg['name']}_input_{$group['attribute']}\" name=\"{$bg['name']}\" type=\"hidden\" data-type=\"image\" value=\"{$item['value']}\" data-name=\"{$bg['name']}\" data-value=\"\" {$link['attribute']}{$input['attribute']} data-group=\"{$group['attribute']}\"><div class=\"image-label\">Hình {$bg['title']}</div></div></div>";
							break;
						case "mp4":
							if($bg['link'] === true) {
								$link = array(
									'attribute' => "data-link=\"".($item['link']!=""?$item['link']:"")."\"",
									'function' => "linkPopup('#{$bg['name']}_input_{$group['attribute']}', '{$bg['title']}');",
									'class' => "link"
								);
							}
							$layout .= "<div class=\"mp4-container\" style=\"float: left; width: calc(100% / ".min($column, count($opts['layout']))." - 16px);\"><button type=\"button\" class=\"close mp4-close\" onclick=\"$('#{$bg['name']}_input_{$group['attribute']}').val(''); $('#{$bg['name']}_input_{$group['attribute']}').attr('data-link', ''); $('#{$bg['name']}_img_{$group['attribute']}').attr('src','');\">x</button><div onclick=\"openBrowser('#{$bg['name']}_img_{$group['attribute']}', '#{$bg['name']}_input_{$group['attribute']}', false); {$link['function']}\"><video id=\"{$bg['name']}_img_{$group['attribute']}\" controls src=\"{$item['value']}\" title=\"Chọn video\" style=\"cursor: pointer;\">Your browser does not support the video tag.</video><input class=\"input layout-input {$group['class']} {$link['class']}\" id=\"{$bg['name']}_input_{$group['attribute']}\" name=\"{$bg['name']}\" type=\"hidden\" data-type=\"mp4\" value=\"{$item['value']}\" data-name=\"{$bg['name']}\" data-value=\"\" {$link['attribute']} data-group=\"{$group['attribute']}\"><div class=\"mp4-label\">Video {$bg['title']}</div></div></div>";
							break;
						case "color":
							$style = $item['value'] != "" ? "style=\"background-color: {$item['value']};\"" : "";
							$function = "colorPopup('#{$bg['name']}_input_{$group['attribute']}', '{$bg['title']}');";
							$layout .= "<div class=\"color-container\" style=\"float: left; width: calc(100% / ".min($column, count($opts['layout']))." - 16px);\"><button type=\"button\" class=\"close color-close\" onclick=\"$('#{$bg['name']}_input_{$group['attribute']}').val(''); $('#{$bg['name']}_input_{$group['attribute']}').css('background-color', '#eeeeee');\">x</button><input class=\"input layout-input form-control text-center {$group['class']}\" id=\"{$bg['name']}_input_{$group['attribute']}\" name=\"{$bg['name']}\" type=\"text\" value=\"{$item['value']}\" data-type=\"color\" data-name=\"{$bg['name']}\" data-value=\"\" data-group=\"{$group['attribute']}\" placeholder=\"Không màu\" onclick=\"{$function}\" {$style} multiple readonly><div class=\"color-label\">Màu {$bg['title']}</div></div>";
							break;
						case "video":
							$opacity = $item['value'] == "" ? "style=\"opacity:0;\"" : "";
							$layout .= "<div class=\"video-container\" style=\"float: left; width: calc(100% / ".min($column, count($opts['layout']))." - 16px);\"><button type=\"button\" class=\"close video-close\" onclick=\"$('#{$bg['name']}_input_{$group['attribute']}').val(''); $('#{$bg['name']}_video_{$group['attribute']}').css('opacity', '0');\">x</button><div class='iframe-container' title=\"Nhập link youtube video {$bg['title']}\" id=\"{$bg['name']}_video_{$group['attribute']}\" onclick=\"var result=prompt('Nhập link youtube video {$bg['title']}'); if(!result) return; $('#{$bg['name']}_input_{$group['attribute']}').val(result); $(this).find('iframe').attr('src', result.replace('/watch?v=', '/embed/')); $(this).css('opacity', '1');\" {$opacity}>".getYoutubeIframe($item['value'])."</div><input class=\"input layout-input {$group['class']}\" id=\"{$bg['name']}_input_{$group['attribute']}\" name=\"{$bg['name']}\" type=\"hidden\" value=\"{$item['value']}\" data-type=\"video\" data-name=\"{$bg['name']}\" data-value=\"\" data-group=\"{$group['attribute']}\"><div class=\"video-label\">Video {$bg['title']}</div></div>";
							break;
						case "input":
							$attribute = array();
							$function = array();
							foreach ($row_language as $k_language => $r_language) {
								$attribute[] = "data-value_{$r_language['uri']}='".$item['value_'.$r_language['uri']]."'";
								$fn = "inputPopup('#{$bg['name']}_input_{$group['attribute']}', 'value_{$r_language['uri']}', '{$bg['title']} {$r_language['title']}', {$k_language});";
								$function[] = $fn;
							}
							$attribute = implode("", $attribute);
							$function = implode(" ", $function);
							if($bg['link'] === true) {
								$link = array(
									'attribute' => "data-link=\"".($item['link']!=""?$item['link']:"")."\"",
									'function' => "linkPopup('#{$bg['name']}_input_{$group['attribute']}', '{$bg['title']}');",
									'class' => "link"
								);
							}
							$layout .= "<div class=\"text-container\" style=\"float: left; width: calc(100% / ".min($column, count($opts['layout']))." - 16px);\"><button type=\"button\" class=\"close text-close\" onclick=\"removeText('#{$bg['name']}_input_{$group['attribute']}');\">x</button><textarea class=\"input text form-control layout-input {$group['class']} {$link['class']}\" id=\"{$bg['name']}_input_{$group['attribute']}\" name=\"{$bg['name']}\" type=\"hidden\" data-type=\"text\" data-name=\"{$bg['name']}\" data-group=\"{$group['attribute']}\" {$link['attribute']} {$attribute} placeholder=\"Không có nội dung\" onclick=\"{$function}{$link['function']}\" readonly>{$item['value']}</textarea><div class=\"text-label\">Chuỗi {$bg['title']}</div></div>";
							break;
						case "email":
							$attribute = array();
							$function = array();
							foreach ($row_language as $k_language => $r_language) {
								$attribute[] = "data-value_{$r_language['uri']}='".$item['value_'.$r_language['uri']]."'";
								$fn = "emailPopup('#{$bg['name']}_input_{$group['attribute']}', 'value_{$r_language['uri']}', '{$bg['title']} {$r_language['title']}', {$k_language});";
								$function[] = $fn;
							}
							$attribute = implode("", $attribute);
							$function = implode(" ", $function);
							if($bg['link'] === true) {
								$link = array(
									'attribute' => "data-link=\"".($item['link']!=""?$item['link']:"")."\"",
									'function' => "linkPopup('#{$bg['name']}_input_{$group['attribute']}', '{$bg['title']}');",
									'class' => "link"
								);
							}
							$layout .= "<div class=\"text-container\" style=\"float: left; width: calc(100% / ".min($column, count($opts['layout']))." - 16px);\"><button type=\"button\" class=\"close text-close\" onclick=\"removeText('#{$bg['name']}_input_{$group['attribute']}');\">x</button><textarea class=\"input text form-control layout-input {$group['class']} {$link['class']}\" id=\"{$bg['name']}_input_{$group['attribute']}\" name=\"{$bg['name']}\" type=\"hidden\" data-type=\"text\" data-name=\"{$bg['name']}\" data-group=\"{$group['attribute']}\" {$link['attribute']} {$attribute} placeholder=\"Không có nội dung\" onclick=\"{$function}{$link['function']}\" readonly>{$item['value']}</textarea><div class=\"text-label\">Chuỗi {$bg['title']}</div></div>";
							break;
						case "tel":
							$attribute = array();
							$function = array();
							foreach ($row_language as $k_language => $r_language) {
								$attribute[] = "data-value_{$r_language['uri']}='".$item['value_'.$r_language['uri']]."'";
								$fn = "telPopup('#{$bg['name']}_input_{$group['attribute']}', 'value_{$r_language['uri']}', '{$bg['title']} {$r_language['title']}', {$k_language});";
								$function[] = $fn;
							}
							$attribute = implode("", $attribute);
							$function = implode(" ", $function);
							if($bg['link'] === true) {
								$link = array(
									'attribute' => "data-link=\"".($item['link']!=""?$item['link']:"")."\"",
									'function' => "linkPopup('#{$bg['name']}_input_{$group['attribute']}', '{$bg['title']}');",
									'class' => "link"
								);
							}
							$layout .= "<div class=\"text-container\" style=\"float: left; width: calc(100% / ".min($column, count($opts['layout']))." - 16px);\"><button type=\"button\" class=\"close text-close\" onclick=\"removeText('#{$bg['name']}_input_{$group['attribute']}');\">x</button><textarea class=\"input text form-control layout-input {$group['class']} {$link['class']}\" id=\"{$bg['name']}_input_{$group['attribute']}\" name=\"{$bg['name']}\" type=\"hidden\" data-type=\"text\" data-name=\"{$bg['name']}\" data-group=\"{$group['attribute']}\" {$link['attribute']} {$attribute} placeholder=\"Không có nội dung\" onclick=\"{$function}{$link['function']}\" readonly>{$item['value']}</textarea><div class=\"text-label\">Chuỗi {$bg['title']}</div></div>";
							break;
						case "text":
							$attribute = array();
							$function = array();
							foreach ($row_language as $k_language => $r_language) {
								$attribute[] = "data-value_{$r_language['uri']}='".$item['value_'.$r_language['uri']]."'";
								$fn = "textPopup('#{$bg['name']}_input_{$group['attribute']}', 'value_{$r_language['uri']}', '{$bg['title']} {$r_language['title']}', {$k_language});";
								$function[] = $fn;
							}
							$attribute = implode("", $attribute);
							$function = implode(" ", $function);
							if($bg['link'] === true) {
								$link = array(
									'attribute' => "data-link=\"".($item['link']!=""?$item['link']:"")."\"",
									'function' => "linkPopup('#{$bg['name']}_input_{$group['attribute']}', '{$bg['title']}');",
									'class' => "link"
								);
							}
							$layout .= "<div class=\"text-container\" style=\"float: left; width: calc(100% / ".min($column, count($opts['layout']))." - 16px);\"><button type=\"button\" class=\"close text-close\" onclick=\"removeText('#{$bg['name']}_input_{$group['attribute']}');\">x</button><textarea class=\"input text form-control layout-input {$group['class']} {$link['class']}\" id=\"{$bg['name']}_input_{$group['attribute']}\" name=\"{$bg['name']}\" type=\"hidden\" data-type=\"text\" data-name=\"{$bg['name']}\" data-group=\"{$group['attribute']}\" {$link['attribute']} {$attribute} placeholder=\"Không có nội dung\" onclick=\"{$function}{$link['function']}\" readonly>{$item['value']}</textarea><div class=\"text-label\">Chuỗi {$bg['title']}</div></div>";
							break;
						case "editor":
							$attribute = array();
							$function = array();
							foreach ($row_language as $k_language => $r_language) {
								$attribute[] = "data-value_{$r_language['uri']}='".$item['value_'.$r_language['uri']]."'";
								$fn = "editorPopup('#{$bg['name']}_input_{$group['attribute']}', 'value_{$r_language['uri']}', '{$bg['title']} {$r_language['title']}', {$k_language});";
								$function[] = $fn;
							}
							$attribute = implode("", $attribute);
							$function = implode(" ", $function);
							if($bg['link'] === true) {
								$link = array(
									'attribute' => "data-link=\"".($item['link']!=""?$item['link']:"")."\"",
									'function' => "linkPopup('#{$bg['name']}_input_{$group['attribute']}', '{$bg['title']}');",
									'class' => "link"
								);
							}
							$layout .= "<div class=\"text-container\" style=\"float: left; width: calc(100% / ".min($column, count($opts['layout']))." - 16px);\"><button type=\"button\" class=\"close text-close\" onclick=\"removeText('#{$bg['name']}_input_{$group['attribute']}');\">x</button><textarea class=\"input text form-control layout-input {$group['class']} {$link['class']}\" id=\"{$bg['name']}_input_{$group['attribute']}\" name=\"{$bg['name']}\" type=\"hidden\" data-type=\"text\" data-name=\"{$bg['name']}\" data-group=\"{$group['attribute']}\" {$link['attribute']} {$attribute} placeholder=\"Không có nội dung\" onclick=\"{$function}{$link['function']}\" readonly>{$item['value']}</textarea><div class=\"text-label\">Chuỗi {$bg['title']}</div></div>";
							break;
						case "image-list":
							$layout_str = "";
							$item_value = json_decode($item['value']);
							if (is_array($item_value) && !empty($item_value)) {
								foreach ($item_value as $k_item_value => $r_item_value) {
									$r_item_value_arr = get_object_vars($r_item_value);
									if($bg['link'] === true) {
										$link = array(
											'attribute' => "data-link=\"".($r_item_value_arr['link']!=""?$r_item_value_arr['link']:"")."\"",
											'function' => "linkPopup('#{$bg['name']}_input_{$group['attribute']}_{$k_item_value}', '{$bg['title']}');",
										);
									}
									if(@$bg['input-type'] != "") {
										$input = array(
											'attribute' => "",
											'function' => "",
										);
										foreach ($row_language as $k_language => $r_language) {
											$input['attribute'] .= " data-value_{$r_language['uri']}='".$r_item_value_arr['value_'.$r_language['uri']]."'";
											$input['function'] .= " {$bg['input-type']}Popup('#{$bg['name']}_input_{$group['attribute']}_{$k_item_value}', 'value_{$r_language['uri']}', '{$bg['title']} {$r_language['title']}', {$k_language});";
										}
										$input['function'] = "{$link['function']}{$input['function']}";
									}
									else {
										$input['function'] = "{$link['function']}";
									}
									$layout_str .= "<div class=\"image-container\" style=\"float: left; width: calc(100% / ".$opts['column']." - 17px);\"><button type=\"button\" class=\"close image-close\" onclick=\"$(this).parent().remove();\">x</button><div onclick=\"openBrowser('#{$bg['name']}_img_{$group['attribute']}_{$k_item_value}', '#{$bg['name']}_input_{$group['attribute']}_{$k_item_value}', false); {$input['function']}\"><img id=\"{$bg['name']}_img_{$group['attribute']}_{$k_item_value}\" src=\"../{$r_item_value->value}\" onerror=\"imgError(this)\" title=\"Chọn hình {$bg['title']}\" style=\"cursor: pointer;\"><input id=\"{$bg['name']}_input_{$group['attribute']}_{$k_item_value}\" name=\"{$bg['name']}[]\" type=\"hidden\" value=\"{$r_item_value->value}\" data-value=\"\" {$link['attribute']}{$input['attribute']}><div class=\"image-label\">Hình {$bg['title']}</div></div></div>";
								}
							}
							else
								$item['value'] = array();
							$layout .= "<div class=\"clearfix\"></div><div class=\"image-list-container\" data-name=\"{$bg['name']}\" data-group=\"{$group['attribute']}\" data-type=\"{$bg['type']}\" data-title=\"{$bg['title']}\" data-count=\"".count($item_value)."\"><input class=\"input group group-{$bg['name']}\" type=\"hidden\" data-name=\"{$bg['name']}\" data-group=\"{$group['attribute']}\" data-type=\"{$bg['type']}\"><div class=\"add-container display-flex flex-center-center\" style=\"float: left; width: calc(100% / ".$opts['column']." - 17px);\" onclick=\"addImage(this, '{$bg['link']}', '{$bg['input-type']}');\"><span class=\"fa fa-plus\"></span></div>{$layout_str}</div><div class=\"clearfix\"></div>";
							break;
						case "input-list":
							$layout_str = "";
							$item_value = json_decode($item['value']);
							if (is_array($item_value) && !empty($item_value)) {
								foreach ($item_value as $k_item_value => $r_item_value) {
									$r_item_value_arr = get_object_vars($r_item_value);
									if($bg['link'] === true) {
										$link = array(
											'attribute' => "data-link=\"".($r_item_value_arr['link']!=""?$r_item_value_arr['link']:"")."\"",
											'function' => "linkPopup('#{$bg['name']}_input_{$group['attribute']}_{$k_item_value}', '{$bg['title']}');",
										);
									}
									if(@$bg['input-type'] != "") {
										$input = array(
											'attribute' => "",
											'function' => "",
										);
										foreach ($row_language as $k_language => $r_language) {
											$input['attribute'] .= " data-value_{$r_language['uri']}='".$r_item_value_arr['value_'.$r_language['uri']]."'";
											$input['function'] .= " {$bg['input-type']}Popup('#{$bg['name']}_input_{$group['attribute']}_{$k_item_value}', 'value_{$r_language['uri']}', '{$bg['title']} {$r_language['title']}', {$k_language});";
										}
										$input['function'] = "{$link['function']}{$input['function']}";
									}
									else {
										$input['function'] = $link['function'];
									}
									$layout_str .= "<div class=\"text-container\" style=\"float: left; width: calc(100% / ".$opts['column']." - 17px);\"><button type=\"button\" class=\"close text-close\" onclick=\"$(this).parent().remove();\">x</button><div onclick=\"{$input['function']}\"><textarea class=\"form-control\" id=\"{$bg['name']}_input_{$group['attribute']}_{$k_item_value}\" name=\"{$bg['name']}[]\" type=\"hidden\" data-value=\"\" data-type=\"text\" {$link['attribute']}{$input['attribute']} placeholder=\"Không có nội dung\" readonly>{$r_item_value_arr['value_'.$row_language[0]['uri']]}</textarea><div class=\"text-label\">Chuỗi {$bg['title']}</div></div></div>";
								}
							}
							else
								$item['value'] = array();
							$layout .= "<div class=\"clearfix\"></div><div class=\"input-list-container\" data-name=\"{$bg['name']}\" data-group=\"{$group['attribute']}\" data-type=\"{$bg['type']}\" data-title=\"{$bg['title']}\" data-count=\"".count($item_value)."\"><input class=\"input group group-{$bg['name']}\" type=\"hidden\" data-name=\"{$bg['name']}\" data-group=\"{$group['attribute']}\" data-type=\"{$bg['type']}\"><div class=\"add-container display-flex flex-center-center\" style=\"float: left; width: calc(100% / ".$opts['column']." - 17px);\" onclick=\"addInput(this, '{$bg['link']}', '{$bg['input-type']}');\"><span class=\"fa fa-plus\"></span></div>{$layout_str}</div><div class=\"clearfix\"></div>";
							break;
						default: break;
					}
				}
			}
			$result = array("<div class=\"panel panel-primary panel-position {$class}\"><div class=\"panel-heading\">{$opts['title']}</div><div class=\"position-container panel-body ".(@$opts['lock']==true?"lock-panel":"")."\">{$layout}<div class=\"clearfix\"></div>");
			$result[] = "</div></div>";
			break;
		default:
			return "Error!";
			break;
	}
	return implode("", $result);
}
function getGroupValues($value, $name) {
	global $row_language;
	$value = json_decode($value);
	foreach ($value as $v) {
		if($v->name == $name) {
			if($v->type == "text") {
				$v = get_object_vars($v);
				$v['value'] = get_object_vars(json_decode($v['value']));
				foreach ($row_language as $r_language)
					$v['value_'.$r_language['uri']] = $v['value'][$r_language['uri']];
				$v['value'] = $v['value_'.$row_language[0]['uri']];
				return $v;
			}
			if($v->type == "position") {
				$v = get_object_vars($v);
				$v['value'] = json_decode($v['value']);
				return $v;
			}
			return get_object_vars($v);
		}
	}
}
function getImageValues($value) {
	$value = json_decode($value);
	return get_object_vars($value);
}
function getPositionPanel($attribute, $row_position, $limit, $nosub, $k) {
	if($nosub!="" && $k>=intval(preg_replace('/\D/i', '', $nosub)))
		return;
	$rst = array();
	foreach ($row_position as $k_position => $v_position) {
		$object = get_object_vars($v_position);
		$dtt = $attribute . "-" . $k_position;
		// $lms = intval(@$limit_sub);
		// if($lms == 0)
		// 	$lms = '';
		// else
		// 	$lms = 'data-limit="'.$lms.'"';
		$rsp = array('<div class="sortable children n-'.$dtt.' ui-sortable" data-limit="'.@$limit['level-'.($k+1)].'" data-level="'.($k+1).'" data-index="'.$dtt.'" data-count="'.count($object['value']).'">');
		foreach ($object['value'] as $k_cat => $r_cat) {
			$object2 = get_object_vars($r_cat);
			$dtt2 = $dtt . "-" . $k_cat;
			$r_category = getItems(array("table" => "category", "id" => $object2['id']));
			if(is_array($r_category) && !empty($r_category)) {
				$r_category['lock-attribute'] = "lock-{$r_category['lock']}"." ".(count(explode("category_image", $r_category['checkbox_admin']))>1 ? "" : "lock-image")." ".(count(explode("category_tab", $r_category['checkbox_admin']))>1 ? "" : "lock-tab");
				$rsp[] = "<div data-id=\"{$r_category['id']}\" data-t=\"{$dtt2}\" data-type=\"{$r_category['type']}\" class=\"category {$r_category['lock-attribute']} enable-{$r_category['enable']} text-primary\"><div>{$r_category['title']} <span class=\"text-muted fa fa-lock\" title=\"Danh mục được khóa vì lý do kỹ thuật\" style=\"margin-top: 0; margin-left: 5px; cursor: help;\"></span></div><button class=\"close hidden\" type=\"button\" title=\"Gỡ bỏ\" onclick=\"removeCategory(this);\">x</button><button class=\"close edit\" type=\"button\" title=\"Chỉnh sửa\" onclick=\"editCategory(this);\"><span class=\"fa fa-pencil\"></span></button><button class=\"close children\" type=\"button\" title=\"Danh mục con\" onclick=\"toggleChildren(this);\" data-text=\"{$r_category['title']}\"><span class=\"fa fa-chevron-down\"></span></button><button class=\"close imglist\" type=\"button\" title=\"Danh sách ảnh\" onclick=\"showImageList(this);\"><span class=\"fa fa-image\"></span></button><button class=\"close tablist\" type=\"button\" title=\"Danh sách thẻ\" onclick=\"showTabList(this);\"><span class=\"fa fa-tag\"></span></button></div>";
			}
			elseif(count(explode("o-", $object2['id'])) > 1) {
				$r_option = getItems(array("table" => "option", "id" => str_replace("o-", "", $object2['id'])));
				$rsp[] = "<div data-id=\"o-{$r_option['id']}\" data-t=\"{$dtt2}\" data-type=\"{$r_option['type']}\" class=\"category option enable-{$r_option['enable']} text-muted\"><div>{$r_option['title']}</div><button class=\"close hidden\" type=\"button\" title=\"Gỡ bỏ\" onclick=\"removeCategory(this);\">x</button><button class=\"close children\" type=\"button\" title=\"Danh mục con\" onclick=\"toggleChildren(this);\" data-text=\"{$r_option['title']}\"><span class=\"fa fa-chevron-down\"></span></button></div>";
			}
		}
		$rsp[] = "</div>";
		$rst[] = implode("", $rsp);
		if(is_array($object['value']) && !empty($object['value'])) {
			$rst[] = getPositionPanel($dtt, $object['value'], $limit, $nosub, $k+1);
		}
	}
	return implode("", $rst);
}
function getPositionClose($attribute, $row_position, $nosub, $k) {
	if($nosub!="" && $k>=intval(preg_replace('/\D/i', '', $nosub)))
		return;
	$clt = array();
	foreach ($row_position as $k_position => $v_position) {
		$object = get_object_vars($v_position);
		$r_category = getItems(array("table" => "category", "id" => $object['id']));
		$dtt = $attribute . "-" . $k_position;
		if(is_array($r_category) && !empty($r_category)) {
			$clt[] = '<button class="children-close btn btn-default n-'.$dtt.'" type="button" onclick="$(this).fadeOut(500); $(\'.sortable.children.n-'.$dtt.'\').animate({ height: 0 }, 500); $(\'.children-close.n-'.$attribute.'\').fadeIn(500);"><b>'.$r_category['title'].'</b>&nbsp;<span class="fa fa-close"></span></button>';
		}
		elseif(count(explode("o-", $object['id'])) > 1) {
			$r_option = getItems(array("table" => "option", "id" => str_replace("o-", "", $object['id'])));
			$clt[] = '<button class="children-close btn btn-default n-'.$dtt.'" type="button" onclick="$(this).fadeOut(500); $(\'.sortable.children.n-'.$dtt.'\').animate({ height: 0 }, 500); $(\'.children-close.n-'.$attribute.'\').fadeIn(500);"><b>'.$r_option['title'].'</b>&nbsp;<span class="fa fa-close"></span></button>';
		}
		if(is_array($object['value']) && !empty($object['value']))
			$clt[] = getPositionClose($dtt, $object['value'], $nosub, $k+1);
	}
	return implode("", $clt);
}
?>