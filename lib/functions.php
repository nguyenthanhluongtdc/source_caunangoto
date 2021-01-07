<?php
if(!defined('_lib')) die("Error");

function closeWindow($s=false){
	if($s === false)
		echo '<meta charset="utf-8"><script language="javascript"> window.close(); </script>';
	else
		echo '<meta charset="utf-8"><script language="javascript"> alert("'.$s.'"); window.close(); </script>';
}
function alert($s){
	echo '<meta charset="utf-8"><script language="javascript"> alert("'.$s.'") </script>';
}
function back($n=1){
	echo '<script language="javascript">history.go("'.-intval($n).'");</script>';
	exit(1);
}
function delete_file($file){
	return @unlink(realpath("../" . $file));
}
function redirect($url='', $root=false){
	if($root)
		echo '<script language="javascript">window.location = "'.getBaseURL().$url.'" </script>';
	else
		echo '<script language="javascript">window.location = "'.$url.'" </script>';
	exit(1);
}
function show_error() {
	redirect(getBaseURL(true, false) . "404.html");
}
function getHostURL() {
    $pageURL = 'http';
	if(isset($_SERVER["HTTPS"])){
    if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}}
    	$pageURL .= "://";
    $pageURL .= $_SERVER["SERVER_NAME"].':8080';
    return $pageURL;
}
function getCurrentPageURL($str="", $page=true, $lang=true) {
    $pageURL = 'http';
	if(isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on")
		$pageURL .= "s";
  $pageURL .= "://";
  $pageURL .= $_SERVER["SERVER_NAME"].':8080'.str_replace(".html", "", $_SERVER["REQUEST_URI"]);
  if($page === false) {
		$pageURL = explode("/p=", $pageURL);
		if(count($pageURL) <= 1)
			$pageURL = explode("&p=", $pageURL[0]);
		$pageURL = $pageURL[0];
	}
	// if($_REQUEST['lang']=="" && $lang===true && count(explode("/admin/", $_SERVER['REQUEST_URI']))<=1)
	// 	$pageURL .= $_REQUEST['lang']."/";
	return $pageURL.$str;
}
function getURL($uri, $root=false, $lang=true){
	global $db;
	if($uri=="")
		return getBaseURL($root);
	if(count(explode(":8080//", $uri)) > 1 || count(explode("index.php", $uri)) > 1 || in_array($uri, array( "javascript:void(0);", "javascript:void(0)" )))
		return $uri;
	if(in_array($uri, array( "//", "#", "." )))
		return getBaseURL($root) . $uri;
	$uri = explode("/", $uri);
	for($i=0; $i<count($uri); $i++):
		$uri[$i] = changeTitle($uri[$i]);
	endfor;
	$uri = implode("/", $uri);
	return getBaseURL($root, $lang).$uri.".html";
}
function getBaseURL($root=false, $lang=true){
	if(strlen($_REQUEST['param-1'])==2 && $_REQUEST['lang']==$_REQUEST['param-1'])
		$lang = false;
	$server= $_SERVER['PHP_SELF'];
	if($root)
		$server = str_replace("admin/", "", $server);
	if($_REQUEST['lang']!="" && $lang===true)
		$server .= $_REQUEST['lang']."/";
	return str_replace("index.php", "", $server);
}
function changeTitle($str, $r = true){
	$str = stripUnicode($str);
	$str = mb_convert_case($str,MB_CASE_LOWER,'utf-8');
	$str = preg_replace('/([^a-zA-Z0-9]+)/', ' ', $str);
	if ($r === true)
		$str = preg_replace('/\s/', '-', trim($str));
	return $str;
}
function stripUnicode($str){
  if(!$str) return false;
   $unicode = array(
     'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
     'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
     'd'=>'đ',
     'D'=>'Đ',
     'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
   	  'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
   	  'i'=>'í|ì|ỉ|ĩ|ị',
   	  'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
     'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
   	  'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
     'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
   	  'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
     'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
     'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
   );
   foreach($unicode as $khongdau=>$codau) {
     	$arr=explode("|",$codau);
     	foreach ($arr as $value) {
     		$str = str_replace($value,$khongdau,$str);
     	}

   }
   return $str;
}
function checkURI($table, $obj) {
	global $db;
	$tables = array( "category", "product", "post", "option", "language" );
	if(!in_array($table, $tables))
		return $obj['uri'];

	for($u=0; ; $u++) {
		$error = 0;
		foreach ($tables as $value) {
			$where_option = ($value=="option" ? "uri_enable like '1' and" : ($value=="category" ? "checkbox_admin not like '%uri%' and" : "true and"));
			$condition = "";
			if($value == $table)
				$condition = "and id not like '{$obj['id']}'";
			$db->query("select id from #_{$value} where {$where_option} uri like '" . $obj['uri'] . ($u>0 ? "-".$u : "") . "' " . $condition);
			if( $db->num_rows() > 0 || in_array($obj['uri'] . ($u>0 ? "-".$u : ""), array("index")) ) {
				$error = 1;
				break;
			}
		}
		if($error == 0)
			return $obj['uri'] . ($u>0 ? "-".$u : "");
	}
}
function getYoutubeId($url) {
	$url = explode("&", $url);
	$url = $url[0];
	$url = explode("/watch?v=", $url);
	if(count($url) > 1)
		return $url[1];
	else
		$url = implode("", $url);
	$url = explode("/embed/", $url);
	if(count($url) > 1)
		return $url[1];
	else
		$url = implode("", $url);
	$url = explode("youtu.be/", $url);
	if(count($url) > 1)
		return $url[1];
	else
		$url = implode("", $url);
	return false;
}
function getYoutubeImg($url) {
	return "http".($_SERVER['HTTPS']=="on"?"s":"")."://img.youtube.com/vi/".getYoutubeId($url)."/0.jpg";
}
function getYoutubeEmbed($url) {
	return "http".($_SERVER['HTTPS']=="on"?"s":"")."://www.youtube.com/embed/".getYoutubeId($url)."?rel=0";
}
function getYoutubeIframe($url, $size = array("width" => "100%", "height" => "auto")) {
	return '<iframe width="'.$size['height'].'" height="'.$size['height'].'" src="'.getYoutubeEmbed($url).'" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
	// return "<iframe width='100%' height='auto' src='".getYoutubeEmbed($url)."' frameborder='0' allow='autoplay; encrypted-media' allowfullscreen></iframe>";
}
function getUser() {
	global $db;
	if(@$_COOKIE['user']['username'] == "")
		return false;
	$db->query("select * from #_account where username like '{$_COOKIE['user']['username']}'");
	if($db->num_rows() == 0)
		return false;
	$result = $db->fetch_array();
	return $result;
}
function checkAdmin($d = null) {
  $result = getUser();
	return (@$result['type'] == "admin" || @$result['type'] == "master");
}
function getAjaxURL($name){
	return getHostURL().getBaseURL(true, false)."admin/ajax/".$name;
}
function dump($var){
	if (is_array($var)) {
		echo "<pre>";
		print_r($var);
		echo "</pre>";
	}
	else
		var_dump($var);
}
function getTranslate($table, $language_id, $item_id, $column="*") {
	global $db;
	$db->query("select {$column} from #_translate where language_id like '{$language_id}' and item_id like '{$item_id}' and table_name like '{$table}'");
	$result = $db->fetch_array();
	unset($result['id']);
	unset($result['item_id']);
	unset($result['language_id']);
	return $result;
}
function getItems($args = array()) {
	global $db, $pagination;
	$options = array( "table" => false, "id" => false, "ids" => false, "condition" => false, "offset" => 0, "limit" => false, "pagination" => false, "paged" => false, "relationship" => "and", "orderby" => array("id asc") );
	foreach ($args as $key => $value)
		$options[$key] = $value;
	if ($options["table"] === false) {
		return false;
	}
	elseif ($options["condition"] !== false) {
		$sql = "select * from #_{$options["table"]} {$options["condition"]}";
	}
	else {
		$sql = "select * from #_{$options["table"]}";
		$condition = array();
		if($options["id"] !== false)
			$condition[] = "id like '{$options["id"]}'";
		if($ids !== false) {
			if(is_array($options["ids"]) && !empty($options["ids"]))
				$condition[] = "id in (".implode(",", $options["ids"]).")";
			elseif(trim($options["ids"]) != "")
				$condition[] = "id in ({$options["ids"]})";
		}
		if(!empty($condition))
			$sql .= " where ".implode(" ".$options["relationship"]." ", $condition);
		if(is_array($options["orderby"]) && !empty($options["orderby"]))
			$orderby = " order by ".implode(",", $options["orderby"]);
		else
			$orderby = "";
		$sql .= $orderby;
	}
	$db->query($sql);
	if($db->num_rows() == 0)
		return false;
	$items = $db->result_array();
	if($options["id"] === false) {
		if($options["limit"] !== false) {
			if($options["pagination"] === true) {
				if($options["paged"] !== false)
					$items = $pagination->paging($items, $options["limit"], $options["paged"]);
				else
					$items = $pagination->paging($items, $options["limit"]);
			}
			else {
				$items = array_slice($items, $options["offset"], $options["limit"]);
			}
		}
		elseif($options["offset"] > 0)
			$items = array_slice($items, $options["offset"]);
	}
	for($i=0; $i<count($items); $i++):
		$translate = getTranslate($options['table'], $_SESSION['lang']['id'], $items[$i]['id']);
		foreach($translate as $column => $value):
			$items[$i][$column] = $value;
		endforeach;
	endfor;
	if($options["id"] !== false) {
		return $items[0];
	}
	return $items;
}
function getLayoutCategory($row_category) {
	global $db;
	$category = array();
	foreach ($row_category as $rc) {
		$object = get_object_vars($rc);
		$db->query("select * from #_category where id like '{$object['id']}' limit 1");
		if($db->num_rows() > 0) {
			$category[] = $db->fetch_array();
		}
		elseif(count(explode("o-", $object['id'])) > 1) {
			$db->query("select *, 1 as 'option' from #_option where id like '".str_replace("o-", "", $object['id'])."' limit 1");
			if($db->num_rows() > 0) {
				$category[] = $db->fetch_array();
			}
		}
	}
	for($i=0; $i<count($category); $i++):
		$translate = getTranslate(@$category[$i]['option']!=1 ? "category" : "option", $_SESSION['lang']['id'], $category[$i]['id']);
		foreach($translate as $column => $value):
			if($column != "id")
				$category[$i][$column] = $value;
		endforeach;
		$temp = get_object_vars($row_category[$i]);
		$category[$i]['child'] = getLayoutCategory($temp['value']);
		if(@$category[$i]['option'] != 1) {
			if ($information['theme']!="" && is_file(_theme.$information['theme']."/admin/category.json")) {
				$row_type = getObjectVars(json_decode(file_get_contents(_theme.$information['theme']."/admin/category.json")));
				$row_type = @$row_type['edit']['checkbox_admin']['list']['category_extend'];
				$row_type["image"] = "Danh sách ảnh";
			}
			foreach (@$row_type as $k_type => $r_type)
				$category[$i][$k_type] = getItems(array("table" => "category_extend", "condition" => "where type like '{$k_type}' and enable>0 and category_id like '{$category[$i]['id']}' order by `index`"));
		}
	endfor;
	return $category;
}
function getLayout($name) {
	global $db, $pagination;
	if($name === false)
		return false;
	$db->query("select * from #_layout where name like '{$name}' limit 1");
	if($db->num_rows() <= 0)
		return false;
	$r_layout = $db->fetch_array();
	$items = array();
	switch (true) {
		case $r_layout['type'] == "group":
			$value = json_decode($r_layout['value']);
			foreach ($value as $v) {
				$t = get_object_vars($v);
				switch($t['type']) {
					case "position":
						$r_position = json_decode($t['value']);
						$items[$t['name']] = getLayoutCategory($r_position);
						break;
					case "image":
						$items[$t['name']] = array("thumbnail" => $t['value'], "title" => $t['value_'.$_SESSION['lang']['uri']], "value" => $t['value_'.$_SESSION['lang']['uri']], "link" => $t['link']);
						break;
					case "mp4":
						$items[$t['name']] = $t['value'];
						break;
					case "color":
						$items[$t['name']] = $t['value'];
						break;
					case "text":
						$value = get_object_vars(json_decode($t['value']));
						$items[$t['name']] =  array("value" => $value[$_SESSION['lang']['uri']], "link" => $t['link']);
						break;
					case "video":
						$items[$t['name']] = array("thumbnail" => getYoutubeImg($t['value']), "link" => $t['value'], "iframe" => getYoutubeIframe($t['value']));
						break;
					case "image-list":
						$value_arr = json_decode($t['value']);
						$result_item = array();
						foreach ($value_arr as $r_value) {
							$r_value_arr = get_object_vars($r_value);
							$result_item[] = array("thumbnail" => $r_value_arr['value'], "title" => $r_value_arr['value_'.$_SESSION['lang']['uri']], "value" => $r_value_arr['value_'.$_SESSION['lang']['uri']], "link" => $r_value_arr['link']);
						}
						$items[$t['name']] = $result_item;
						break;
					case "input-list":
						$value_arr = json_decode($t['value']);
						$result_item = array();
						foreach ($value_arr as $r_value) {
							$r_value_arr = get_object_vars($r_value);
							$result_item[] = array("title" => $r_value_arr['value_'.$_SESSION['lang']['uri']], "value" => $r_value_arr['value_'.$_SESSION['lang']['uri']], "link" => $r_value_arr['link']);
						}
						$items[$t['name']] = $result_item;
						break;
				}
			}
			return $items;
			break;
		case $r_layout['type'] == "position":
			$r_position = json_decode($r_layout['value']);
			$items = getLayoutCategory($r_position);
			return $items;
			break;
		case $r_layout['type'] == "image":
			$value = json_decode($r_layout['value']);
			return get_object_vars($value);
			break;
		case $r_layout['type'] == "mp4":
			return $r_layout['value'];
			break;
		case $r_layout['type'] == "color":
			return $r_layout['value'];
			break;
		case $r_layout['type'] == "text":
			$value = get_object_vars(json_decode($r_layout['value']));
			return array("value" => $value[$_SESSION['lang']['uri']], "link" => $r_layout['link']);
			break;
		case $r_layout['type'] == "video":
			$value = json_decode($r_layout['value']);
			$value->iframe = getYoutubeIframe($value->value);
			return get_object_vars($value);
			break;
		default:
			return $r_layout['value'];
			break;
	}
	return false;
}
function getObjectVars($obj) {
	if (is_object($obj)) {
		$arr = get_object_vars($obj);
		foreach ($arr as $k => $v)
			$arr[$k] = getObjectVars($v);
		return $arr;
	}
	elseif (is_array($obj)) {
		$arr = $obj;
		foreach ($arr as $k => $v)
			$arr[$k] = getObjectVars($v);
		return $arr;
	}
	else
		return $obj;
}
function arraySync($arr) {
	if (!is_array($arr))
		return $arr;
	if (is_array($arr['default'])) {
		foreach ($arr as $k_arr => $v_arr) {
			if ($k_arr == "default")
				continue;
			foreach ($arr['default'] as $k_default => $v_default)
				$arr[$k_arr] = arrayMerge($arr['default'], $v_arr);
		}
	}
	return $arr;
}
function arrayMerge($arr1, $arr2) {
	if (!is_array($arr1) || !is_array($arr2)) {
		if (@$arr2 != "")
			return $arr2;
		else
			return $arr1;
	}
	$arr = array();
	foreach (array_merge(array_keys($arr1), array_keys($arr2)) as $key) {
		$arr[$key] = arrayMerge(@$arr1[$key], @$arr2[$key]);
	}
	return $arr;
}
function saveItem($args = array()) {
	global $db;
	$options = array( "table" => false, "data" => array(), "condition" => "", "affix" => "", "insert" => false );
	foreach ($args as $key => $value)
		$options[$key] = $value;
	if($options['table'] === false)
		return false;
	if($options['affix']!="")
		$options['affix'] = "_".$options['affix'];
	$item = array();
	foreach ($options['data'] as $index) {
		if($index == "uri") {
			if($_POST["uri"]!="") {
				$item["uri"] = $_POST["uri"];
			}
			else
				$item["uri"] = changeTitle(trim($_POST["title"]));
		}
		elseif($index == "password")
			$item["password"] = md5($_POST["password"]);
		elseif($index == "create_date") {
			if($options['condition'] == "")
				$item["create_date"] = time();
		}
		else
			$item[$index] = trim($_POST[$index.$options['affix']]);
	}

	$db->setTable($options['table']);
	if($options['insert']===false && $options['condition'] != "") {
		$db->setCondition($options['condition']);
		$db->select();
		if($db->num_rows()==0 && in_array($options['table'], array( "translate", "contact" ))) {
			$item["id"] = $db->getMaxId($options['table']);
			$db->setCondition();
			return $db->insert($item);
		}
		if(@$item["uri"] != "") {
			$db->select();
			$item["id"] = $db->fetch_array();
			$item["id"] = $item["id"]["id"];
			if($_POST["uri"]=="")
				$item["uri"] = checkURI($options['table'], $item);
		}
		return $db->update($item);
	}
	else {
		if($_POST["id{$options['affix']}"]!="" && $options['table']!="translate")
			$item["id"] = $_POST["id{$options['affix']}"];
		else
			$item["id"] = $db->getMaxId($options['table']);
		if(@$item["uri"] != "" && $_POST["uri"]=="")
			$item["uri"] = checkURI($options['table'], $item);
		$db->setCondition();
		return $db->insert($item);
	}
}
function getFilter($filterStr, $prefix = "") {
	$filter = array();
	if(@$_SESSION[$filterStr] == "")
		return "";
	foreach ($_SESSION[$filterStr] as $key => $value)
		if($value != "") {
			if(count(explode("_id", $key)) > 1)
				$filter[] = "find_in_set({$value}, {$key})";
				// $filter[] = "({$key} like '{$value}' or {$key} like '%,{$value}' or {$key} like '{$value},%' or {$key} like '%,{$value},%')";
			elseif($key=="title" && $_GET['com']=="product" && $_GET['act']=="list") {
				$filter[] = "({$key} like '%{$value}%' or serial like '%{$value}%' or serial_international like '%{$value}%')";
			}
			else
				$filter[] = "{$key} like '%{$value}%'";
		}
	if(empty($filter))
		return "";
	return $prefix." ".implode(" and ", $filter);
}

function getCategoryPath($id = "") {
	global $db;
	$cat = getItems(array("table" => "category", "id" => $id));
	if($id == "" || !is_array($cat) || empty($cat))
		return "";
	$id_list = array($cat['parent_id'] => $cat['title']);
	$not_list = array($cat['id']);
	do {
		$row_category = getItems(array("table", "category", "condition" => "where id in (".implode(",", array_keys($id_list)).") and id not in (".implode(",", $not_list).") and type like '{$cat['type']}'"));
		foreach ($row_category as $r_category) {
			$id_list[$r_category['parent_id']] = $r_category['title'];
			$not_list[] = $r_category['id'];
		}
	} while (is_array($row_category) && !empty($row_category));
	$id_list = array_reverse($id_list);
	return implode(" / ", array_values($id_list));
}

function getSize($width, $height) {
	return "<div>(&nbsp;<font style=\"color:red; font-weight: 900;\">{$width}</font>px&nbsp;&nbsp;*&nbsp;&nbsp;<font style=\"color:red; font-weight: 900;\">{$height}</font>px&nbsp;)</div>";
}

function getPriceSale($product, $suffix = "đ", $errStr = "Liên hệ") {
	if(floatval($product['price_sale']) > 0)
		return format($product['price_sale']).$suffix;
	elseif(floatval($product['price']) > 0)
		return format($product['price']). $suffix;
	else
		return $errStr;
}
function getPriceOrigin($product, $suffix = "đ") {
	if(floatval($product['price_sale']) > 0 && floatval($product['price']) > 0)
		return format($product['price']).$suffix;
	else
		return "";
}

function getThumbnailUrl($str, $prefix = "../") {
	if (@$str == "")
		return "";
	if (count(explode("//", $str)) > 1)
		return $str;
	else
		return $prefix . $str;
}

// r=0  : Giữ kích thước hình gốc
// r=1  : Theo kích thước quy định
// r="" : Giữ kích thước hình cũ với max-width = 1366px;
// space=0 : Cắt hình;
// space=1 : Thu gọn hình với nền trong suốt;
// space=2 : Thu gọn hình với nền trắng;
function getResizedImageURL($src, $w, $h, $r="1", $space="0") {
	if(!is_file($src))
		return "./assets/img/no-image.png";
	$basename = explode(".", basename($src));
	$end = array_pop($basename);
	if (in_array($end, array( ".gif" )))
		return $src;
	array_push($basename, $w."x".$h."_".$r."_".$space."_".filesize($src));
	$basename = implode("_", $basename).".png";
	$foldername = explode("upload/", $src);
	$foldername = $foldername[0];
	if (is_file("./{$foldername}upload/.cache/".$basename))
		return "./{$foldername}upload/.cache/".$basename;
	return "./media/images?src={$src}&w={$w}&h={$h}&r={$r}&space={$space}";
}

function subString($str, $offset, $length) {
	$str = mb_ereg_replace('\s+', ' ', $str, "UTF-8");
	$str = explode(" ", $str);
	return implode(" ", array_slice($str, $offset, $length)).(count($str) > $length - $offset ? " ..." : "");
}


function format($str, $c = ",") {
	return str_replace(",", $c, number_format($str));
}

function getBreadcrumbString($args = array()) {
	global $config_url, $information;
	$breadcrumb_array = array(array( "level" => "1", "link" => $config_url, "title" => $information['title'] ));
	$row_emp = $args['items'];
	foreach ($row_emp as $k_emp => $r_emp) {
		$breadcrumb_array[] = array(
			"level" => $k_emp + 2,
			"link" => $config_url."/".$r_emp['uri'].".html",
			"title" => $r_emp['title']
		);
	}
	$str = "<script type='application/ld+json'>{";
	$str .= '"@context":"https://schema.org",';
	$str .= '"@type":"BreadcrumbList",';
	$str .= '"itemListElement":[';
	foreach ($breadcrumb_array as $kbr => $br):
		$str .= '{';
		$str .= '"@type":"ListItem",';
		$str .= '"position":'.$br['level'].',';
		$str .= '"item":{';
		$str .= '"@id":"'.$br['link'].'",';
		$str .= '"name":"'.$br['title'].'"';
		$str .= '}';
		$str .= '}';
		if($kbr < count($breadcrumb_array)-1)
			$str .= ',';
	endforeach;
	$str .= "]}</script>";
	return $str;
}
?>
