<?php //include _template."layout/breadcrumb.php" ?>
<section id="content" class="category-product">
	<figure class="container">
		<div class="row">
			<div class="index-all-title text-uppercase text-center">
				<span><?= $category['first_tag']!="" ? $category['first_tag'] : $category['title'] ?></span>
			</div>
		</div>
		<div class="row">
			<div id="brand-slider" class="swiper-container replaced" data-option="slidesPerView:6,slidesPerColumn:100,slidesPerColumnFill:'row',spaceBetween:50" data-callback="init:'brandSliderInit'">
				<div class="swiper-wrapper">
					<?php foreach ($row_brand as $r_brand): ?>
						<div class="swiper-slide brand-item-container">
							<a href="<?= getURL($r_brand['uri']) ?>" title="<?= $r_brand['title'] ?>" style="display: block; text-align: center;">
								<img src="<?= !is_file($r_brand['thumbnail']) ? getResizedImageURL('assets/img/no-image.png', 240, 180, 1, 1) : getResizedImageURL($r_brand['thumbnail'], 240, 180, 1, 1) ?>" style="display: inline-block; margin-top: -3px; max-width: 100%; max-height: 100%;">
							</a>
						</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>
		<script>
			function brandSliderInit() {
				$(this.el).find(".swiper-slide a").each(function () {
					$(this).css("height", $(this).css("width"));
					$(this).css("line-height", $(this).css("width"));
				});
			}
		</script>
	</figure>
</section>
