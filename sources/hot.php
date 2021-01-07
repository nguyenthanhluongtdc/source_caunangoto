<?php
$limit = 12;
$step = 12;

$where = array();
foreach ($_SESSION['index_product_filter'] as $k_filter => $r_filter) {
	if ($k_filter != "price")
		$where[] = "find_in_set('{$r_filter}', {$k_filter}_id)";
	else {
		$r_price = getItems(array("table" => "option", "id" => $r_filter));
		$min = preg_replace('/\D/i', '', $r_price['first_tag']);
		$max = preg_replace('/\D/i', '', $r_price['second_tag']);
		if (floatval($min) > 0)
			$where_translate[] = "cast(price as unsigned)>={$min}";
		if (floatval($max) > 0)
			$where_translate[] = "cast(price as unsigned)<={$max}";
	}
}
if (!empty($where))
	$where = implode(" and ", $where);
else
	$where = "true";
if (!empty($where_translate)) {
	$where_translate = implode(" and ", $where_translate);
	$db->query("SET group_concat_max_len = CAST((SELECT SUM(LENGTH(item_id)) + COUNT(*) * LENGTH(',') FROM #_translate) AS UNSIGNED)");
	$db->query("select group_concat(item_id separator ',') as str from #_translate where {$where_translate} and table_name like 'product' and language_id like '{$_SESSION['lang']['id']}'");
	$where_translate = $db->fetch_array();
	if (preg_replace('/\D/i', '', @$where_translate['str']) != "")
		$where_translate = "id in ({$where_translate['str']})";
	else
		$where_translate = "false";
}
else
	$where_translate = "true";

if($_POST['loadProduct'] == "1") {
	$start = max(0, intval($_POST['start']));
	$limit *= 2;
	$row_product = getItems(array("table" => "product", "condition" => "where {$where} and {$where_translate} and popular2>0 and enable>0 order by popular2, level desc, create_date desc, title limit {$start}, {$limit}"));
	$data = array();
	if (is_array($row_product) && !empty($row_product)) {
		foreach ($row_product as $r_product) {
			$data[] = '<div class="product-item">
				<a href="'.$r_product['uri'].'">
					<div class="product-thumbnail item-thumbnail display-flex flex-center-center">
						<img src="'.$r_product['thumbnail'].'" -onload="loadThumbnail(this);">
						<div class="bottom-product"></div>
					</div>
				</a>
				<div style="margin: 10px 0 0 5px;">
					<center>
						<span class="color-03">
							MSP: '.$r_product['serial'].'
						</span>
					</center>
				</div>
				<div class="item-heading text-center">
					<div class="item-title color-hover-menu-center-fv">
						<a href="'.$r_product['uri'].'">
							'.$r_product['title'].'
						</a>
					</div>
					<div class="item-price-sale">
						'.getPriceSale($r_product).'&nbsp;&nbsp;<del class="item-price-origin">'.getPriceOrigin($r_product).'</del>
					</div>
					<div>
						<a class="item-btn btn btn-cart"  onclick="cartAjax({ action: \'addtocart\', id: \''.$r_product['id'].'\',type:\'Mua trực tiếp\', lbl: \'label-success\',msg: \'Thêm vào giỏ hàng thành công\',callback: function(){ setTimeout(function() { window.location=\''.$classify['cart'][0]['uri'].'.html\'; }, 500); } });">ĐẶT HÀNG</a>
					</div>
				</div>
			</div>';
		}
		die(json_encode(array( "result" => 1, "start" => $start+count($row_product), "data" => $data )));
	}
}
else {
	$start = 0;
	$row_product = getItems(array("table" => "product", "condition" => "where {$where} and {$where_translate} and popular2>0 and enable>0 order by popular2, level desc, create_date desc, title limit {$start}, {$limit}"));
}
$num_product = count($row_product);

//$row_product = array_slice($row_product, 0, $limit);

$row_product = $pagination->paging($row_product, $limit, $_REQUEST['p']);
$paging = $pagination->getSource();

$row_breadcrumb = array($category['uri'] => subString($category['title'], 0, 6));
$template = "product";
