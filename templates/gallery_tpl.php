<?php //include _template."layout/breadcrumb.php" ?>
<section id="content" class="gallery">
	<figure class="<?= $container ?>">
		<div class="row">
			<div class="category-title h2">
				<span><?= $category['title'] ?></span>
				<div><img src="<?= $layout['index']['index-line']['thumbnail'] ?>" style="height: 30px;"></div>
			</div>
			<div id="gallery-list-slider" class="swiper-container replaced" data-option="slidesPerView:4,slidesPerColumn:500,slidesPerColumnFill:'row',allowTouchMove:false,loop:false,spaceBetween:24" data-callback="init:'gallerySliderInit'">
				<div class="swiper-wrapper">
					<?php foreach ($row_gallery as $r_gallery):
						if($r_gallery['link'] == "")
							$r_gallery['link'] = $r_gallery['thumbnail'];
					?>
						<div class="swiper-slide opacity-0">
							<a href="<?= $r_gallery['link'] ?>" class="gallery-item fancybox-media" rel="gallery">
								<div class="item-thumbnail"><img src="<?= getResizedImageURL($r_gallery['thumbnail'], 800, 500) ?>"></div>
							</a>
						</div>
					<?php endforeach ?>
				</div>
			</div>
			<?php if ($num_gallery > $limit): ?>
				<div class="gallery-loadmore text-center">
					<button class="btn btn-danger loadmore-btn" onclick="getGallery(this);" data-count="<?= $num_gallery ?>" data-current="<?= $limit ?>" data-step="<?= $step ?>">
						Xem thêm (còn <font><?= $num_gallery-$limit ?></font> sản phẩm)
					</button>
				</div>
			<?php endif ?>
		</div>
	</figure>
</section>
<script>
	function gallerySliderInit() {
		if (window.gallerySlider == undefined)
			window.gallerySlider = this;
		$(window.gallerySlider.el).find(".item-thumbnail img").load(function () {
			target.closest(".opacity-0").animate({ opacity: 1 }, 200);
		}).each(function () {
			if(this.complete)
				$(this).trigger("load");
		});
	}
	function getGallery(target) {
		$.ajax({
			url: "<?= getAjaxURL() ?>gallery_loadmore.php",
			method: "post",
			dataType: "json",
			data: { count: $(target).attr("data-count"), current: $(target).attr("data-current"), step: $(target).attr("data-step") },
			success: function (res) {
				if(res.result == 1 || res.result == "1"){
					for(i in res.data) {
						window.gallerySlider.appendSlide('<div class="swiper-slide">' + res.data[i] + '</div>');
					}
					gallerySliderInit();
					$(target).attr("data-current", res.current);
					$(target).find("font").html(Number($(target).find("font").html()) - res.data.length);
					if(res.continue != 1 && res.continue != "1")
						target.remove();
				}
				else {
					$(target).remove();
				}
			}
		});
	}
</script>
<style>
	.gallery-loadmore .loadmore-btn {
		background: #D73338;
		box-shadow: 0 0 0 2px #D73338;
		border-radius: 0;
		border: none;
		color: #fff;
		font-weight: 500;
		text-shadow: none;
		height: 40px;
		font-size: 16px;3
		-webkit-transition: all .8s;
		-o-transition: all .8s;
		transition: all .8s;
	}
	.gallery-loadmore .loadmore-btn:hover {
		background: transparent;
		color: #D73338;
	}
	.gallery-loadmore {
		margin-top: 30px;
	}
	#gallery-list-slider .gallery-item:hover .item-thumbnail img {
		-webkit-transform: scale(1.2);
		-ms-transform: scale(1.2);
		-o-transform: scale(1.2);
		transform: scale(1.2);
	}
	#gallery-list-slider .item-thumbnail img {
		-webkit-transition: all .8s;
		-o-transition: all .8s;
		transition: all .8s;
	}
	#gallery-list-slider .item-thumbnail {
		overflow: hidden;
		display: -webkit-flex;
		display: -moz-flex;
		display: -ms-flex;
		display: -o-flex;
		display: flex;
		-ms-align-items: center;
		align-items: center;
		-webkit-justify-content: center;
		-moz-justify-content: center;
		-ms-justify-content: center;
		-o-justify-content: center;
		justify-content: center;
	}
	#gallery-list-slider .gallery-item:hover {
		box-shadow: 0 0 3px #000;
	}
	#gallery-list-slider .gallery-item {
		display: block;
		position: relative;
		overflow: hidden;
		box-shadow: 0 0 1px #000;
		cursor: zoom-in;
		-webkit-transition: all .8s;
		-o-transition: all .8s;
		transition: all .8s;
	}
	#gallery-list-slider .swiper-slide {
		padding: 3px;
	}
	.category-title {
		position: relative;
		text-transform: uppercase;
		font-weight: bold;
		text-align: center;
		margin-bottom: 40px;
		padding-top: 20px;
	}
	.category-title span {
		position: relative;
		/*border-bottom: solid 3px #D73338;*/
	}
</style>