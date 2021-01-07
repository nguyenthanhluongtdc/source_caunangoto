<?php
    $row_breadcrumb = array($category['uri'] => subString($category['title'], 0, 6));
    $category_id = $category['id'];
    $category_all = $layout['header']['navigation'];
    $category_product = array();

    foreach ($category_all as $value ) {
        if($value['id'] == $category_id){
            $category_product = $value;
        }
    }

       

    $template = "category_product";
?>