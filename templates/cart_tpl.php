<style>
   #body{
   background: #f0f0f0 !important;
   }
   .btn-success{
   background: rgb(213,183,196);
   background: linear-gradient(0deg, rgba(213,183,196,0.6222864145658263) 0%, rgba(232,1,1,0.6727065826330532) 99%);
   }
   .btn-success:hover{
   background: rgb(232,1,1);
   background: linear-gradient(0deg, rgba(232,1,1,0.6727065826330532) 0%, rgba(213,183,196,0.6222864145658263) 100%);
   }

  
</style>

<?php include (_template."layout/titlebar.php") ?>
<div class="border-height-large"></div>
<div class="table-cart-wrapper" id="cart_load">
   <div class="container" id="cart_load1">
      <div class="row">
         <?php if (is_array($cart['product']) && !empty($cart['product'])): ?>
         <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <div class="item-left">
               <h3 class="title"> <b>GIỎ HÀNG CỦA BẠN</b> </h3>
               <?php foreach($cart['product'] as $value) : ?>

                  <div class="row-item">
                     <div class="img ri" style="width: 15%;">
                        <a href="<?=getURL($value['uri'])?>"> 
                           <img src="<?= $value['thumbnail'] ?>" alt="" >
                        </a>

                        <div class="quantity ri visible-xs-flex" style="display: none; margin-top: 10px; width: 100%;"> 
                           <button class="btn-down update qt" onclick="
                                 $(this).css('pointer-events', 'none'); $(this).css('opacity', '.5'); 
                                 cartAjax({ action: 'updatefromcart', 
                                 id: '<?= $value['id'] ?>',
                                 msg: 'Giỏ hàng đã được cập nhật!', lbl: 'label-warning', 
                                 quantity: Math.max(1, Number($(this).next().val())-1) });" 
                                 ><i class="fas fa-caret-left"></i>
                           </button>

                           <input type="text" class="input_value qt" value="<?=$value['quantity']?>">

                           <button class="btn-up update qt" onclick="$(this).css('pointer-events', 'none'); $(this).css('opacity', '.5'); 
                              cartAjax({ action: 'updatefromcart', 
                              id: '<?= $value['id'] ?>', 
                              msg: 'Giỏ hàng đã được cập nhật!', lbl: 'label-warning', 
                              quantity: Number($(this).prev().val())+1 });" 
                              ><i class="fas fa-caret-right"></i>
                           </button>
                          
                        </div>
                     </div>
                     <div class="quantity ri hidden-xs"> 
                        <button class="btn-up update qt" onclick="$(this).css('pointer-events', 'none'); $(this).css('opacity', '.5'); 
                           cartAjax({ action: 'updatefromcart', 
                           id: '<?= $value['id'] ?>', 
                           msg: 'Giỏ hàng đã được cập nhật!', lbl: 'label-warning', 
                           quantity: Number($(this).next().val())+1 });" 
                           ><i class="fas fa-caret-up"></i>
                        </button>

                        <input type="text" class="input_value qt" value="<?=$value['quantity']?>">

                        <button class="btn-down update qt" onclick="
                              $(this).css('pointer-events', 'none'); $(this).css('opacity', '.5'); 
                              cartAjax({ action: 'updatefromcart', 
                              id: '<?= $value['id'] ?>',
                              msg: 'Giỏ hàng đã được cập nhật!', lbl: 'label-warning', 
                              quantity: Math.max(1, Number($(this).prev().val())-1) });" 
                              ><i class="fas fa-sort-down"></i>
                        </button>
                     </div>
                     <div class="info ri">
                        <h3> <?=$value['title']?> </h3>
                        <div class="price-sale"> <?=getPriceSale($value)?> </div>
                        <div class="delete">
                           <button class="btn-remove" 
                              onclick="cartAjax({ 
                              action: 'removefromcart', 
                              id: '<?= $value['id'] ?>',
                              msg: 'Đã xóa sản phẩm khỏi giỏ hàng!', 
                              lbl: 'label-danger' });" title="Remove">
                                 <i class="fal fa-trash-alt"></i>
                           </button>
                        </div>
                     </div>

                     <div style="position: absolute; right: 20px; bottom: 15px;">
                        <span> x<?=$value['quantity']?></span> / <b style="font-size: 17px;"> <?=$value['total_price']?> </b>
                     </div>
                  </div>

               <?php endforeach ?>
            </div>
         </div>

         <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="item-right">
               <h3 class="title"> <b>XÁC NHẬN</b> </h3>
               <div class="total-money">
                     <div> Tổng tiền: </div>
                     <div> <?=$cart['total_price']?> </div>
               </div>
               <div class="pay-main">
                  <a class="buy-add" href="<?=getURL()?>">
                     Mua thêm
                  </a>
                  <a class="pay" href="<?=getURL($classify['pay'][0]['uri'])?>">
                     Tiến hành đặt hàng
                  </a>
               </div>
            </div>
         </div>

         <?php else: ?>
         <div class="alert alert-warning" style="padding: 50px; margin: 0 auto; font-size: 23px;">Giỏ hàng của bạn chưa có sản phẩm nào<br><br><a href="./" class="small">Quay về trang chủ</a>
         </div>
         <?php endif ?>
      </div>
   </div>
</div>
<style>
   body.cart #body {
   background: #fff;
   }
  
</style>