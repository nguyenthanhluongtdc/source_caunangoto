<?php include (_template."layout/titlebar.php") ?>
<div class="border-height"></div>
<section class="container-fluid padd_0im mt-4">
   <div id="content">
      <main class="padding-top-mobile">
         <div id="blog-template" class="blog-template">
            <div class="container padd_0im">
               <div class="row mar_0">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     
                     <p style="color: #999;font-size: 12px;margin-bottom: 12px;">
                        Ngày: <?= date("d/m/yy",$post['create_date']); ?> lúc <?= date("H:i",$post['create_date']); ?>
                     </p>

                     <h2 style="font-size: 18px; color: #000; font-weight: bold; margin-bottom: 40px;"> <?=$post['description']?> </h2>
                    
                     <div class="img" style="margin-bottom: 40px;">
                        <img src="<?=$post['thumbnail']?>" alt="">
                     </div>

                     <div class="info-description-article clearfix" style="color: #5d5d5d; font-size: 13px;">
                        <?=$post['content']?>
                     </div>
                  </div>
                
               </div>
            </div>
         </div>
      </main>
   </div>
</section>
<div class="comment_item" style="margin-top: 100px;">
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