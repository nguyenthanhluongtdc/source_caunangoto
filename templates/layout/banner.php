<div id="banner">
	<div class="<?= $container ?>">
		<div class="row display-flex flex-center-">
			<a href="<?= is_file("./home.php") ? "./index.php" : "./" ?>" class="banner-left display-flex flex-center-">
				<img src="<?= $layout['header']['logo']['thumbnail'] ?>" class="logo">
			</a>
			<div class="banner-right display-flex flex-center- flex-column flex-grow-1">
				<div class="banner-right-top display-flex flex-center- fullwidth">
					<form action="<?= getURL($classify['search'][0]['uri']) ?>" class="search-form display-flex flex-grow-1" method="post" accept-charset="UTF-8">
						<input type="text" name="keyword" class="form-control" placeholder="Bạn muốn tìm gì?">
						<button type="submit" name="searchbtn" class="btn"><span class="fa fa-search"></span>&nbsp;&nbsp;Tìm kiếm</button>
					</form>
					<div class="hotline-container">
						<div class="hotline-title"><?= $layout['header']['hotline-title']['value'] ?></div>
						<div class="hotline-number"><?= $layout['header']['hotline-number']['value'] ?></div>
					</div>
					<a href="<?= getURL($classify['cart'][0]['uri']) ?>" class="cart-container display-flex flex-center-">
						<span class="cart-icon fa fa-shopping-cart"></span>
						<span class="cart-label">Giỏ hàng</span>
						<span class="cart-number display-flex flex-center-center">
							<font><?= $cart['total_quantity'] ?></font>
						</span>
					</a>
				</div>
				<div class="banner-right-bottom display-flex flex-center- fullwidth">
					<div class="product-visited" onmouseenter="$(this).attr('data-hover', '');" onmouseleave="var target=$(this); setTimeout(function() { if($('.product-visited-container[data-hover]').length==0) target.removeAttr('data-hover'); }, 0);">
						<span class="fa fa-history"></span>&nbsp;&nbsp;<?= $layout['header']['product-visited-title']['value'] ?><!-- &nbsp;<span class="fa fa-caret-down"></span> -->
					</div>
					<?php if ($_SESSION['viewlist'] != ""): ?>
						<div class="product-visited-container" onmouseenter="$(this).attr('data-hover', '');" onmouseleave="$(this).removeAttr('data-hover'); $(this).prev().removeAttr('data-hover');">
							<div id="product-visited-slider" class="swiper-container replaced" data-option="loop:false,autoplay:false,slidesPerView:7,slidesPerColumn:100,slidesPerColumnFill:'row',spaceBetween:5,allowTouchMove:false">
								<div class="swiper-wrapper">
									<?php foreach (explode(",", $_SESSION['viewlist']) as $r_visited): ?>
										<?php $r_product = getItems(array("table" => "product", "id" => $r_visited)) ?>
										<div class="swiper-slide product-visited-item">
											<img class="thumbnail" src="<?= getResizedImageURL($r_product['thumbnail'], 400, 400) ?>">
											<div class="text-center"><?= $r_product['title'] ?></div>
										</div>
									<?php endforeach ?>
								</div>
							</div>
						</div>
					<?php else: ?>
						<div></div>
					<?php endif ?>
					<?php if ($layout['header']['text-1']['value'] != ""): ?>
						<div>
							<span class="fa fa-clock"></span>&nbsp;&nbsp;<?= $layout['header']['text-1']['value'] ?>
						</div>
					<?php endif ?>
					<?php if ($layout['header']['text-2']['value'] != ""): ?>
						<div>
							<span class="fa fa-map-marker-alt"></span>&nbsp;&nbsp;<?= $layout['header']['text-2']['value'] ?>
						</div>
					<?php endif ?>
					<div class="menu-banner-container display-flex flex-center-end flex-grow-1">
						<?php foreach ($layout['header']['menu-banner'] as $r_menu_banner): ?>
							<a href="<?= getURL($r_menu_banner['uri']) ?>" class="menu-banner-item"><?= $r_menu_banner['title'] ?></a>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>