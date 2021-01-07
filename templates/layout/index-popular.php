<?php $row_popular = getItems(array("table" => "product", "condition" => "where popular>0 and enable>0 order by level desc, create_date desc")) ?>
<div id="index-popular" class="opacity-0 transition-800ms">
	<div class="<?= $container ?>">
		<div class="row">
			<div class="index-popular-title display-flex">
				<div class="text-uppercase"><?= $layout['index']['popular-title']['value'] ?></div>
				<a href="<?= getURL($classify['product-popular'][0]['uri']) ?>" class="display-flex flex-center-">
					&nbsp;&nbsp;&nbsp;<span class="fa fa-external-link-alt"></span>&nbsp;Xem thêm
				</a>
				<div class="swiper-navigation display-flex flex-center-center">
					<div class="swiper-prev display-flex flex-center-center"><div class="fa fa-chevron-left"></div></div>
					<div class="swiper-next display-flex flex-center-center"><div class="fa fa-chevron-right"></div></div>
				</div>
			</div>
			<div id="index-popular-slider" class="swiper-container replaced" data-option="loop:true,autoplay:{delay:5000},speed:1000,slidesPerView:6,_slidesPerGroup:6,spaceBetween:3,_allowTouchMove:false,navigation:{prevEl:'#index-popular .swiper-prev',nextEl:'#index-popular .swiper-next'}" data-callback="init:'indexPopularInit'">
				<div class="swiper-wrapper">
					<?php for ($i=0; $i < count($row_popular); $i+=2): ?>
						<div class="swiper-slide product-item-container">
							<?php
							$r_product=$row_popular[$i]; include _template."layout/product-item.php";
							// if ($i+1 < count($row_index_post)) {
								$r_product=$row_popular[($i+1)%count($row_popular)]; include _template."layout/product-item.php";
							// }
							// else
							// 	echo '<div class="product-item"></div>';
							?>
						</div>
					<?php endfor ?>
				</div>
			</div>
		</div>
	</div>
	<script>
		function indexPopularInit() {
			var sw = $(this.el);
			sw.find("img").load(function () {
				$(this).attr("data-loaded", "");
				if (sw.find("img[data-loaded]").length >= sw.find("img").length) {
					sw.closest(".opacity-0").removeClass("opacity-0");
				}
			}).each(function () {
				if (this.complete)
					$(this).trigger("load");
			});
		}
	</script>
</div>