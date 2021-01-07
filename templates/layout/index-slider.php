<div id="index-slider">
	<div class="<?= $container ?>">
		<div class="row index-slider-container display-flex flex-start-">
			<div class="index-slider-left flex-grow-1 opacity-0 transition-800ms">
				<div class="index-slider-left-slider">
					<div id="index-slider-left-slider" class="swiper-container replaced" data-option="loop:true,autoplay:{delay:5000},speed:400,spaceBetween:2,_effect:'fade',_fadeEffect:{crossFade:true},navigation:{prevEl:'#index-slider-left-slider .swiper-button-prev',nextEl:'#index-slider-left-slider .swiper-button-next'},_pagination:{el:'#index-slider-left-slider .swiper-pagination',clickable:true},thumbs:{swiper:{el:'#index-slider-left-thumb',slidesPerView:4,spaceBetween:2,loop:false,freeMode:true}}" -data-progress="true" data-callback="init:'indexSliderInit'">
						<div class="swiper-wrapper">
							<?php foreach ($layout['index']['slider'] as $r_slide): ?>
								<div class="swiper-slide" data-effect="random">
									<a href="<?= $r_slide['link'] ?>" title="<?= $r_slide['title'] ?>">
										<img src="<?= getResizedImageURL($r_slide['thumbnail'], 760, 320) ?>" class="fullwidth">
									</a>
								</div>
							<?php endforeach ?>
						</div>
						<div class="swiper-button-prev"><span class="fa fa-chevron-left"></span></div>
						<div class="swiper-button-next"><span class="fa fa-chevron-right"></span></div>
						<!-- <div class="swiper-pagination"></div> -->
					</div>
				</div>
				<div id="index-slider-left-thumb" class="swiper-container">
					<div class="swiper-wrapper">
						<?php foreach ($layout['index']['slider'] as $r_slide): ?>
							<div class="swiper-slide display-flex flex-center-center">
								<?= $r_slide['value'] ?>
							</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
			<?php $row_index_post = getItems(array("table" => "post", "condition" => "where popular3>0 and enable>0 order by level desc, create_date desc")) ?>
			<div class="index-slider-right flex-shrink-0 opacity-0 transition-800ms">
				<div class="index-slider-right-title"><?= $layout['index']['slider-right-title']['value'] ?></div>
				<div class="index-slider-right-slider">
					<div id="index-slider-right-slider" class="swiper-container" data-option="loop:<?= is_array($row_index_post)&&count($row_index_post)>3 ? "true" : "false" ?>,autoplay:{delay:5000},speed:1000,spaceBetween:1,allowTouchMove:false,effect:'fade',fadeEffect:{crossFade:true},navigation:{prevEl:'.index-slider-right .swiper-prev',nextEl:'.index-slider-right .swiper-next'}" data-progress="true" data-callback="init:'indexSliderRightInit'">
						<div class="swiper-wrapper">
							<?php if (is_array($row_index_post) && !empty($row_index_post)): ?>
								<?php for ($i=0; $i<count($row_index_post); $i+=3): ?>
									<div class="swiper-slide" data-effect="random">
										<?php
											$r_post=$row_index_post[$i]; include _template."layout/post-item.php";
											// if ($i+1 < count($row_index_post)) {
												$r_post=$row_index_post[($i+1)%count($row_index_post)]; include _template."layout/post-item.php";
											// }
											// else
											// 	echo '<div class="post-item"></div>';
											// if ($i+2 < count($row_index_post)) {
												$r_post=$row_index_post[($i+2)%count($row_index_post)]; include _template."layout/post-item.php";
											// }
											// else
											// 	echo '<div class="post-item"></div>';
										?>
									</div>
								<?php endfor ?>
							<?php else: ?>
								<div class="swiper-slide text-danger"><div class="col-xs-12 h4">Nội dung đang cập nhật!</div></div>
							<?php endif ?>
						</div>
					</div>
				</div>
				<div class="index-slider-right-btn text-center display-flex flex-center-">
					<?php if (is_array($row_index_post) && count($row_index_post)>3): ?>
						<div class="swiper-prev"><span class="fa fa-chevron-left"></span></div>
					<?php endif ?>
					<div class="flex-grow-1"><a href="<?= getURL($classify['news'][0]['uri']) ?>">Xem thêm</a></div>
					<?php if (is_array($row_index_post) && count($row_index_post)>3): ?>
						<div class="swiper-next"><span class="fa fa-chevron-right"></span></div>
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>
	<script>
		function indexSliderInit() {
			var sw = $(this.el);
			sw.find("img").load(function () {
				$(this).attr("data-loaded", "");
				if (!sw.find("img:not([data-loaded])").length) {
					setTimeout(function () {
						var max = 0;
						$("#index-slider-left-thumb").find(".swiper-slide").each(function () {
							if (max < $(this).outerHeight())
								max = $("#index-slider-left-thumb").outerHeight();
						});
						if (max > 0)
							$("#index-slider-left-thumb .swiper-slide").css("height", (max+1) + "px");
						$("#index-slider-right-slider").css("height", "calc(" + $(".index-slider-left").css("height") + " - " + $(".index-slider-right .index-slider-right-title").css("height") + " - " + $(".index-slider-right .index-slider-right-btn").css("height") + " - 4px)");
						newSwiper("#index-slider-right-slider");
						sw.closest(".opacity-0").removeClass("opacity-0");
					}, 0);
				}
			}).each(function () {
				if (this.complete)
					$(this).trigger("load");
			});
			if (sw.find("img").length <= 0)
				sw.closest(".opacity-0").removeClass("opacity-0");
		}
		function indexSliderRightInit() {
			var sw = $(this.el);
			sw.find("img").load(function () {
				$(this).attr("data-loaded", "");
				if (!sw.find("img:not([data-loaded])").length) {
					sw.closest(".opacity-0").removeClass("opacity-0");
				}
			}).each(function () {
				if (this.complete)
					$(this).trigger("load");
			});
			if (sw.find("img").length <= 0)
				sw.closest(".opacity-0").removeClass("opacity-0");
		}
	</script>
</div>