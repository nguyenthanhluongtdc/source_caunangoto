<?php $row_product = getItems(array("table" => "product", "condition" => "where enable>0 order by level desc, create_date desc, title")); 
$template = "product";
?>