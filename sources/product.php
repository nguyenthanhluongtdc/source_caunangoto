<?php
switch (true) {
	case is_array($category) && $category['type']=="product":
   
       	$type = "category_id";
       	$id_cat =  $category['id'];
        
        if (isset($_SESSION['brand_id'])) {
             if ($_SESSION['brand_id'] != $category['id'] ) {
             	unset($_SESSION['brand']);
             }
        }

		$limit = 12;
		$step = 8;

		
		$row_product = getItems(array("table" => "product", "condition" => "where find_in_set({$category['id']}, category_id) and enable>0 order by level desc, create_date desc, title"));
	
		$num_product = is_array($row_product)?count($row_product):0;

		// $row_product = array_slice($row_product, 0, $limit);
		
		$row_product = $pagination->paging($row_product, $limit, $_REQUEST['p']);
		$paging = $pagination->getSource();
	
		$row_breadcrumb = array($category['uri'] => subString($category['title'], 0, 6));

		if (isset($_COOKIE['product_seen'])) {
       		$row_seen = getItems(array("table" => "product","condition" => "where find_in_set(id,'{$_COOKIE['product_seen']}') and enable > 0"));
       	}

		$template = "product";
		
		break;
	case is_array($product):

		// if(Request.Cookies["randomHash"] != null)
		// {
		//   //do something
		// }

		if (!isset($_COOKIE['see['.$product['id'].']']))
		{
			setcookie('see['.$product['id'].']', $product['id'],time()+3600);
		}

		

		$slider_hidden = true;
		$view_list = explode(",", @$_SESSION['viewlist']);
		if(!in_array($product['id'], $view_list)) {
			if(is_null($product['view']))
				$db->query("update #_product set view=0 where id like '{$product['id']}'");
			$db->query("update #_product set view=view+1 where id like '{$product['id']}'");
			if($view_list[0]=="")
				$view_list = array();
			$view_list[] = $product['id'];
		}
		$_SESSION['viewlist'] = implode(",", $view_list);
		$product['slides'] = getItems(array("table" => "product_extend", "condition" => "where product_id like '{$product['id']}' order by `index`"));
		$product['tabs'] = getItems(array("table" => "product_extend", "condition" => "where product_id like '{$product['id']}' order by `index`, title"));
		
		$limit = 8;
		$step = 6;
		$id_list = explode(",", $product['category_id']);
		$where = array();
		foreach ($id_list as $id_l) {
			$where[] = "find_in_set('{$id_l}', category_id)";
		}
		if (!empty($where))
			$where = "(".implode(" or ", $where).")";
		else
			$where = "true";
		$row_related = getItems(array("table" => "product", "condition" => "where {$where} and enable>0 and id not like '{$product['id']}' order by level desc, create_date desc limit 5"));
		$num_product = count($row_related);

		// $row_related = $pagination->paging($row_related, $limit, $_REQUEST['p']);

		// $row_relative_view = getItems(array("table" => "product", "condition" => "where enable>0 and id in (".implode(",", $view_list).") order by `view` desc, popular desc, level desc, create_date desc, title", "limit" => 4));
		if($product['category_id'] == "")
			$product['category_id'] = "''";
		$row_c = getItems(array("table" => "category", "condition" => "where id in ({$product['category_id']}) order by `index`", "limit" => 2));
		foreach ($row_c as $k_c => $r_c) {
			$row_breadcrumb[$r_c['uri']] = subString($r_c['title'], 0, 6);
		}
		$row_breadcrumb[$product['uri']] = subString($product['title'], 0, 6);

		if (!isset($_COOKIE['product_seen'])) {
			setcookie('product_seen',$product['id'], time() + (86400 * 30));
		}else{
			if (!in_array($product['id'], explode(",", $_COOKIE['product_seen'])) ) {
				setcookie('product_seen',$_COOKIE['product_seen'].",".$product['id'], time() + (86400 * 30));
			}
			$row_seen = getItems(array("table" => "product","condition" => "where id not like '{$product['id']}' and find_in_set(id,'{$_COOKIE['product_seen']}') and enable > 0"));
		}

		$template = "product_detail";

		

		break;
	default:
		show_error();
		break;
}
?>