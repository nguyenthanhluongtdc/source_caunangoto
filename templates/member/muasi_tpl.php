<section class="container-fluid">
  <div class="row index1">
    <div class="container">
      <h2 class="h2_tieude"><?= $category['first_tag'] ?></h2>
      <div class="mota">
        <section><?= $category['description']  ?> </section>
      </div>
    </div>
  </div>
  <?php $info = getItems(array('table'=>'category_tab','condition'=>'where enable > 0 and category_id = '.$category['id'] )) ?>
  <?php foreach ($info as $key => $value): ?>
    <?php if ($key % 2 == 0 ) {?>  
    <div class="row index2">
      <div class="col-sm-6 col-xs-12 index_div1" style="padding: 0;">
        <div class="index_img"><img src="<?=  $value['thumbnail'] ?>"></div>
      </div>
      <div class="col-sm-6 col-xs-12 title1" style="padding: 0;">
        <div>
          <h2 class="h2_tieude" style="font-size: 20px;"><?= $value['title'] ?></h2>
          <div class="mota">
            <section><?= $value['content'] ?> </section>
          </div>
        </div>
      </div>
    </div>
    <?php } else { ?>
    <div class="row index2">
      <div class="col-sm-6 col-xs-12 title1" style="padding: 0;">
        <div>
          <h2 class="h2_tieude" style="font-size: 20px;"><?= $value['title'] ?></h2>
          <div class="mota">
            <section><?= $value['content'] ?></section>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xs-12 index_div1" style="padding: 0;">
        <div class="index_img"><img src="<?= $value['thumbnail'] ?>"></div>
      </div>
    </div>
    <?php } ?>
  <?php endforeach ?>

  <div>adshajgfkjdgj</div>

</section>

<script>
    var galleryThumbs = new Swiper('.thumb-top', {
      spaceBetween: 0,
      slidesPerView: 6,
      freeMode: true,
      allowTouchMove:false,
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
      slidesPerColumnFill:'row',
      slidesPerColumn:2,
    });
</script>
