<?php include (_template."layout/titlebar.php") ?>
<div class="detail-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                <div class="item">
                    <div class="img-main">
                        <img src="<?=$product['thumbnail']?>" alt="" style="width: 100%;">
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-m-7 col-sm-12 col-xs-12">
                <div class="item">
                    <h1> <?=$product['title']?> </h1>
                    <div class="border-height-small"></div>
                    <div class="price">
                        <span class="price_origin"> <?php echo getPriceSale(array('price_sale'=> intval($product['price_sale']) + intval($product['promotion_price']))) ?> </span> 

                        <span class="price_sale"> <?= getPriceSale($product) ?> </span> 
                    </div>
                    <div class="border-height-small"></div>
                    <h3>Mô tả sản phẩm</h3>
                    <div class="description" style="border: 1px solid #ccc; padding: 10px;">
                        <?=$product['first_tag']?>
                    </div>
                    <div class="border-height-small"></div>
                    <div class="line-cart" style="">
                        <input type="number" size="4" value="1" min="1">
                        <button class="buy-now"
                            onclick="cartAjax({ 
                            action: 'addtocart',
                            quantity: $(this).prev().val(), 
                            id: '<?= $product['id'] ?>', 
                            lbl: 'label-success', 
                            callback: function(){ setTimeout(function() { window.location='<?= $classify['cart'][0]['uri'] ?>'; }, 500); } });">
                            
                            Mua ngay 
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="border-height-large"></div>

        <div class="item-bottom">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item active">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Comments</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active in" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h2 class="title-item">Description</h2>
                            <p> <?=$product['second_tag']?> </p>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <h2 class="title-item">Comment</h2>
                            <div class="comment_item" style="margin-top: 50px;">
                                <div class="container">
                                    <div id="comment">
                                        <div id="fb-root"></div>
                                        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0&appId=1752669808220357&autoLogAppEvents=1" nonce="hrMLHhqv"></script>
                                        <!-- <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=true&version=v8.0&appId=764720674363696&autoLogAppEvents=1"></script> -->
                                        <div class="fb-comments" data-href="<?=getCurrentPageURL().$value['uri']?>.html" data-width="100%" data-numposts="10"></div>
                                    </div>
                                </div>
                                <style>
                                    #comment iframe {
                                    width: 100% !important
                                    }
                                </style>
                            </div>
                        </div>
                    </div>
                </div>

        <div class="border-height-large"></div>

        <div class="products-related_product">
                    <section class="show-product">
                        <div class="container-fluid">
                            <h2 class="title-item"> Related products </h2>
                            <div class="items">
                                <div class="row">
                                    <?php foreach($row_related as $value) : ?>
                                    <div class="col-lg-3 col-m-4 col-sm-6 col-xs-6">
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
                            </div>
                        </div>
                    </section>
                </div>
    </div>
</div>


    <script>
        $( document ).ready(function() {
            $("#see-more-product").click(function(){
                $('.list-product-see').css('height','auto');

                $(this).parent().css('display','none');
            })
        });
    </script>
