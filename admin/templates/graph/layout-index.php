<div id="layout-parent-slider-<?= $r_language['uri'] ?>" class="swiper-container replaced" data-option="loop:false,slidesPerColumn:100,spaceBetween:5,allowTouchMove:false,slidesPerColumnFill:'row'">
	<div class="swiper-wrapper">
		<div class="swiper-slide">
			<?= getGraph($row_position['layout-index-carousel']) ?>
		</div>
	
		<div class="swiper-slide">
			<?= getGraph($row_position['layout-index-product_top']) ?>
		</div>
		
		<div class="swiper-slide">
			<?= getGraph($row_position['layout-index-category_hot']) ?>
		</div>
		<div class="swiper-slide">
			<?= getGraph($row_position['layout-index-category_post_hot']) ?>
		</div>
		<div class="swiper-slide">
			<?= getGraph($row_position['layout-index-commit']) ?>
		</div>
		<div class="swiper-slide">
			<?= getGraph($row_position['layout-index-infomation_add']) ?>
		</div>
		<div class="swiper-slide">
			<?= getGraph($row_position['layout-index-link_video']) ?>
		</div>
	</div>
</div>