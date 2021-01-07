<?php
$resize = array('x'=>300,'y'=>400);

@define("_theme", "./themes/");
include _lib."phpmailer/class.phpmailer.php";
$phpmailer = new PHPMailer(true);
$db = new database($config['database']);
$container = "container";

getTarget();

// var_dump($_POST);
// exit();

if (isset($_POST['contactbtn'])) {
	saveContact();
}
if (isset($_POST['orderbtn'])) {
	saveOrder();
}
if (isset($_POST['rating'])) {
	saveReview();
}
if (isset($_POST['comment_reply'])) {
	saveReply();
}

switch (true) {
	// case ($_REQUEST['param-1'] == "member"):
	// 	setResource(array( "source" => "member", "title" => "Tài khoản cá nhân", "item" => $information ));
	// 	break;
	// case (in_array($_REQUEST['param-1'], array( "tim-kiem", "filter", "search" ))):
	// 	$breadcrumb_string = getBreadcrumbString();
	// 	break;
	case (is_array($category) && !empty($category)):
		$breadcrumb_string = getBreadcrumbString(array( "table" => "category", "items" => array($category) ));
		setResource(array( "source" => $category['type'], "item" => $category ));
		break;
	case (is_array($product) && !empty($product)):
		$breadcrumb_string = getBreadcrumbString(array( "table" => "product", "items" => array($product) ));
		$product = getItems(array("table" => "product", "id" => $product['id']));
		setResource(array( "source" => "product", "item" => $product ));
		break;
	case (is_array($post) && !empty($post)):
		$breadcrumb_string = getBreadcrumbString(array( "table" => "post", "items" => array($post) ));
		setResource(array( "source" => "post", "item" => $post ));
		break;
	case (is_array($option) && !empty($option)):
		$breadcrumb_string = getBreadcrumbString(array( "table" => "option", "items" => array($option) ));
		setResource(array( "source" => "option", "item" => $option ));
		break;
	case ($_REQUEST['param-1'] == "" && $_REQUEST['param-2'] == "" && $_REQUEST['param-3'] == ""):
		$breadcrumb_string = getBreadcrumbString();
		setResource(array( "source" => "index", "template" => "index", "item" => $information ));
		break;
	default:
		show_error();
		break;
}

if (!defined('_source')) {
	show_error();
}
if ($source!="" && file_exists((_source.$source.".php"))) {
	include (_source.$source.".php");
}

function checkActiveCategory($layout) {
	global $id_home;
	foreach ($layout as $k_graph => $r_graph) {
		foreach ($r_graph as $k_category => $r_category) {
			if(@$r_category['id'] == "")
				continue;
			if(in_array($r_category['id'], $id_home)) {
				$layout[$k_graph][$k_category]['uri'] = ".";
				if($_GET['param-1'] == "")
					$layout[$k_graph][$k_category]['active'] = 1;
			}
			if($r_category['uri'] == $_GET['param-1'])
				$layout[$k_graph][$k_category]['active'] = 1;
			if(is_array($r_category['child']) && !empty($r_category['child']))
				$r_category['child'] = checkActiveCategory($r_category['child']);
		}
	}
	return $layout;
}

function getTarget()
{
	global $db, $lang, $information, $layout, $design, $classify, $category, $product, $post, $option, $id_home;

	if ($_REQUEST['lang']!="") {
		if (@$_REQUEST['lang']!=@$_SESSION['lang']['uri']) {
			unset($_SESSION['filter']);
		}
		$lang = getItems(array("table" => "language", "id" => 0, "condition" => "where uri like '{$_REQUEST['lang']}' and enable>0"));
		if (!is_array($lang)) {
			$lang = getItems(array("table" => "language", "id" => 0, "condition" => "where enable>0 order by `index`"));
			if (!is_array($lang))
				show_error();
			$_GET['param-1'] = $_REQUEST['param-1'] = $_REQUEST['lang'];
		}
	} else {
		$lang = getItems(array("table" => "language", "id" => 0, "condition" => "where enable>0 order by `index`"));
		if (!is_array($lang)) {
			show_error();
		}
	}
	$_SESSION['lang'] = $lang;
	if (isset($_POST['backuri'])) {
		redirect(getURL($_POST['backuri']));
	}

	$information = getItems(array("table" => "website", "id" => 0, "condition" => "where language_id like '{$lang['id']}' limit 1"));

	$row_name = getItems(array("table" => "layout"));
	$classify = getLayout("classify");
	$id_home = array();
	foreach ($classify['home'] as $k_classify => $r_classify) {
		$classify['home'][$k_classify]['uri'] = ".";
		if($_GET['param-1'] == "")
			$classify['home'][$k_classify]['active'] = 1;
		$id_home[] = $r_classify['id'];
	}
	$layout = array();
	foreach ($row_name as $r_name)
		$layout[str_replace("layout-", "", $r_name['name'])] = getLayout($r_name['name']);
	foreach ($layout as $k_layout => $r_layout)
		$layout[$k_layout] = checkActiveCategory($r_layout);

	$category = getItems(array("table" => "category", "id" => 0, "condition" => "where uri like '{$_REQUEST['param-1']}' and uri not like '' and enable>0"));
	if (is_array($category) && !empty($category)) {
		foreach ($classify as $key => $arr) {
			foreach ($arr as $r_contact) {
				if($category['id'] == $r_contact['id']) {
					$type = $key;
					break;
				}
			}
			if(@$type == $key) {
				if(is_file((_source.$type.".php")))
					$category['type'] = $type;
				break;
			}
		}
	}

	$product = getItems(array("table" => "product", "id" => 0, "condition" => "where uri like '{$_REQUEST['param-1']}' and uri not like '' and enable>0"));
	if (is_array($product) && !empty($product))
		$product = getItems(array("table" => "product", "id" => $product['id']));

	$post = getItems(array("table" => "post", "id" => 0, "condition" => "where uri like '{$_REQUEST['param-1']}' and uri not like '' and enable>0"));
	if (is_array($post) && !empty($post))
		$post = getItems(array("table" => "post", "id" => $post['id']));

	$option = getItems(array("table" => "option", "id" => 0, "condition" => "where uri like '{$_REQUEST['param-1']}' and uri not like '' and enable>0"));
	if (is_array($option) && !empty($option))
		$option = getItems(array("table" => "option", "id" => $option['id']));
	if ($_REQUEST['param-1']!="" && (!is_array($category) || empty($category)) && (!is_array($product) || empty($product)) && (!is_array($post) || empty($post)) && (!is_array($option) || empty($option)))
		show_error();
}

function setResource($resource)
{
	global $template, $source, $tag, $seo, $title, $information;
	$template = (@$resource['template'] != "" ? $resource['template'] : "");
	$source = @$resource['source'];
	$tag = array(
		"h1" => @$resource['item']['h1']!="" ? $resource['item']['h1'] : $information['h1'],
		"h2" => @$resource['item']['h2']!="" ? $resource['item']['h2'] : $information['h2'],
		"h3" => @$resource['item']['h3']!="" ? $resource['item']['h3'] : $information['h3']
	);
	$seo = array(
		"keyword"   => @$resource['item']['keyword']!="" ? $resource['item']['keyword'] : $information['keyword'],
		"desc"      => @$resource['item']['desc']!="" ? $resource['item']['desc'] : $information['desc'],
		"thumbnail" => @$resource['item']['thumbnail']!='' ? $resource['item']['thumbnail'] : $information['favicon']
	);
	$title = @$resource['title']!='' ? $resource['title'] : @$resource['item']['title'];
	if($source != "index")
		$title = $title . " | " . $information['title'];
}

function saveContact() {
	
	global $information, $phpmailer;
	// if($_SESSION['captcha_contact'] == md5($_POST['captcha_code'])) {
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$condition = "";
		$data = array("name",'product_id', "tel", "type", "email", "age", "content", "first_tag", "second_tag", "third_tag", "create_date");
		foreach ($data as $r_data) {
			if($_POST[$r_data] == "")
				$_POST[$r_data] = "...";
		}


		$data_email = array(
			"ten" => $_POST['name'],
			"dienthoai" => $_POST['tel'],
			"email" => $_POST['email'],
			"age" => $_POST['age'],
			"noidung" => $_POST['content'],
			"ngaytao" => date("d/m/Y H:i:s", time())
		);
		// $html = $information['email_content'];
		// foreach ($data_email as $k => $d)
		// 	$html = str_replace("#".$k."#", $d, $html);
		$text = "Họ tên: {$_POST['name']} <br>Điện thoại: {$_POST['tel']} <br>Email: {$_POST['email']} <br>Nội dung: {$_POST['content']} <br>Ngày tạo: {$data_email['ngaytao']} <br>";
		$html = sprintf('<h1 style="text-align: center;"><strong>Tin liên hệ mới từ %s</strong></h1><table border="1" cellpadding="10" cellspacing="0" style="width:100%s;"><tbody><tr><td><strong>Tên liên hệ</strong></td><td><strong>%s</strong></td></tr><tr><td><strong>Điện thoại</strong></td><td><strong>%s</strong></td></tr><tr><td><strong>Email</strong></td><td><strong>%s</strong></td></tr><tr><td><strong>Độ tuổi</strong></td><td><strong>%s</strong></td></tr><tr><td><strong>Nội dung</strong></td><td><strong>%s</strong></td></tr><tr><td><strong>Ngày liên hệ</strong></td><td><strong>%s</strong></td></tr></tbody></table>', $data_email['ten'], "%", $data_email['ten'], $data_email['dienthoai'], $data_email['email'], $data_email['age'], $data_email['noidung'], $data_email['ngaytao']);
		$sender = array(
			"host" => $information['email_host'],
			"port" => $information['email_port'],
			"secure" => $information['email_secure'],
			"username" => $information['email_send'],
			"password" => $information['password_send'],
			"email" => $information['email_send'],
			"name" => $information['email_name']
		);
		$rcpt = array( $information['email_receive'] );
		$content_arr = array(
			"subject" => $information['email_subject'],
			"html" => $html,
			"text" => $text
		);

		// $phpmailer->init($sender, $rcpt, $content_arr, 0);
		// $phpmailer->send();

		if (saveItem(array("table" => "contact", "data" => $data))) {
			alert("Thông tin đã được gửi đi!");
			redirect($config_url.$_SERVER['REQUEST_URI']);
		} else {
			alert("Đã có lỗi xảy ra!");
			back();
		}
	// }
	// else {
	// 	alert("Mã xác minh không đúng hoặc hết hạn!");
	// 	back();
	// }
}

function saveOrder() {
	global $information, $phpmailer;
	// if($_SESSION['captcha_contact'] == md5($_POST['captcha_code'])) {
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$cart = array( "total_quantity" => 0, "total_price" => 0.0, "total_price_del" => 0.0, "product" => array() );
		foreach ($_SESSION['cart'] as $id => $quantity) {
			$r_product = getItems(array("table" => "product", "id" => $id));
			$r_product['quantity'] = $quantity;
			if(floatval($r_product['price_sale']) > 0) {
				$price = floatval($r_product['price_sale']);
				if(floatval($r_product['price']) > 0)
					$price_del = floatval($r_product['price']);
				else
					$price_del = 0;
			}
			elseif(floatval($r_product['price']) > 0) {
				$price = floatval($r_product['price']);
				$price_del = 0;
			}
			else {
				$price = 0;
				$price_del = 0;
			}
			$cart['total_quantity'] += $quantity;
			$cart['total_price'] += $price * $quantity;
			$cart['total_price_del'] += $price_del * $quantity;
			if($price > 0) {
				$r_product['total_price'] = number_format($price * $quantity)."đ";
				$r_product['price'] = number_format($price)."đ";
			}
			else {
				$r_product['total_price'] = "Liên hệ";
				$r_product['price'] = "Liên hệ";
			}
			if($price > 0) {
				$r_product['total_price_del'] = "(<del>".number_format($price_del * $quantity)."đ</del>)";
				$r_product['price_del'] = "(<del>".number_format($price_del)."đ</del>)";
			}
			else {
				$r_product['total_price_del'] = "";
				$r_product['price_del'] = "";
			}
			$cart['product'][] = $r_product;
		}
		if(floatval($cart['total_price']) > 0)
			$cart['total_price'] = number_format($cart['total_price']) . "đ";
		else
			$cart['total_price'] = "Liên hệ";
		if(floatval($cart['total_price_del']) > 0)
			$cart['total_price_del'] = number_format($cart['total_price_del']) . "đ";
		else
			$cart['total_price_del'] = "";
		$condition = "";
		$data = array("name", "tel", "email", "address", "content", "detail", "create_date");
		
		if(@$_POST['delivery'] == "1" || !isset($_POST['delivery'])) {
			$number_home = $_POST['address'];
			$province_name = getItems(array("table" => "province", "id" => $_POST['city']));
			$district_name = getItems(array("table" => "district", "id" => $_POST['did']));
			$ward_name = getItems(array("table" => "ward", "id" => $_POST['ward']));

			$_POST['address'] = sprintf("<span style='display: inline-block; min-width: 132px; font-weight: normal;'>Tỉnh - Thành phố:</span> %s<br><span style='display: inline-block; min-width: 132px; font-weight: normal;'>Quận - huyện:</span> %s <br> <span style='display: inline-block; min-width: 132px; font-weight: normal;'>Phường, Xã:</span> %s <br> <span style='display: inline-block; min-width: 132px; font-weight: normal;'>Số nhà, Thôn: </span> %s", $province_name['name']." (".$province_name['type'].")", $district_name['name']." (".$district_name['type'].")", $ward_name['name']." (".$ward_name['type'].")",$number_home);
				$_POST['store'] = "";

		}
		else {
			$_POST['store'] = sprintf("Địa chỉ siêu thị: <b style='color: green;'>%s</b><br>Ngày nhận hàng: <b style='color: #777;'>%s</b>", $_POST['store'], date("d/m/Y", strtotime($_POST['receive_date'])));
			$_POST['address'] = "";
		}


		$_SESSION['payment_info'] = $data;
		$detail = '<table class="table table-striped table-bordered" style="width: 100%;" border="1">
			<tbody>
				<tr>
					<td style="text-align: center; padding: 8px;"><strong>STT</strong></td>
					<td style="text-align: center; padding: 8px;"><strong>T&ecirc;n sản phẩm</strong></td>
					<td style="text-align: center; padding: 8px;"><strong>Đơn gi&aacute;</strong></td>
					<td style="text-align: center; padding: 8px;"><strong>Số lượng</strong></td>
					<td style="text-align: center; padding: 8px;"><strong>Th&agrave;nh tiền</strong></td>
				</tr>';
		foreach ($cart['product'] as $k_product => $r_product) {
		$detail .= '<tr>
					<td style="text-align: center; padding: 8px;">'.($k_product + 1).'</td>
					<td style="text-align: left; padding: 8px;"><b>'.$r_product['title'].'</b></td>
					<td style="text-align: center; padding: 8px;">'.$r_product['price'].' '.$r_product['price_del'].'</td>
					<td style="text-align: center; padding: 8px;">'.$r_product['quantity'].'</td>
					<td style="text-align: center; padding: 8px;">'.$r_product['total_price'].' '.$r_product['total_price_del'].'</td>
				</tr>';
		}
		$detail .= '</tbody>
		</table>';
		$_POST['detail'] = $detail;

		$data_email = array(
			"ten" => $_POST['name'],
			"dienthoai" => $_POST['tel'],
			"email" => $_POST['email'],
			"diachi" => $_POST['address'],
			"noidung" => $_POST['content'],
			"ngaytao" => date("d/m/Y H:i:s", time())
		);
		$html = $_POST['detail'];
	  $html .= $information['email_content'];
	  $text = "Họ tên: {$_POST['name']} <br>Điện thoại: {$_POST['tel']} <br>Email: {$_POST['email']} <br>Nội dung: {$_POST['content']} <br>Ngày tạo: {$data_email['ngaytao']} <br>";
	  foreach ($data_email as $k => $d)
	      $html = str_replace("#".$k."#", $d, $html);
		  $sender = array(
			"host" => $information['email_host'],
			"port" => $information['email_port'],
			"secure" => $information['email_secure'],
			"username" => $information['email_send'],
			"password" => $information['password_send'],
			"email" => $information['email_send'],
			"name" => $information['email_name']
		);
	  $rcpt = array( $information['email_receive'] );
	  $content_arr = array(
	      "subject" => $information['email_receive'],
	      "html" => $html,
	      "text" => $text
	  );
	  
	//   $phpmailer->init($sender, $rcpt, $content_arr, 0);

	//   $phpmailer->send();

	

	if (saveItem(array("table" => "order", "data" => $data))) {
		unset($_SESSION['cart']);
		unset($_SESSION['cart_type']);
		unset($_SESSION['cart_combo']);
		alert("Đặt hàng thành công!");
		redirect((is_file("./home.php") ? "./index.php" : "./"));
	} else {
		alert("Đã có lỗi xảy ra!");
		back();
	}
	// }
	// else {
	// 	alert("Mã xác minh không đúng hoặc hết hạn!");
	// 	back();
	// }
}

function saveReview() {
	global $information, $phpmailer, $product;
	$exists = getItems(array("table" => "review", "condition" => "where email like '{$_POST['email']}' and product_id like '{$product['id']}'"));
	if(is_array($exists) || !empty($exists)) {
		$_SESSION['review'][$product['id']] = "1";
		alert("Bạn đã đánh giá sản phẩm này. Vui lòng liên hệ quản trị viên để được hỗ trợ thêm!");
		back();
	}
	else {
		$data = array("ip", "product_id", "email", "name", "rating", "review", "create_date");
		$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
		$_POST['product_id'] = $product['id'];

	  $html = '<table class="table table-striped table-bordered" style="width: 100%;" border="1">
			<tbody>
				<tr>
					<td style="text-align: center; padding: 8px;"><strong>Tên sản phẩm</strong></td>
					<td style="text-align: center; padding: 8px;"><strong>Email</strong></td>
					<td style="text-align: center; padding: 8px;"><strong>Họ tên</strong></td>
					<td style="text-align: center; padding: 8px;"><strong>Điểm đánh giá</strong></td>
					<td style="text-align: center; padding: 8px;"><strong>Nội dung đánh giá</strong></td>
					<td style="text-align: center; padding: 8px;"><strong>Ngày đánh giá</strong></td>
				</tr>
				<tr>
					<td style="text-align: center; padding: 8px;"><strong>'.$product['title'].'</strong></td>
					<td style="text-align: center; padding: 8px;"><strong>'.$_POST['email'].'</strong></td>
					<td style="text-align: center; padding: 8px;"><strong>'.$_POST['name'].'</strong></td>
					<td style="text-align: center; padding: 8px;"><strong>'.number_format($_POST['rating'], 1).'</strong></td>
					<td style="text-align: center; padding: 8px;"><strong>'.$_POST['review'].'</strong></td>
					<td style="text-align: center; padding: 8px;"><strong>'.date('d/m/Y', time()).'</strong></td>
				</tr>
			</tbody>
	  </table>';
	  $html .= $_POST['detail'];
	  $sender = array(
	      "host" => $information['email_host'],
	      "port" => $information['email_port'],
	      "secure" => $information['email_secure'],
	      "username" => $information['email_send'],
	      "password" => $information['password_send'],
	      "email" => $information['email_send'],
	      "name" => $information['email_name']
	  );
	  $rcpt = array( $information['email_receive'] );
	  $content_arr = array(
	      "subject" => $information['email_subject'],
	      "html" => $html,
	      "text" => $html
	  );
	  
	  $phpmailer->init($sender, $rcpt, $content_arr, 0);
	  $phpmailer->send();

		if(saveItem(array("table" => "review", "data" => $data))) {
			$_SESSION['review'][$product['id']] = "1";
			alert("Thông tin đã được gửi đi!");
			redirect(getURL($product['uri']));
		}
		else {
			alert("Thông tin CHƯA được gửi đi. Vui lòng liên hệ với quản trị viên để được hỗ trợ thêm!");
			back();
		}
	}
}

function saveReply() {
	global $information, $phpmailer, $product;
	$data = array("ip", "product_id", "parent_id", "name", "review", "create_date");
	$_POST['ip'] = $_SERVER['REMOTE_ADDR'];
	$_POST['product_id'] = $product['id'];

  $html = '<table class="table table-striped table-bordered" style="width: 100%;" border="1">
		<tbody>
			<tr>
				<td style="text-align: center; padding: 8px;"><strong>Tên sản phẩm</strong></td>
				<td style="text-align: center; padding: 8px;"><strong>Họ tên</strong></td>
				<td style="text-align: center; padding: 8px;"><strong>Nội dung bình luận</strong></td>
				<td style="text-align: center; padding: 8px;"><strong>Ngày bình luận</strong></td>
			</tr>
			<tr>
				<td style="text-align: center; padding: 8px;"><strong>'.$product['title'].'</strong></td>
				<td style="text-align: center; padding: 8px;"><strong>'.$_POST['name'].'</strong></td>
				<td style="text-align: center; padding: 8px;"><strong>'.$_POST['review'].'</strong></td>
				<td style="text-align: center; padding: 8px;"><strong>'.date('d/m/Y', time()).'</strong></td>
			</tr>
		</tbody>
  </table>';
  $html .= $_POST['detail'];
  $sender = array(
      "host" => $information['email_host'],
      "port" => $information['email_port'],
      "secure" => $information['email_secure'],
      "username" => $information['email_send'],
      "password" => $information['password_send'],
      "email" => $information['email_send'],
      "name" => $information['email_name']
  );
  $rcpt = array( $information['email_receive'] );
  $content_arr = array(
      "subject" => $information['email_subject'],
      "html" => $html,
      "text" => $html
  );
  
  $phpmailer->init($sender, $rcpt, $content_arr, 0);
  $phpmailer->send();

	if(saveItem(array("table" => "review", "data" => $data))) {
		$_SESSION['review'][$product['id']] = "1";
		alert("Thông tin đã được gửi đi!");
		redirect(getURL($product['uri']));
	}
	else {
		alert("Thông tin CHƯA được gửi đi. Vui lòng liên hệ với quản trị viên để được hỗ trợ thêm!");
		back();
	}
}

?>