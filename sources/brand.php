<?php
$limit = 12;
$step = 12;

$row_brand = getItems(array("table" => "option", "condition" => "where type like 'brand' and enable>0 order by title"));
$num_brand = count($row_brand);

//$row_brand = array_slice($row_brand, 0, $limit);

// $row_brand = $pagination->paging($row_brand, $limit, $_REQUEST['p']);
// $paging = $pagination->getSource();

$row_breadcrumb = array($category['uri'] => subString($category['title'], 0, 6));
$template = "brand";
?>