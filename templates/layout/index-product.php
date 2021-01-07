<div id="index-product">
	<div class="<?= $container ?>">
		<div class="row">
			<div id="index-product-container-slider" class="swiper-container replaced" data-option="loop:false,autoplay:false,slidesPerView:3,slidesPerColumn:100,slidesPerColumnFill:'row',spaceBetween:20,allowTouchMove:false" data-callback="init:'indexProductContainerInit'">
				<div class="swiper-wrapper">
					<?php foreach ($layout['index']['product'] as $k_cat => $r_cat): ?>
						<div class="swiper-slide">
							<div class="index-product-block-title display-flex flex-center-">
								<img src="<?= $r_cat['thumbnail'] ?>">
								<span><?= $r_cat['title'] ?></span>
								<a href="<?= getURL($r_cat['uri']) ?>" class="index-product-block-btn display-flex flex-center-center">Xem thêm</a>
							</div>
							<div id="index-product-block-slider-<?= $k_cat+1 ?>" class="swiper-container index-product-block-slider" data-option="loop:false,autoplay:false,slidesPerView:2,slidesPerColumn:2,slidesPerColumnFill:'row',spaceBetween:3,allowTouchMove:false" data-callback="init:'indexProductBlockInit'">
								<div class="swiper-wrapper">
									<?php $row_index_product = getItems(array("table" => "product", "condition" => "where find_in_set({$r_cat['id']}, category_id) and enable>0 order by popular desc, level desc, create_date desc limit 4")) ?>
									<?php foreach ($row_index_product as $r_product): ?>
										<div class="swiper-slide product-item-container">
											<?php include _template."layout/product-item.php" ?>
										</div>
									<?php endforeach ?>
								</div>
							</div>
						</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</div>
	<script>
		function indexProductContainerInit() {
			var sw = $(this.el);
			sw.find(".index-product-block-slider").each(function () {
				newSwiper("#" + this.id);
			});
		}
		function indexProductBlockInit() {
		}
	</script>
</div>