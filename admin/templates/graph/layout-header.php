<div id="layout-parent-slider-<?= $r_language['uri'] ?>" class="swiper-container replaced" data-option="loop:false,slidesPerColumn:100,spaceBetween:5,allowTouchMove:false,slidesPerColumnFill:'row'">
	<div class="swiper-wrapper">
		<div class="swiper-slide">
			<?= getGraph($row_position['layout-logo_website']) ?>
		</div>
		<div class="swiper-slide">
			<?= getGraph($row_position['layout-navigation']) ?>
		</div>
		<div class="swiper-slide">
			<?= getGraph($row_position['layout-support']) ?>
		</div>
		<div class="swiper-slide">
			<?= getGraph($row_position['layout-icon_contact']) ?>
		</div>
	</div>
</div>