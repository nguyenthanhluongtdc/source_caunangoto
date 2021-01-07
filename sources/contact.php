<?php
$information = getItems(array("table" => "website", "id" => 0, "condition" => "where language_id like '{$lang['id']}'"));

$row_breadcrumb = array($category['uri'] => $category['title']);

$template = "contact";
?>