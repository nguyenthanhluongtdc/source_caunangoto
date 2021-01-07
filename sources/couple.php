<?php
unset($_SESSION['index_product_filter']["category"]);
unset($_SESSION['index_product_filter']["gender"]);

$limit = 16;

$where = array();
foreach ($_SESSION['index_product_filter'] as $k_filter => $r_filter) {
	if ($k_filter != "price")
		$where[] = "find_in_set('{$r_filter}', p1.{$k_filter}_id) or find_in_set('{$r_filter}', p2.{$k_filter}_id)";
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
		$where_translate = "p1.id in ({$where_translate['str']}) or p2.id in ({$where_translate['str']})";
	else
		$where_translate = "false";
}
else
	$where_translate = "true";

if($_POST['loadProduct'] == "1") {
	$start = max(0, intval($_POST['start']));
	$limit *= 2;
	// $row_product = getItems(array("table" => "product", "condition" => "where {$where} and {$where_translate} and female_id not like '' and enable>0 order by level desc, create_date desc, title limit {$start}, {$limit}"));
	$db->query("select p1.* from (#_product p1 join #_product p2 on p1.female_id=p2.id) join #_option o on concat(p1.id, concat(',', p2.id))=o.category_id where {$where} and {$where_translate} and p1.enable>0 and p2.enable>0 and o.enable>0 order by o.index, p1.level desc, p1.create_date desc, p1.title limit {$start}, {$limit}");
	$row_product = $db->result_array();
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
			$r_female = getItems(array("table" => "product", "id" => $r_product['female_id']));
			$data[] = '<div class="product-item">
				<a href="'.$r_female['uri'].'">
					<div class="product-thumbnail item-thumbnail display-flex flex-center-center">
						<img src="'.$r_female['thumbnail'].'" -onload="loadThumbnail(this);">
						<div class="bottom-product"></div>
					</div>
				</a>
				<div style="margin: 10px 0 0 5px;">
					<center>
						<span class="color-03">
							MSP: '.$r_female['serial'].'
						</span>
					</center>
				</div>
				<div class="item-heading text-center">
					<div class="item-title color-hover-menu-center-fv">
						<a href="'.$r_female['uri'].'">
							'.$r_female['title'].'
						</a>
					</div>
					<div class="item-price-sale">
						'.getPriceSale($r_female).'&nbsp;&nbsp;<del class="item-price-origin">'.getPriceOrigin($r_female).'</del>
					</div>
					<div>
						<a class="item-btn btn btn-cart"  onclick="cartAjax({ action: \'addtocart\', id: \''.$r_female['id'].'\',type:\'Mua trực tiếp\', lbl: \'label-success\',msg: \'Thêm vào giỏ hàng thành công\',callback: function(){ setTimeout(function() { window.location=\''.$classify['cart'][0]['uri'].'.html\'; }, 500); } });">ĐẶT HÀNG</a>
					</div>
				</div>
			</div>';
		}
		die(json_encode(array( "result" => 1, "start" => $start+count($row_product), "data" => $data )));
	}
}
else {
	$start = 0;
	// $row_product = getItems(array("table" => "product", "condition" => "where {$where} and {$where_translate} and female_id not like '' and enable>0 order by level desc, create_date desc, title limit {$start}, {$limit}"));
	$db->query("select p1.* from (#_product p1 join #_product p2 on p1.female_id=p2.id) join #_option o on concat(p1.id, concat(',', p2.id))=o.category_id where {$where} and {$where_translate} and p1.enable>0 and p2.enable>0 and o.enable>0 order by o.index, p1.level desc, p1.create_date desc, p1.title limit {$start}, {$limit}");
	$row_product = $db->result_array();
}

$row_breadcrumb = array($option['uri'] => subString($option['title'], 0, 6));
$template = "couple";
