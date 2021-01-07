<div id="index-post">
	<div class="<?= $container ?>">
		<div class="row">
			<div id="index-post-slider" class="swiper-container replaced" data-option="loop:false,autoplay:false,slidesPerView:3,spaceBetween:15,allowTouchMove:false" data-callback="init:'indexPostSlider'">
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<?php $row_index_post = getItems(array("table" => "post", "condition" => "where new>0 and enable>0 order by level desc, create_date desc")) ?>
						<div class="index-slider-right-slider-1 flex-shrink-0 opacity-0 transition-800ms">
							<div class="index-slider-right-title"><?= $layout['index']['post-1-title']['value'] ?></div>
							<div class="index-slider-right-slider">
								<div id="index-slider-right-slider-1" class="swiper-container" data-option="loop:<?= is_array($row_index_post)&&count($row_index_post)>3 ? "true" : "false" ?>,autoplay:{delay:5700},speed:1200,spaceBetween:1,allowTouchMove:false,effect:'fade',fadeEffect:{crossFade:true},navigation:{prevEl:'.index-slider-right-slider-1 .swiper-prev',nextEl:'.index-slider-right-slider-1 .swiper-next'}" data-progress="true" data-callback="init:'indexSliderRightInit'">
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
					<div class="swiper-slide">
						<?php $row_index_post = getItems(array("table" => "post", "condition" => "where popular2>0 and enable>0 order by level desc, create_date desc")) ?>
						<div class="index-slider-right-slider-2 flex-shrink-0 opacity-0 transition-800ms">
							<div class="index-slider-right-title"><?= $layout['index']['post-2-title']['value'] ?></div>
							<div class="index-slider-right-slider">
								<div id="index-slider-right-slider-2" class="swiper-container" data-option="loop:<?= is_array($row_index_post)&&count($row_index_post)>3 ? "true" : "false" ?>,autoplay:{delay:5500},speed:800,spaceBetween:1,allowTouchMove:false,effect:'fade',fadeEffect:{crossFade:true},navigation:{prevEl:'.index-slider-right-slider-2 .swiper-prev',nextEl:'.index-slider-right-slider-2 .swiper-next'}" data-progress="true" data-callback="init:'indexSliderRightInit'">
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
					<div class="swiper-slide">
						<?php $row_index_post = getItems(array("table" => "post", "condition" => "where popular>0 and enable>0 order by level desc, create_date desc")) ?>
						<div class="index-slider-right-slider-3 flex-shrink-0 opacity-0 transition-800ms">
							<div class="index-slider-right-title"><?= $layout['index']['post-3-title']['value'] ?></div>
							<div class="index-slider-right-slider">
								<div id="index-slider-right-slider-3" class="swiper-container" data-option="loop:<?= is_array($row_index_post)&&count($row_index_post)>3 ? "true" : "false" ?>,autoplay:{delay:6000},speed:1000,spaceBetween:1,allowTouchMove:false,effect:'fade',fadeEffect:{crossFade:true},navigation:{prevEl:'.index-slider-right-slider-3 .swiper-prev',nextEl:'.index-slider-right-slider-3 .swiper-next'}" data-progress="true" data-callback="init:'indexSliderRightInit'">
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
			</div>
		</div>
	</div>
	<script>
		function indexPostSlider() {
			$(".index-slider-right-slider > .swiper-container:not(.replaced)").each(function () {
				newSwiper("#" + this.id);
			});
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
