<?php
	$db->query("select distinct c.id, c.thumbnail, c.title, group_concat(p.id) as product_id from #_category c join #_product p on find_in_set(c.id, p.category_id) where p.popular2>0 and p.enable>0 and c.enable>0 group by c.id order by c.`index`");
	$row_index_hot = $db->result_array();
?>
<div id="index-product" class="index-hot">
	<div class="<?= $container ?>">
		<div class="row">
			<div class="index-hot-title"><?= $layout['index']['hot-title']['value'] ?></div>
			<div id="index-hot-container-slider" class="swiper-container replaced" data-option="loop:false,autoplay:false,slidesPerView:3,slidesPerColumn:100,slidesPerColumnFill:'row',spaceBetween:20,allowTouchMove:false" data-callback="init:'indexProductContainerInit'">
				<div class="swiper-wrapper">
					<?php $product_id = array("''"); foreach ($row_index_hot as $k_cat => $r_cat): ?>
						<?php $row_index_hot = getItems(array("table" => "product", "condition" => "where id not in (".implode(",", $product_id).") and find_in_set(id, '{$r_cat['product_id']}') and enable>0 order by popular desc, level desc, create_date desc limit 4")) ?>
						<?php if (is_array($row_index_hot) && !empty($row_index_hot)): ?>
							<div class="swiper-slide">
								<div class="index-product-block-title display-flex flex-center-">
									<img src="<?= $r_cat['thumbnail'] ?>">
									<span><?= $r_cat['title'] ?></span>
									<a href="<?= getURL($r_cat['uri']) ?>" class="index-product-block-btn display-flex flex-center-center">Xem thêm</a>
								</div>
								<div id="index-hot-block-slider-<?= $k_cat+1 ?>" class="swiper-container index-product-block-slider" data-option="loop:false,autoplay:false,slidesPerView:2,slidesPerColumn:2,slidesPerColumnFill:'row',spaceBetween:3,allowTouchMove:false" data-callback="init:'indexProductBlockInit'">
									<div class="swiper-wrapper">
										<?php foreach ($row_index_hot as $r_product): $product_id[] = $r_product['id']; ?>
											<div class="swiper-slide product-item-container">
												<?php include _template."layout/product-item.php" ?>
											</div>
										<?php endforeach ?>
									</div>
								</div>
							</div>
						<?php endif ?>
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