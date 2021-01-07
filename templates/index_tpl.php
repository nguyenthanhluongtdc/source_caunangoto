<div class="banner" style="margin-bottom: 20px;">
    <div class="owl-carousel owl-theme owl-banner">
    <?php foreach($layout['index']['carousel_main'] as $value) : ?>
        <div class="item">
            <img src="<?=$value['thumbnail']?>" alt="">
        </div>
    <?php endforeach ?>
    </div>
</div>

<div class="horizontal">
    <div class="container-fluid">
        <div class="row">
            <?php foreach($layout['index']['product_top'] as $value) : ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="item" style="background-image: url(<?=$value['thumbnail']?>); background-size: cover; padding: 20px 20px 20px 0;color: white;">
                    <h2 style="color: white; background-color: #F57A1B; padding: 10px 20px;"> 
                        <?=$value['title']?> 
                    </h2>
                    <div class="price" style="padding-left: 20px;">
                        From: 
                        <b style="font-weight: bold; font-size: 30px;"> <?=$value['link']?> đ </b>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</div>

<div class="border-height"></div>

<section class="show-product">
    <div class="container-fluid">
        <div class="header-title text-center">
            <h5> New Arrivals Products </h5>
            <h2> SẢN PHẨM MỚI NHẤT </h2>
        </div>

        <div class="items">
            <div class="row" style="display: flex; flex-wrap: wrap;">
                <?php $products_new = getItems(array('table'=>'product', 'condition'=>'where enable > 0 and popular2 > 0')) ?>
                <?php foreach($products_new as $value) : ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6" style="margin-bottom: 35px;">
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

                <?php if(!$products_new) : ?> <p class="text-center"> Khong co san pham phu hop </p> <?php endif ?>
            </div>
        </div>
    </div>
</section>

<div class="border-height"></div>

<div class="item-support">
    <div class="row" style="margin: 0;">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 m-0 item-left">
            <div class="img" >
                <img src="<?=$layout['index']['img_commit_main']['thumbnail']?>" alt="">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 m-0 item-right">
                <div class="row">
                <?php foreach($layout['index']['item_commit'] as $value) : ?>
                    <div class="col-lg-6">
                        <div class="item">
                            <div class="left">
                                <img src="<?=$value['thumbnail']?>" alt="">
                            </div>
                            <div class="right">
                                <h3> <?=$value['title']?> </h3>
                                <p>
                                    <?=$value['link']?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="border-height"></div>

<div class="item-support-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="item">
                    <!-- <h4> We provide a </h4> -->
                    <h2> <?=$layout['index']['title_info_add_main']['value']?> </h2>
                    <p> 
                        <?=$layout['index']['content_info_add_main']['value']?>
                    </p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="text-right img">
                    <img src="<?=$layout['index']['img_info_add_main']['thumbnail']?>" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="border-height"></div>

<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="item" style="height: 100%;">
                <div class="header-title text-center">
                    <!-- <h5> <?=$layout['index']['input_title1']['value']?> </h5> -->
                    <h2> <?=$layout['index']['title_video']['value']?> </h2>
                </div>
                    <div class="content-clip" style="height: 80%;">
                       <?=getYoutubeIframe($layout['index']['link_video']['value'])?>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 blog">
                <div class="item">
                    <div class="header-title text-center">
                        <!-- <h5> THE JOURNAL </h5> -->
                        <h2> BÀI VIẾT ĐĂNG GẦN ĐÂY </h2>
                    </div>

                    <ul class="list-item">
                    <?php $post_recent = getItems(array('table'=>'post','condition'=>'where enable > 0 order by id limit 3')); ?>
                    <?php foreach($post_recent as $value) : ?>
                        <li class="display-flex">
                            <div class="img" style="max-width: 25%;">
                                <a href="<?=getURL($value['uri'])?>">
                                    <img src="<?=$value['thumbnail']?>" alt="">
                                </a>
                            </div>
                            <div class="des">
                                <h4> <a href="<?=getURL($value['uri'])?>"> <?=$value['title']?> </a> </h4>
                                <p class="blog-desc-detail">March 24, 2015</p>
                            </div>
                        </li>
                    <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
  $('.owl-banner').owlCarousel({
    lazyLoad: true,
    loop: true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
  })

</script>

<style>
    .content-clip iframe{
        width: 100%;
        height: 100%;
    }
</style>