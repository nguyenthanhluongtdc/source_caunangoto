<section class="titlebar">
    <div class="container-fluid">
        <div class="display-flex flex--between flex-center- content" style="padding: 50px 0;">
            <?php if($post) { ?>
                <h1> <?=$post['title']?> </h1>
                <style>
                    .titlebar .content{
                        display: block;
                    }
                </style>
            <?php } elseif($product){?>
                <h1> <?=$product['title']?> </h1>
               
            <?php }else{ ?> 
                <h1> <?=$category['title']?> </h1>
            <?php } ?>
           
            
            <ol class="breadcrumb">
                <li>
                    <a href="<?=is_file("./home.php")?"./index.php":"./"?>"  style="color: #1d1d1d;" class="text-uppercase">Trang chủ</a> 
                </li> 
            <?php $i=1;
            foreach($row_breadcrumb as $uri_breadcrumb=>$title_breadcrumb){
                if($uri_breadcrumb!=""&&$title_breadcrumb!=""){
                    if($i<count($row_breadcrumb)){?>
                    <li>
                        <a href="<?=getURL($uri_breadcrumb)?>"  class="text-uppercase" style="color: #1d1d1d;"><?=$title_breadcrumb?></a> 
                    </li>
                    <?php }else{ ?>
                    <li class="active text-uppercase" style="color: #1d1d1d;">
                        <?=$title_breadcrumb?>
                    </li>
            <?php }} $i++;}?> 
            </ol>
        </div>
    </div>
</section>

<style>
    .titlebar h1{
        font-size: 36px;
        text-transform: uppercase;  
        font-weight: 500;
        color: #000;
    }

</style>