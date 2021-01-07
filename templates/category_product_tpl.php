
<?php include (_template."layout/breadcrumb.php") ?>
<div class="banner-post" style="background: url(./upload/hinh/bannerjean.png); ">
<?php //unset($_SESSION['price']); unset($_SESSION['id_category']); ?>
    <div class="box-content">
        <div class="item-category">
            <ol class="breadcrumb" style="background: none; text-align: center;">
                <li>
                    <a href="<?=is_file("./home.php")?"./index.php":"./"?>" style="color: #fff;">Trang chủ</a>
                </li>
                <?php $i=1;
                    foreach($row_breadcrumb as $uri_breadcrumb=>$title_breadcrumb){
                       if($uri_breadcrumb!=""&&$title_breadcrumb!=""){
                          if($i<count($row_breadcrumb)){?>
                <li>
                    <a href="<?=getURL($uri_breadcrumb)?>"><?=$title_breadcrumb?></a>
                    <i class="far fa-angle-right"></i>
                </li>
                <?php }else{ ?>
                <li class="active" style="color: #fff;">
                    <?=$title_breadcrumb?>
                </li>
                <?php }} $i++;}?>
            </ol>
        </div>
    </div>
</div>
<div class="line-space"></div>

<div class="category-product content-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-3" style="background: #f0f0f0; border-radius: 5px; padding-top: 15px;">
                <form action="" method="post" class="filter filter-category" style="margin-bottom: 30px;">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 30px;">
                        <h3 style="margin: 0;"> <b style="color: red;">Danh mục</b> </h3>
                        <i class="far fa-chevron-down"></i>
                    </div>
                    <input type="radio" class="input_category" id="rd000" name="gender" data-category="all" value="male" onchange="changeFilterCategory();" <?php echo "all" == $_SESSION['id_category'] ? "checked" : "" ?>>
                    <label for="rd000"> Tất cả </label><br>

                    <?php foreach($category_product['child'] as $value ) : ?>
                        <input type="radio" class="input_category" id="rd<?=$value['id']?>" name="gender" data-category="<?=$value['id']?>" value="male" onchange="changeFilterCategory();" <?php echo $value['id'] == $_SESSION['id_category'] ? "checked" : "" ?>>
                        <label for="rd<?=$value['id']?>" > <?=$value['title']?> </label><br>
                       
                    <?php endforeach ?>

                </form>
                <form action="" method="post" class="filter filter-price">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 30px; ">
                        <h3 style="margin: 0;"> <b style="color: red;" >Giá</b> </h3>
                        <i class="far fa-chevron-down"></i>
                    </div>
                    <input type="radio" class="input_price" id="rd0" name="gender" data-price="0:0" value="male" onchange="changeFilterPrice();" <?= implode(":", array_values($_SESSION['price']))=="0:0" ? "checked" : "" ?> >
                    <label for="rd0"> Tất cả </label><br>
                    <input type="radio" class="input_price" id="rd1" name="gender" data-price="0:150000" value="male" onchange="changeFilterPrice();" <?= implode(":", array_values($_SESSION['price']))=="0:150000" ? "checked" : "" ?> >
                    <label for="rd1"> < 150k </label><br>
                    <input type="radio" class="input_price" id="rd2" name="gender" data-price="150000:500000" value="female" onchange="changeFilterPrice();" <?= implode(":", array_values($_SESSION['price']))=="150000:500000" ? "checked" : "" ?>>
                    <label for="rd2">150k - 500k</label><br>
                    <input type="radio" class="input_price" id="rd3" name="gender" data-price="500000:1000000" value="other" onchange="changeFilterPrice();" <?= implode(":", array_values($_SESSION['price']))=="500000:1000000" ? "checked" : "" ?>>
                    <label for="rd3">500k - 1tr</label> <br>
                    <input type="radio" class="input_price" id="rd4" name="gender" data-price="1000000:0" value="other"
                    onchange="changeFilterPrice();" <?= implode(":", array_values($_SESSION['price']))=="1000000:0" ? "checked" : "" ?>>
                    <label for="rd4"> > 1tr</label>
                </form>
            </div>
            <div class="col-lg-9">
            <h1 class="line-title">
                <?php
                    foreach($row_breadcrumb as $uri_breadcrumb=>$title_breadcrumb){
                        echo $title_breadcrumb;
                    }
                    ?>
            </h1>
                <div class="load">
                    <div class="load2">
                      <?php

                        if( !empty($_SESSION['id_category']) && isset($_SESSION['id_category']) && $_SESSION['id_category'] != "all"){

                           // var_dump('ton tai category');
                            $category_product['child'] = getItems(array('table'=>'category','condition'=>'where enable > 0 and id = '.$_SESSION['id_category'].' '));
                           
                        } else if($_SESSION['id_category']=="all"){
                            $category_id = $category['id'];
                            $category_all = $layout['header']['navigation'];
                        
                            foreach ($category_all as $value ) {
                                if($value['id'] == $category_id){
                                    $category_product = $value;
                                }
                            }
                        }
                      ?>
                     
                        <?php foreach($category_product['child'] as $value ) : ?>
                      
                            <?php 
                                if(!isset($_SESSION['price'])){
                                    $getProduct = getItems(array('table'=>'product','condition'=>'where enable > 0 and popular2 > 0  and find_in_set('.$value['id'].',category_id) limit 8'));

                                    //var_dump('khong ton tai gia');

                                }else {
                                    //var_dump('ton tai gia');

                                    $where = array();

                                        if (floatval($_SESSION['price']['min']) > 0)
                                        $where[] = "if(cast(t.price_sale as unsigned)>0,cast(t.price_sale as unsigned),cast(t.price as unsigned)) >= {$_SESSION['price']['min']}";

                                        if (floatval($_SESSION['price']['max']) > 0)
                                        $where[] = "if(cast(t.price_sale as unsigned)>0,cast(t.price_sale as unsigned),cast(t.price as unsigned)) < {$_SESSION['price']['max']}";

                                    if (!empty($where)){
                                        $where = implode(" and ", $where);
                                    }
                                    else{
                                        $where = "true";
                                    }

                                    if(isset($_SESSION['id_category'])){
                                        $db->query("select p.*, t.price, t.price_sale from #_product p join #_translate t on p.id=t.item_id where t.table_name='product' and t.language_id={$_SESSION['lang']['id']} and p.enable>0 and {$where} and find_in_set({$value['id']}, category_id) order by p.level desc, p.create_date desc, p.title");
                                        //var_dump('ton tai gia va category');
                                        $getProduct = $db->result_array();
                                    }else {
                                        $db->query("select p.*, t.price, t.price_sale from #_product p join #_translate t on p.id=t.item_id where t.table_name='product' and t.language_id={$_SESSION['lang']['id']} and p.enable>0 and {$where} and find_in_set({$value['id']}, category_id) order by p.level desc, p.create_date desc, p.title");
                                        //var_dump('ton tai gia va khong ton tai category');
                                        $getProduct = $db->result_array();
                                    }
                                }
                            ?>
                          
                                <div class="title-category">
                                    <h2>
                                        <?=$value['title']?>
                                    </h2>
                                    <?php if(!empty($getProduct)) { ?> 
                                        <a href="<?=getURL($value['uri'])?>"> Xem thêm >></a> 
                                    <?php }?>
                                </div>
                            <?php if(!empty($getProduct)) { ?>
                                <div class="section-products top-hot-deal">
                                    <div class="row">
                                        <?php foreach($getProduct as $value2) : ?>
                                        <div class="col-lg_4 col-md-4 col-sm-6 col-xs-6 mb-2-5">
                                            <div class="item-product">
                                                <a href="<?=getURL($value2['uri'])?>">
                                                <img src="<?=$value2['thumbnail']?>" alt="">
                                                </a>
                                                <div class="info-product">
                                                    <h2 class="title-product">
                                                        <a href="<?=getURL($value2['uri'])?>">
                                                        <?php 
                                                            if(strlen($value2['title']) > 45) {echo substr($value2['title'],0,45).'... ';}
                                                            else { echo $value2['title']; } 
                                                            ?>
                                                        </a>
                                                    </h2>
                                                    <div class="price-sale">
                                                        <?=getPriceSale($value2)?>
                                                    </div>
                                                    <div class="view">
                                                        <i class="far fa-eye"></i>
                                                        <span class="view-number">Lượt xem:
                                                        <?php if(!empty($value2['view'])) { echo $value2['view'];} else {echo '0';} ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="sub-item">
                                                    <h2 class="title-product">
                                                        <b>
                                                        <a href="<?=getURL($value2['uri'])?>">
                                                        <?php 
                                                            if(strlen($value2['title']) > 45) {echo substr($value2['title'],0,45).'... ';}
                                                            else { echo $value2['title']; } 
                                                            ?>
                                                        </a>
                                                        </b>
                                                    </h2>
                                                    <div class="price-sale">
                                                        <b> <?=getPriceSale($value2)?> </b>
                                                    </div>
                                                    <?= ($value2['first_tag']) ?>
                                                    <?php if(!empty($layout['index']['speed'])) : ?>
                                                    <p class="speed">
                                                        Xem phi van chuyen <a href="<?=$layout['index']['speed'][0]['uri']?>"> Tại đây </a>
                                                    </p>
                                                    <?php endif ?>
                                                    <div class="bottom">
                                                        <a href="<?=getURL($value2['uri'])?>" class="detail">
                                                        XEM CHI TIẾT
                                                        </a>
                                                        <a href="javascript: void(0);" class="buy_now" onclick="cartAjax({ 
                                                            action: 'addtocart', 
                                                            id: '<?= $value2['id'] ?>',
                                                            quantity: $(this).parent().prev().find('.qty-value').val(),
                                                            // price: $('#giaban').html(),
                                                            type:'Mua trực tiếp', 
                                                            lbl: 'label-success',
                                                            msg: 'Thêm vào giỏ hàng thành công'
                                                            });">
                                                        THÊM GIỎ HÀNG
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                            <?php } else{ ?>
                                <h3 style="text-align: center;"> Không tìm thấy sản phẩm phù hợp </h3>
                            <?php } ?>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .category-product .section-products{
    margin-bottom: 80px;
    }
    .title-category {
    border-bottom: 1px solid rgb(232, 10, 10);
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    }
    .title-category h2 {
    color: #fff;
    margin: 0;
    padding: 10px 15px;
    background: rgb(232, 10, 10);
    display: inline-block;
    }
    .filter{
    background: #fff;
    padding: 10px;
    }
</style>
<script>
    function changeFilterCategory(){
    
        let data_category = $(".input_category:checked").data("category");

            $.ajax({
                url: "<?= getAjaxURL() ?>filter.php",
                data: {id_category: data_category },
                method: "post",
                dataType: "json",
                success: function (json) {
                if(json.result ==1 ){
                    $(".load").load(" .load > .load2");
                }
                
                }
            });
    }

    function changeFilterPrice(){
        let data_price = $(".input_price:checked").data("price");
        
        $.ajax({
            url: "<?= getAjaxURL() ?>filter.php",
            data: {price: data_price },
            method: "post",
            dataType: "json",
            success: function (json) {
               if(json.result == 1){
                    $(".load").load(" .load > .load2");
               }
            }
        });
    }


    
</script>