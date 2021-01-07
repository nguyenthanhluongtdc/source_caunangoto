<?php
switch (true) {
	case is_array($category) && $category['type']=="post":

		$r_index = $category;

		$limit = 11;
		$step = 11;

		$where = array("find_in_set({$category['id']}, category_id)");
		foreach ($layout['header']['menu-center'] as $r_c) {
			if ($r_c['id'] == $category['id']) {
				foreach ($r_c['child'] as $r_ch) {
					$where[] = "find_in_set({$r_ch['id']}, category_id)";
				}
			}
		}
		$where = "(" . implode(" or ", $where) . ")";
		
		$row_post = getItems(array("table" => "post", "condition" => "where {$where} and enable>0 order by level desc"));
		

		$num_post = count($row_post);
		// $row_post = array_slice($row_post, 0, $limit);

		$row_post = $pagination->paging($row_post, $limit, $_REQUEST['p']);
		$paging = $pagination->getSource();
		
		$row_breadcrumb = array($category['uri'] => subString($category['title'], 0, 6));

		$template = "post";
		break;

	case is_array($post):
		$limit = 5;
		$step = 5;

		$id_list = explode(",", $post['category_id']);
		$where = array();
		foreach ($id_list as $id_l)
			$where[] = "find_in_set({$id_l}, category_id)";
		if (!empty($where))
			$where = "(".implode(" or ", $where).")";
		else
			$where = "true";

		$row_related = getItems(array("table" => "post", "condition" => "where {$where} and enable>0 and id not like '{$post['id']}' order by level, create_date desc, title"));
		$num_post = count($row_related);
		$row_related = $pagination->paging($row_related, $limit, $_REQUEST['p']);

		$row_breadcrumb = array($post['uri'] => subString($post['title'], 0, 6));

		$template = "post_detail";
		if($_SESSION['view_history']['post-'.$post['id']] == "") {
			if (is_null($post['view']))
				$db->query("update #_post set view = 0 where id like '{$post['id']}'");
			$db->query("update #_post set view = view + 1 where id like '{$post['id']}'");
			$_SESSION['view_history']['post-'.$post['id']] = "1";
		}
		break;

	default:
		show_error();
		break;
}
?>