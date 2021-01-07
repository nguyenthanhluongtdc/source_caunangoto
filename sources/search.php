<?php
	$_SESSION['featured_id'] = "";
	if(isset($_POST['title'])) {
		unset($_SESSION['search']);
		foreach ($_POST as $key => $value) {
			$_SESSION['search'][$key] = $_POST[$key];
		}
		redirect(getURL($classify['search'][0]['uri']));
	}
	$keyword = $_SESSION['search']['title'];
	$category = array( "title" => "Tìm kiếm với ".$keyword." ", "first_tag" => "Kết quả tìm kiếm theo từ khóa '{$keyword}'" );
	if($keyword == "")
		$category = array( "title" => "Kết quả tìm kiếm theo mọi từ khóa" );
	$keyword = preg_replace('/đ/i', 'd', $keyword);

	$where_search = array( ($keyword!="" ? "(replace(replace(t.title, 'đ', 'd'), 'Đ', 'd') like '%{$keyword}%' or serial like '%{$keyword}%' or serial_international like '%{$keyword}%')" : "true") );
	foreach ($_SESSION['search'] as $key => $value) {
		if($key == "title" || $value=="") continue;
		if(count(explode("_id", $key)) > 1)
			$where_search[] = "find_in_set({$value}, p.{$key})";
		else
			$where_search[] = "p.{$key} like '{$value}'";
	}
	$where_search = implode(" and ", $where_search);

	$limit = 16;
	$step = 10;

	$db->query("select p.*, t.*, p.id from #_product p join #_translate t on p.id=t.item_id where t.language_id like '{$lang['id']}' and t.table_name like 'product' and p.enable>0 and {$where_search} order by p.level desc, p.create_date desc, t.title");
	$num_product = $db->num_rows();

	$row_product = $db->result_array();
	$row_product = $pagination->paging($row_product, $limit, $_REQUEST['p']);
	$paging = $pagination->getSource();
		
	$row_breadcrumb = array("search" => $category['title']);
    
	$template = "product";

?>
