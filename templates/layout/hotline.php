<div class="sidenav">
   
   <ul>
      <?php if (is_array($layout['sidenav']['icon-call']) && !empty($layout['sidenav']['icon-call']['thumbnail'])): ?>
      <!-- <button class="hotline-collapse-btn btn btn-link" style="padding: 0; width: 100%; border-bottom: solid 1px #ccc; color: #000;" onclick="$(this).next().toggleClass('shown'); $(this).toggleClass('shown');"> -->
      <!-- <span class="fa fa-plus"></span>
         <span class="fa fa-minus"></span> -->
      </button>
      <!-- <div class="li shown"> -->
      <?php $zalo = $layout['sidenav']['icon-call']  ?>
      <li><a class="icon-call" href="tel:<?= $zalo['link'] ?>" rel="nofollow" title="<?= $zalo['value'] ?>">
         <i style="background-image: url('<?= $zalo['thumbnail'] ?>');"></i>
         </a>
      </li>
      <!-- </div> -->
      <?php endif ?>
   </ul>
   <ul>
      <?php if (is_array($layout['sidenav']['icon-face']) && !empty($layout['sidenav']['icon-face']['thumbnail'])): ?>
      <!-- <button class="hotline-collapse-btn btn btn-link" style="padding: 0; width: 100%; border-bottom: solid 1px #ccc; color: #000;" onclick="$(this).next().toggleClass('shown'); $(this).toggleClass('shown');"> -->
      <!-- <span class="fa fa-plus"></span>
         <span class="fa fa-minus"></span> -->
      </button>
      <!-- <div class="li shown"> -->
      <?php $zalo = $layout['sidenav']['icon-face']?>
      <li><a class="icon-call" href="<?= $zalo['link'] ?>" rel="nofollow" title="<?= $zalo['value'] ?>">
         <i style="background-image: url('<?= $zalo['thumbnail'] ?>');"></i>
         </a>
      </li>
      <!-- </div> -->
      <?php endif ?>
   </ul>
   <ul>
      <?php if (is_array($layout['sidenav']['icon-zalo']) && !empty($layout['sidenav']['icon-zalo']['thumbnail'])): ?>
      <!-- <button class="hotline-collapse-btn btn btn-link" style="padding: 0; width: 100%; border-bottom: solid 1px #ccc; color: #000;" onclick="$(this).next().toggleClass('shown'); $(this).toggleClass('shown');"> -->
      <!-- <span class="fa fa-plus"></span>
         <span class="fa fa-minus"></span> -->
      </button>
      <!-- <div class="li shown"> -->
      <?php $zalo = $layout['sidenav']['icon-zalo']?>
      <li><a class="icon-call" href="<?= $zalo['link'] ?>" rel="nofollow" title="<?= $zalo['value'] ?>">
         <i style="background-image: url('<?= $zalo['thumbnail'] ?>');"></i>
         </a>
      </li>
      <!-- </div> -->
      <?php endif ?>
   </ul>
   <ul>
      <?php if (is_array($layout['sidenav']['icon-mes']) && !empty($layout['sidenav']['icon-mes']['thumbnail'])): ?>
      <!-- <button class="hotline-collapse-btn btn btn-link" style="padding: 0; width: 100%; border-bottom: solid 1px #ccc; color: #000;" onclick="$(this).next().toggleClass('shown'); $(this).toggleClass('shown');"> -->
      <!-- <span class="fa fa-plus"></span>
         <span class="fa fa-minus"></span> -->
      </button>
      <!-- <div class="li shown"> -->
      <?php $zalo = $layout['sidenav']['icon-mes']?>
      <li><a class="icon-call" href="<?= $zalo['link'] ?>" rel="nofollow" title="<?= $zalo['value'] ?>">
         <i style="background-image: url('<?= $zalo['thumbnail'] ?>');"></i>
         </a>
      </li>
      <!-- </div> -->
      <?php endif ?>
   </ul>
   <ul>
        <?php $hotline = $layout['sidenav']['list-sidenav']?>
        <?php if(count($hotline) > 0) : ?>
        <?php foreach($hotline as $value) : ?>
                <li>
                    <a class="icon-call" href="<?= $value['link'] ?>" rel="nofollow" target="_blank" title="">
                        <i style="background-image: url('<?=$value['thumbnail']?>');"></i>
                    </a>
                </li>
        <?php endforeach ?>
        <?php endif ?>
   </ul>
</div>
<!-- <script>
   $(function () {
       setTimeout(function () {
           $(".sidenav .li").css("height", $(".sidenav .li").css("height"));
           $(".sidenav .li").removeClass("shown");
       }, 500);
   });
   </script> -->
<style>
   @media screen and (max-height: 450px) {
   .sidenav {
   padding-top: 15px;
   }
   }
   .sidenav {
   width: 52px;
   position: fixed;
   z-index: 1;
   bottom: 25px;
   left: 13px;
   }
   .sidenav {
   width: auto !important;
   z-index: 150 !important;
   bottom: 40px !important;
   padding: 5px;
   }
   .sidenav ul {
   padding: 0;
   margin: 0;
   }
   .sidenav ul li {
   margin-top: 5px;
   }
   .sidenav ul li a {
   padding: 3px;
   display: block;
   border-radius: 5px;
   text-align: center;
   font-size: 13px;
   line-height: 1.2;
   color: var(--mauy);
   font-weight: 700;
   max-width: 72.19px;
   }
   .icon-call i {
   position: relative;
   }
   .icon-call i:before {
   width: 100%;
   height: 100%;
   position: absolute;
   border-radius: 100%;
   content: "";
   top: 0;
   left: 0;
   box-shadow: 0 0 20px var(--maux), 0 0 20px var(--maux);
   pointer-events: none;
   animation: shadow 1.5s .5s infinite;
   }
   @media screen and (max-height: 450px) {
   .sidenav a {
   font-size: 18px;
   }
   }
   .sidenav a {
   padding: 6px 8px 6px 14px;
   text-decoration: none;
   font-size: 28px;
   color: #32608b;
   display: block;
   }
   .sidenav ul li a i {
   width: 40px;
   height: 40px;
   display: block;
   margin: auto;
   background-size: contain;
   background-repeat: no-repeat;
   margin-bottom: 5px;
   animation: shadowA 1s 0s infinite;
   }
   .wrap-fixed-footer {
   display: none;
   }
   @media screen and (max-width: 767px) {
   .sidenav .li {
   overflow: hidden;
   -webkit-transition: all .8s;
   -o-transition: all .8s;
   transition: all .8s;
   }
   .sidenav .li:not(.shown) {
   height: 0 !important;
   }
   .sidenav .hotline-collapse-btn:not(.shown) span.fa-minus,
   .sidenav .hotline-collapse-btn.shown span.fa-plus {
   display: none;
   }
   .wrap-fixed-footer {
   background: #f2f2f2;
   width: 100%;
   color: #fff;
   height: 50px;
   line-height: 50px;
   position: fixed;
   bottom: 0;
   left: 0;
   z-index: 999;
   padding: 5px;
   margin: 0;
   box-shadow: 0px 4px 10px 0 #000;
   }
   .wrap-fixed-footer li {
   float: left;
   width: 20%;
   list-style: none;
   height: 50px;
   }
   .wrap-fixed-footer li .button {
   background: 0 0;
   color: #515151;
   width: 100%;
   height: 100%;
   line-height: 16px;
   text-align: center;
   display: block;
   position: relative;
   font-size: 12px;
   font-weight: 400;
   padding: 2px 0 0;
   }
   .wrap-fixed-footer li .button i {
   font-size: 26px;
   display: block;
   }
   .wrap-fixed-footer li.fixed-icon .button i {
   top: 8px;
   height: 27px;
   width: 100%;
   background-position: center;
   background-size: contain;
   background-repeat: no-repeat;
   }
   .wrap-fixed-footer li .button #count-cart {
   position: absolute;
   right: 1px;
   top: -12px;
   color: #fff;
   background: #e73838;
   width: 25px;
   height: 25px;
   line-height: 26px;
   border-radius: 50%;
   z-index: 2;
   font-size: 13px;
   }
   .wrap-fixed-footer li .button .phone_animation {
   position: absolute;
   top: -24px;
   left: 50%;
   transform: translate(-50%,0);
   width: 50px;
   height: 50px;
   border-radius: 100%;
   background: #e73838;
   line-height: 15px;
   }
   .wrap-fixed-footer li .button .phone_animation i {
   display: inline-block;
   width: 27px;
   margin-top: 12px;
   }
   .wrap-fixed-footer li .button .btn_phone_txt {
   position: relative;
   top: 26px;
   }
   .icon-phone-w {
   background-size: contain;
   background-repeat: no-repeat;
   width: 36px;
   height: 36px;
   display: inline-block;
   }
   .wrap-fixed-footer li:last-child {
   margin-right: 0;
   }
   .animation-shadow:after {
   width: 100%;
   height: 100%;
   position: absolute;
   border-radius: 100%;
   content: "";
   top: 0;
   left: 0;
   pointer-events: none;
   box-shadow: 0 0 20px #e73838, 0 0 20px #e73838;
   animation: shadow 1.2s .5s infinite;
   }
   }
   @keyframes shadow{
   0% { transform:scale(1.1);-webkit-transform:scale(1.1);-moz-transform:scale(1.1);-o-transform:scale(1.1) }
   25% { transform:scale(1.2) }
   50%{ transform:scale(1.3);-webkit-transform:scale(1.2);-moz-transform:scale(1.2);-o-transform:scale(1.2) }
   75% { transform:scale(1.4); }
   100%{ transform:scale(1.5);-webkit-transform:scale(1.3);-moz-transform:scale(1.5);-o-transform:scale(1.5);opacity:0 }
   }
   @keyframes shadowA {
   0% { transform: rotate(-20deg); }
   25% { transform: rotate(10deg); }
   50% { transform: rotate(-10deg); }
   75% { transform: rotate(20deg); }
   100% { transform: rotate(-20deg); }
   }
</style>
<ul class="wrap-fixed-footer">
   <li><a href="<?= getURL($classify['cart'][0]['uri']) ?>" rel="nofollow" class="button"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span id="count-cart"><font><?= $cart['total_quantity'] ?></font></span>Giỏ hàng</a></li>
   <li>
      <a href="tel:<?= $information['hotline'] ?>" rel="nofollow" class="button">
      <span class="phone_animation animation-shadow">
      <i class="icon-phone-w" aria-hidden="true" style="background-image: url('./assets/img/icon-call.png');"></i>
      </span>
      <span class="btn_phone_txt">Gọi điện</span>
      </a>
   </li>
   <?php foreach ($layout['image']['hotline'] as $r_hotline): ?>
   <li class="fixed-icon"><a href="<?= $r_hotline['link'] ?>" rel="nofollow" target="_blank" class="button">
      <i style="background-image: url('<?= $r_hotline['thumbnail'] ?>');"></i><?= $r_hotline['value'] ?>
      </a>
   </li>
   <?php endforeach ?>
</ul>