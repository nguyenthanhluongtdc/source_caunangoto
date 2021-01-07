<?php include (_template."layout/titlebar.php") ?>

<div class="border-height"></div>
<div class="show-product">
    <div class="container-fluid">

        <div class="items">
            <div class="col-lg-3 col-md-3">

                <div class="item item-left category_hot" style="border: none; padding: 20px;">
                    <h4> <span>LỌC THEO GIÁ</span>  <i class="far fa-chevron-down"></i></h4>    
                    <form action="" method="post" class="filter filter-price">
                        <p> 
                            <input type="radio" class="input_price" id="rd0" name="gender" data-price="0:0" value="male" onchange="changeFilterPrice();" <?= implode(":", array_values($_SESSION['price']))=="0:0" ? "checked" : "" ?> >
                            <label for="rd0"> Tất cả </label> </p>
                        <p>
                            <input type="radio" class="input_price" id="rd1" name="gender" data-price="0:150000" value="male" onchange="changeFilterPrice();" <?= implode(":", array_values($_SESSION['price']))=="0:150000" ? "checked" : "" ?> >
                            <label for="rd1"> < 150k </label>
                        </p>

                        <p>
                            <input type="radio" class="input_price" id="rd2" name="gender" data-price="150000:500000" value="female" onchange="changeFilterPrice();" <?= implode(":", array_values($_SESSION['price']))=="150000:500000" ? "checked" : "" ?>>
                            <label for="rd2">150k - 500k</label>
                        </p>
                        
                        <p>
                            <input type="radio" class="input_price" id="rd3" name="gender" data-price="500000:1000000" value="other" onchange="changeFilterPrice();" <?= implode(":", array_values($_SESSION['price']))=="500000:1000000" ? "checked" : "" ?>>
                            <label for="rd3">500k - 1tr</label>
                        </p>
                        <p>
                            <input type="radio" class="input_price" id="rd4" name="gender" data-price="1000000:0" value="other"
                            onchange="changeFilterPrice();" <?= implode(":", array_values($_SESSION['price']))=="1000000:0" ? "checked" : "" ?>>
                            <label for="rd4"> > 1tr</label>
                        </p>
                    </form>
                </div>
                
                <div class="item item-left category_hot hidden-sm hidden-xs" style="border: none; padding: 20px;">
                    <h4> <span>DANH MỤC NỔI BẬT</span>  <i class="far fa-chevron-down"></i></h4>
                    <ul>
                        <?php foreach($layout['index']['category_hot'] as $value) : ?>
                            <li> 
                                <a href="<?=$value['uri']?>"> <b><?=$value['title']?></b> </a>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
                    <div class="col-lg-9 col-md-9">
                    <?php 
                        $where = array();
                        
                        if (is_array($_SESSION['price']) && !empty($_SESSION['price']) && isset($category['id'])) {
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
        
                                $db->query("select p.*, t.price, t.price_sale from #_product p join #_translate t on p.id=t.item_id where t.table_name='product' and t.language_id={$_SESSION['lang']['id']} and p.enable>0 and {$where} and find_in_set({$category['id']}, category_id) order by p.level desc, p.create_date desc, p.title");
                                $row_product = $db->result_array();    
                                $row_product = $pagination->paging($row_product, $limit, $_REQUEST['p']);
	                            $paging = $pagination->getSource();  
                        }

                        else if(isset($where_search)){
                            if(is_array($_SESSION['price']) && !empty($_SESSION['price']) ){
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
            
                                    $db->query("select p.*, t.price, t.price_sale from #_product p join #_translate t on p.id=t.item_id where t.table_name='product' and t.language_id={$_SESSION['lang']['id']} and p.enable>0 and {$where} and {$where_search} order by p.level desc, p.create_date desc, p.title");
                                    $row_product = $db->result_array();    

                                    $row_product = $pagination->paging($row_product, $limit, $_REQUEST['p']);
	                                $paging = $pagination->getSource();
                            }
                        }

                    ?> 
                    <div class="header-title display-flex flex--between">
                        <p class="title_change"> TẤT CẢ SẢN PHẨM </p>
                    </div>
                    
                    <div class="box-load">
                        <div class="item-load">
                            <div class="row">
                                <?php foreach($row_product as $value) : ?>
                                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
                                        <div class="item">
                                            <div class="node-cart">
                                                <a href="javascript:void(0)"
                                                        onclick="cartAjax({ 
                                                        action: 'addtocart',
                                                        quantity: 1, 
                                                        id: '<?= $value['id'] ?>', 
                                                        lbl: 'label-success', 
                                                        });">

                                                    <i class="far fa-plus"></i>
                                                    <b> Add to cart </b>
                                                </a>
                                            </div>

                                            <div style="display: flex; flex-wrap: wrap; align-content: space-between; height: 100%;">
                                                <div class="img" style="text-align: center; width: 100%;">
                                                    <a href="<?=getURL($value['uri'])?>"> 
                                                        <img src="<?=$value['thumbnail']?>" alt="">
                                                    </a>
                                                </div>
                                                <div class="content" style="width: 100%;">
                                                            <h2 class="title"> <a href="<?=getURL($value['uri'])?>">  <?=$value['title']?> </a> </h2>
                                                            <?php if(!empty($value['promotion_price'])) { ?>
                                                                <div class="box-sale">
                                                                    <span class="price_origin"> <?php echo getPriceSale(array('price_sale'=> intval($value['price_sale']) + intval($value['promotion_price']))) ?> </span> 
                                                                    <span class="price_sale"> <?= getPriceSale($value) ?> </span> 
                                                                </div>
                                                            <?php } else if(!empty($value['promotion_percent'])) { ?>
                                                                <div class="box-sale"> 
                                                                    <span class="sale_phantram"> -<?=$value['promotion_percent']?>% </span> 
                                                                    <span class="price_sale"> <?= getPriceSale($value) ?> </span> 
                                                                </div>
                                                            <?php } else { ?>
                                                                <div class="box-sale" style="text-align: center; display: block;"> 
                                                                    <span class="price_sale"> <?= getPriceSale($value) ?> </span> 
                                                                </div>
                                                            <?php } ?>   
                                                </div>
                                            </div>
                                            
                                            <a href="<?=getURL($classify['cart'][0]['uri'])?>" class="go-cart">
                                                Xem giỏ hàng
                                            </a>
                                            <?php if(!empty($value['promotion_price'])) { ?>
                                                <b class="sale" style="padding: 10px 5px; display: inline-block; background-color: #ed7925; color: #fff; position: absolute; top: 15px; left: 15px;"> Sale! </b>
                                            <?php } else if(!empty($value['promotion_percent'])){ ?> 
                                                <b class="sale" style="padding: 10px 5px; display: inline-block; background-color: #ed7925; color: #fff; position: absolute; top: 15px; left: 15px;"> Sale! <?=$value['promotion_percent']?>% </b>
                                            <?php } ?>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                                
                            </div>
                            <?=$paging?>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

<style>
    .header-title{
        font-size: 14px;
        color: #000;
        text-transform: uppercase;
    }
    
</style>

<script>
    function changeFilterPrice(){
        let data_price = $(".input_price:checked").data("price");
        let en_price = [];
        
        $.ajax({
            url: "<?= getAjaxURL() ?>filter.php",
            data: {price: data_price },
            method: "post",
            dataType: "json",
            success: function (json) {
               if(json.result == 1){
                
                en_price = json.data_array
                
                if(en_price.min > 0 || en_price.max > 0){
                   document.querySelector('.title_change').innerHTML = "<b style= 'color: red; font-size: 15px;' > Từ </b>" + en_price.min +"đ "+ "<b style='color: red; font-size: 15px;' > Đến </b> " + en_price.max +"đ"; 
                }else {
                    $('.title_change').html('TẤT CẢ SẢN PHẨM');
                }

                $(".box-load").load(" .box-load > .item-load");

               }
            }
        });

        
        
    }
</script>