<div id="modal-override">
   <div class="modal-main" style="background: #fff;">
      <i class="fas fa-times icon-exit-modal"></i>
      <div class="row content-modal">
      </div>
   </div>
</div>
<div class="menu-fixed-right">
   <ul class="list-icon-top">
      <!-- <li>
         <i class="fas fa-bell"></i>
         <div class="sub-item1">
            sub item 2
         </div>
         </li>
         <li>
         <i class="far fa-alarm-clock"></i>
         <div class="sub-item1">
            sub item 3
         </div>
         </li> -->
      <li>
         <a href=" <?=$classify['cart'][0]['uri']?>"><i class="fas fa-shopping-cart"></i></a>
         <div class="sub-item1" style="height: 400px; width: 350px; padding: 10px;">
            <?php $products = $cart['product']; ?>
            <?php if(count($products) > 0) { ?>
               <div class="info-product cart" style="height: 250px; padding: 10px;">
                  <?php foreach($products as $value) : ?>
                  <div class="row" style="margin-bottom: 15px;">
                     <div class="col-md-4">
                        <div class="img-product">
                           <img src="<?=$value['thumbnail']?>" alt="">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="name-product" >
                           <?=$value['title']?>
                        </div>
                        <div class="price-product">
                           <span class="soluong">
                           <?=$value['quantity']?>
                           </span>
                           x
                           <div class="price-sale">
                              <?=getPriceSale($value)?>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-2" style="padding-left: 0;">
                        <a href="javascript:void(0);" title="Xóa" onclick="cartAjax({ action: 'removefromcart', id: '<?= $value['id'] ?>', msg: 'Đã xóa sản phẩm khỏi giỏ hàng!', lbl: 'label-danger' });"><i class="far fa-trash-alt"></i></a>
                     </div>
                  </div>
                  <?php endforeach ?>
               </div>
               <div class="total-money">
                  Total: <?=$cart['total_price']?>
               </div>
               <a href="<?=$classify['cart'][0]['uri']?>" class="go-cart">
                  Đến giỏ hàng
               </a>
            <?php } else { ?>
               <div class="cart-empty">
                  <div class="title-content" style="text-align: left; padding-left: 20px;">
                     <h3>Giỏ hàng <i class="fas fa-vote-nay"></i></h3>
                  </div>

                  <div class="text" style="color: #cb411f;">
                     Giỏ hàng trống
                  </div>
               </div>
            <?php } ?>
         </div>
      </li>
      <li>
         <i class="far fa-chevron-left"></i>
         <ul class="sub-item1" style="width: 50px;">

         <?php if (is_array($layout['sidenav']['icon-call']) && !empty($layout['sidenav']['icon-call']['thumbnail'])): ?>
            <?php $zalo = $layout['sidenav']['icon-call']  ?>
            <li><a class="icon-call" href="tel:<?= $zalo['link'] ?>" rel="nofollow" title="<?= $zalo['value'] ?>">
                  <img src="<?=$zalo['thumbnail']?>" alt="" style="width: 30px; height: 30px;">
               </a>
            </li>
         <?php endif ?>

         <?php if (is_array($layout['sidenav']['icon-face']) && !empty($layout['sidenav']['icon-face']['thumbnail'])): ?>
            <?php $zalo = $layout['sidenav']['icon-face']  ?>
            <li>
               <a class="icon-call" href="<?= $zalo['link'] ?>" rel="nofollow" title="<?= $zalo['value'] ?>">
                  <img src="<?=$zalo['thumbnail']?>" alt="" style="width: 30px; height: 30px;">
               </a>
            </li>
         <?php endif ?>

         <?php if (is_array($layout['sidenav']['icon-zalo']) && !empty($layout['sidenav']['icon-zalo']['thumbnail'])): ?>
            <?php $zalo = $layout['sidenav']['icon-zalo']  ?>
            <li>
               <a class="icon-call" href="<?= $zalo['link'] ?>" rel="nofollow" title="<?= $zalo['value'] ?>">
                  <img src="<?=$zalo['thumbnail']?>" alt="" style="width: 30px; height: 30px;">
               </a>
            </li>
         <?php endif ?>

         <?php if (is_array($layout['sidenav']['icon-mes']) && !empty($layout['sidenav']['icon-mes']['thumbnail'])): ?>
            <?php $zalo = $layout['sidenav']['icon-mes']  ?>
            <li>
               <a class="icon-call" href="<?= $zalo['link'] ?>" rel="nofollow" title="<?= $zalo['value'] ?>">
                  <img src="<?=$zalo['thumbnail']?>" alt="" style="width: 30px; height: 30px;">
               </a>
            </li>
         <?php endif ?>

            <?php if(count($layout['sidenav']['list-sidenav']) > 0) : ?>
               <?php foreach($layout['sidenav']['list-sidenav'] as $value) : ?>
                  <li>
                     <a href="<?=$value['link']?>">
                        <img src="<?=$value['thumbnail']?>" alt="" style="width: 30px; height: 30px;">
                     </a>
                  </li>
               <?php endforeach ?>
            <?php endif ?>
         </ul>
      </li>
   </ul>

   <ul class="list-icon-bottom">
      <li>
         <a href=""><i class="fal fa-arrow-alt-from-bottom"></i></a>
         <div class="text">
            TOP
         </div>
      </li>
   </ul>
</div>