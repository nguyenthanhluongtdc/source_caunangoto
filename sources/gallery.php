<?php
$limit = 12;
$step = 12;
$row_gallery = getItems(array("table" => "image", "condition" => "where type like 'gallery' and enable>0 order by `index`"));

$num_gallery = count($row_gallery);

$row_gallery = array_slice($row_gallery, 0, $limit);

$row_breadcrumb = array($category['uri'] => subString($category['title'], 0, 6));

$template = "gallery";
?>