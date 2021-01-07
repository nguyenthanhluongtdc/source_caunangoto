<header style="position: -webkit-sticky; /* Safari */
   background: #fff;" class="hidden-sm hidden-xs">
    <div class="header-top">
        <div class="container-fluid">
            <div class="row flex-center- display-flex item-top flex--between">
                <div class="col-lg-2" style="margin-bottom: 0;">
                    <div class="logo-main">
                        <a href="<?=getURL()?>">
                            <img src="<?=$layout['header']['logo_website']['thumbnail']?>" alt="" >
                        </a>
                    </div>
                </div>
                <?php foreach($layout['header']['header_support'] as $value) : ?>
                    <div class="col-lg-2" style="margin-bottom: 0;">
                        <div class="item display-flex flex-center-">
                            <div class="icon">
                                <img src="<?=$value['thumbnail']?>" alt="" style="height: 35px; width: auto;">
                            </div>
                            <div class="content">
                                <strong> <?= $value['title'] ?> </strong>
                                <div> <?=$value['link']?> </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
                <div class="col-lg-4" style="margin-bottom: 0;">
                    <ul class="display-flex flex--between nav-pills list-unstyled item-icons">
                        <div class="flex-grow-1"></div>
                        <?php foreach($layout['header']['icon_contact'] as $value) : ?>
                            <li>
                                <a href="<?=$value['link']?>" style="color: #000;"> 
                                    <img src="<?=$value['thumbnail']?>" alt=""  style="height: 35px; width: auto;">
                                </a>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="flex-grow-1"></div>
            <ul class="item nav navbar-nav display-flex flex-center-" style="float: right;">
            <?php $nav = $layout['header']['navigation']; ?>
            <?php foreach($nav as $value) : ?>
                <li>
                    <a href="<?=getURL($value['uri'])?>" class="text-center">
                        <?=$value['title']?> <br>
                        <?php if(!empty($value['child'])) : ?>
                            <i class="far fa-chevron-down" style="position: absolute; left: 50%; transform: translateX(-50%)"></i>
                        <?php endif ?>
                    </a>

                    <?php if(!empty($value['child'])) : ?>
                        <ul class="sub-item">
                        <?php foreach($value['child'] as $sub_value) : ?>
                            <li>
                                <a href="<?=getURL($sub_value['uri'])?>"> <?=$sub_value['title']?> </a>
                            </li>
                        <?php endforeach ?>
                        </ul>
                    <?php endif ?>

                </li>
            <?php endforeach ?>
                <div class="box_cart-search">
                    <form action="<?=getURL($classify['search'][0]['uri'])?>" method="post" class="form-search">
                        <input type="text" placeholder="Tìm kiếm" name="title">
                        <button type="submit"><i class="far fa-search"></i></button>
                    </form>
                    <a href="javascript:void(0);" class="search"><i class="far fa-search"></i></a>
                    <a href="javascript:void(0);" class="close-top"> <i class="fal fa-times close-top" ></i> </a>
                    <a href="<?=getURL($classify['cart'][0]['uri'])?>" class="cart">
                        <i class="fas fa-shopping-cart"></i>

                        <b style="background: yellow; 
                                color: red; 
                                width: 20px;
                                height: 20px;
                                line-height: 20px;
                                border-radius: 50%; 
                                display: inline-block; 
                                text-align: center; 
                                position: absolute;
                                bottom: 5px;
                                left: 15px;
                                font-size: 14px;"> 
                            <?=$cart['total_quantity']?>
                        </b>
                    </a>
                </div>
            </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>

<nav class="navbar-mobile">
    <div class="toggle">
        <div class="img">
            <a href="<?=getURL()?>">
                <img src="<?=$layout['header']['logo_website']['thumbnail']?>" alt="" style="height: 100%; width: auto;" >
            </a>
        </div>
        <span></span>
    </div>
    <ul>
        <?php foreach($nav as $value) : ?>
        <li>
            <div>
                <a href="<?=getURL($value['uri'])?>">
                    <?=$value['title']?>
                </a>
                <?php if(!empty($value['child'])) : ?>
                    <i class="far fa-chevron-down icon-down"></i>
                    <i class="far fa-chevron-up icon-up"></i>
                <?php endif ?>
            </div>

            <?php if(!empty($value['child'])) : ?>
              
                <?php if(!empty($value['child'])) : ?>
                        <ul class="sub-item-mobile">
                        <?php foreach($value['child'] as $sub_value) : ?>
                            <li>
                                <a href="<?=getURL($sub_value['uri'])?>"> <?=$sub_value['title']?> </a>
                            </li>
                        <?php endforeach ?>
                        </ul>
                    <?php endif ?>

            <?php endif ?>
        </li>
        <?php endforeach ?>
    </ul>
</nav>

<script>

                //serch desktop
                $('.search').click(function(){
                    $(this).prev().css('opacity','1');
                    $(this).prev().css('width','100%');
                    $(this).prev().css('pointer-events','all');
                    $(this).css('display','none');
                    $('a.close-top').css('display','inline-block');
                
                    let first_height = $('.items-header').parent().height();

                    setTimeout(function(){  
                        if($('.items-header').parent().height() > first_height){
                            $('.box_cart-search').css( {
                                'float':'none',
                                'justify-content':'center'
                            } )
                            $('.form-search').css ( {
                                'width': '80%'
                            } )

                            $('.navbar-collapse-over').css( {
                                'float':'none',
                                'justify-content': 'center'
                            } )
                        }

                    }, 500);

                })

                $('a.close-top').click(function(){
                    $(this).prev().prev().css('opacity','0');
                    $(this).prev().prev().css('width','0');
                    $(this).prev().prev().css('pointer-events','none');
                    $(this).prev().css('display','inline-block');
                    $(this).css('display','none');

                    $('.box_cart-search').css( {
                        'float':'right'
                    } )
                })


                $(function () {
                    var nav = $('.navbar');

                    var nav_p = nav.position();

                    $(window).scroll(function () {
                        if ($(this).scrollTop() > nav_p.top) {
                            $('header').addClass('fixed');
                        } else {
                            $('header').removeClass('fixed');
                        }
                    });
                });

                //menu-mobile
                $(document).ready(function(){
                    $('span').click(function(){
                        $(this).parent().next().toggleClass('active');
                        $('.toggle').toggleClass('togle');
                    })

                    $('.icon-down').click(function(){
                        $('.sub-item-mobile').css({
                            'display':'none'
                        })

                        $('.icon-up').css({
                            'display':'none'
                        })

                        $('.icon-down').css({
                            'display':'inline-block'
                        })

                        $(this).parent().next().css({
                            'display':'block'
                        })

                        $(this).next().css({
                            'display':'inline-block'
                        })

                        $(this).css({
                            'display':'none'
                        })

                        $(this).next().click(function(){
                            $(this).prev().css({
                                'display':'inline-block'
                            })

                            $(this).css({
                                'display':'none'
                            })

                            $(this).parent().next().css({
                                'display':'none'
                            })
                        })
                    })
                })

</script>