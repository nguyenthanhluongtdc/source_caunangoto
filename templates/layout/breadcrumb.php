<div class="breadcrumb-outer breadcrumb">
   <div class="container">
      <ol class="breadcrumb">
         <li>
            <a href="<?=is_file("./home.php")?"./index.php":"./"?>"  style="color: #5d5d5d;">Trang chủ</a> 
         </li> 
      <?php $i=1;
      foreach($row_breadcrumb as $uri_breadcrumb=>$title_breadcrumb){
         if($uri_breadcrumb!=""&&$title_breadcrumb!=""){
            if($i<count($row_breadcrumb)){?>
               <li>
                  <a href="<?=getURL($uri_breadcrumb)?>" style="color: #5d5d5d;"><?=$title_breadcrumb?></a> 
               </li>
            <?php }else{ ?>
               <li class="active" style="color: #5d5d5d;">
                  <?=$title_breadcrumb?>
               </li>
      <?php }} $i++;}?> 
      </ol>
   </div>
</div>
   <style>
      .breadcrumb li a , .breadcrumb li{
         text-decoration: none;
         color: blue;
         font-size: 15px;
         text-transform: capitalize;
      }
   .breadcrumb {
      margin-bottom: 0;
      font-size: 14px!important;
      padding-left: 0!important;
      padding-right: 0!important
   }
   .fa-angle-right{
      padding-left: 15px;
      font-size: 15px;
      float: none;
   }

   .breadcrumb .breadcrumb {
      padding: 0!important
   }

   .breadcrumb li {
      font-weight: 500
   }
   </style>