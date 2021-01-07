<?php
session_start();
date_default_timezone_set("Asia/Ho_Chi_Minh");
@define ( '_template' , '../../templates/');
@define ( '_source' , '../../sources/');
@define ( '_lib' , '../../lib/');
include_once _lib."config.php";
include_once _lib."class.database.php";
// include_once _lib."pagination.php";
include_once _lib."functions.php";
$db = new database($config['database']);
$logged = @$_COOKIE['user']['username'] != "";

$db->setTable($_POST['table']);
$db->setCondition("where id like '".$_POST['id']."'");
if($_POST['table'] == 'online'){
	if (!isset($_SERVER['REMOTE_ADDR']) || !isset($_POST['id']))
		redirect('404.html');
	date_default_timezone_set("Asia/Ho_Chi_Minh");
	$db->select();
	if($db->num_rows() == 0)
		$db->insert(array('id' => session_id(), 'time' => time(), 'ip' => $_SERVER['REMOTE_ADDR']));
	else
		$db->update(array('time' => time(), 'ip' => $_SERVER['REMOTE_ADDR']));
	$db->setCondition(sprintf("where time > %d", time() - (60*15)));
	$db->select();
	echo $db->num_rows() . "&";
	$db->setCondition(sprintf("where time <= %d and time > %d", time(), strtotime('today')));
	$db->select();
	echo $db->num_rows() . "&";
	$db->setCondition(sprintf("where time <= %d and time > %d", time(), strtotime('monday this week')));
	$db->select();
	echo $db->num_rows() . "&";
	$db->setCondition();
	$db->select();
	echo $db->num_rows();
}
elseif($_POST['column'] == 'delete'){
	if(!$logged)
		redirect("404.html");
	if($_POST['table']=="" || $_POST['id']=="")
		exit(1);
	deleteItem($_POST['table'], $_POST['id']);
}
elseif($_POST['column'] == 'delall'){
	if(!$logged)
		redirect("404.html");
	if($_POST['table']=="" || $_POST['id']=="" || str_replace(" ", "", $_POST['id'])=="()")
		exit(1);
	$row = getItems(array("table" => $_POST['table'], "condition" => "where id in {$_POST['id']}"));
	foreach ($row as $item) {
		deleteItem($_POST['table'], $item['id']);
	}
}
elseif ($_POST['column'] == "location") {
	$table = $_POST['table'];
	$items = getItems(array("table" => $table, "condition" => "where pid like '{$_POST['id']}' order by type, name"));
	foreach($items as $item):
		echo "<option value='{$item['id']}'>{$item['type']} {$item['name']}</option>";
	endforeach;
}
elseif ($_POST['column'] == 'backup') {
	if(!$logged)
		redirect("404.html");

	include "backup.php";
	include _lib."phpmailer/class.phpmailer.php";
	$phpmailer = new PHPMailer(true);
	if(backup_db($config['database']['database'])) {
		unlink("./IMG_Backup/upload_admin.zip");
		$zip = new ZipArchive();
		$zip->open('./IMG_Backup/upload_admin.zip', ZipArchive::CREATE);
		addFolderToZip("../../upload/", $zip);
		$zip->addFile($filename);
		$zip->close();
		copy("./IMG_Backup/upload_admin.zip", "./IMG_Backup/upload.zip");
		if ($information['email_send']!="" && $information['password_send']!="") {
			$item = getItems(array("table" => "website", "limit" => 1));
			$item = $item[0];
			$sender = array(
			 	"host" => $item['email_host'],
			 	"port" => $item['email_port'],
			 	"secure" => $item['email_secure'],
			 	"username" => $item['email_send'],
			 	"password" => $item['password_send'],
			 	"email" => $item['email_send'],
			 	"name" => $item['email_name']
			 );
			$rcpt = array( "buivanhiep1905@gmail.com" );
			$content_arr = array(
				"subject" => "Backup database at " . date("d/m/Y H:i:s", time()),
				"html" => "Backup database at " . date("d/m/Y H:i:s", time()) . "<br><a href='".$config_url."/admin/ajax/IMG_Backup/upload_admin.zip'>Download backup file here!</a>",
				"text" => "Backup database at " . date("d/m/Y H:i:s", time()) . "<br><a href='".$config_url."/admin/ajax/IMG_Backup/upload_admin.zip'>Download backup file here!</a>"
			);
			$phpmailer->init($sender, $rcpt, $content_arr, 0);
			if($phpmailer->send())
				echo "1";
			else
				echo "Có lỗi xảy ra trong quá trình sao lưu!";
		}
		else
			echo "1";
	}
	else
		echo "Có lỗi xảy ra trong quá trình sao lưu!";
}
elseif ($_POST['column'] == 'delete_backup') {
	unlink("./IMG_Backup/upload.zip");
	echo "1";
}
elseif ($_POST['column'] == 'price_filter') {
	unset($_SESSION["filter"]["price"]);
	$_SESSION['filter']['price'] = $_POST['value'];
	echo '1';
}
elseif ($_POST['column'] == 'filter') {
	unset($_SESSION[$_POST['table']]);
	$list = explode('&&&', $_POST['value']);
	foreach ($list as $str) {
		$arr = explode('&&', $str);
		$_SESSION[$_POST['table']][$arr[0]] = str_replace("####", "", $arr[1]);
	}
	echo '1';
}
elseif ($_POST['column'] == 'setFilter') {
	$request = $_POST;
	
	$list = array( "keyword", "province", "district" );
	foreach($list as $key):
		if(!in_array($key, array( "keyword", "province", "district" ))):
			$_SESSION['filter'][$key] = array();
			foreach($request[$key] as $value)
				$_SESSION['filter'][$key][] = $value;
		else:
			$_SESSION['filter'][$key] = $request[$key];
		endif;
	endforeach;

	die ("1");
}
elseif ($_POST['column'] == 'confirm_review') {
	if(!$logged)
		redirect("/404.html");
	$id = $_POST['id'];
	
	$rv = getItems(array("table" => "review", "id" => $id));
	if(is_array($rv) && !empty($rv)) {
		if($db->query("update #_review set confirm_date=".time().", enable=1 where id like '{$id}'"))
			die ("1");
		else
			die ("0");
	}
	else
		die ("0");
}
else{
	if(!$logged)
		redirect("/404.html");
	$value = $_POST['column'] == 'enable' || $_POST['column'] == 'popular' ? ((boolean) $_POST['value']) : $_POST['value'];
	if($_POST['table'] == 'product_feature')
		$db->setCondition(sprintf("where concat(product_id, '-', feature_id) like '%s'", $_POST['id']));
	else
		$db->setCondition("where id = " . $_POST['id']);
	$db->update(array($_POST['column'] => $value));
}

function deleteItem($table, $id) {
	global $db;
	$item = getItems(array("table" => $table, "id" => $id));
	if($table == "register" && @$item['photo'] != "")
		unlink(str_replace("//", "/", "../../".$item['photo']));
	$db->query("delete from #_translate where item_id like '{$id}' and table_name like '{$table}'");
	$db->query("delete from #_{$table} where id like '{$id}'");
	switch ($table) {
		case 'category':
			$row_category_extend = getItems(array("table" => "category_extend", "condition" => "where category_id like '{$id}'"));
			foreach ($row_category_extend as $r_category_extend)
				deleteItem("category_extend", $r_category_extend['id']);
		// 	$row_product = getItems(array("table" => "product", "condition" => "where category_id like '{$id}'"));
		// 	foreach ($row_product as $r_product)
		// 		deleteItem("product", $r_product['id']);
			break;
		case 'product':
			$row_product_extend = getItems(array("table" => "product_extend", "condition" => "where product_id like '{$id}'"));
			foreach ($row_product_extend as $r_product_extend)
				deleteItem("product_extend", $r_product_extend['id']);
			break;
		// case 'review':
		// 	$row_images = getItems(array("table" => "option", "condition" => "where review_id like '{$id}' and type ='review_image'"));
		// 	foreach ($row_images as $r_image){
		// 		unlink(str_replace("//", "/", "../../".$r_image['thumbnail']));// xoa hinh
		// 		deleteItem("option", $r_image['id']);
		// 	}

		// 	break;
	}
}

function addFolderToZip($dir, $zipArchive){
	if (is_dir($dir)) {
		if ($dh = opendir($dir)) {
			$zipArchive->addEmptyDir(str_replace("../../", "", $dir));
			while (($file = readdir($dh)) !== false) {
				if(!is_file($dir . $file)){
					if( ($file !== ".") && ($file !== "..") && ($file !== ".thumbs") )
						addFolderToZip($dir . $file . "/", $zipArchive);
				}
				else
					$zipArchive->addFile($dir . $file, str_replace("../../", "", $dir) . $file);
			}
		}
	}
}
?>