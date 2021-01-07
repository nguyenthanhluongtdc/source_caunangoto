<?php
$limit = 24;
$step = 24;

$row_video = getItems(array("table" => "image", "condition" => "where type like 'video' and enable>0 order by `index`"));

$num_video = count($row_video);

$row_video = array_slice($row_video, 0, $limit);
$row_breadcrumb = array($category['uri'] => $category['title']);

$template = "video";
?>