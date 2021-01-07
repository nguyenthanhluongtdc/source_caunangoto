<?php //include _template."layout/breadcrumb.php" ?>
<script>
	function loadProduct(start){
		$.ajax({
			url: "",
			method: "post",
			dataType: "json",
			data: { start: start, limit: 24, loadProduct: "1" },
			success: function (res) {
				if (res.result == 1 || res.result == "1") {
					var item;
					for(i in res.data) {
						item = $(document.createElement(`div`));
						item.attr(`class`, `col-md-3 product-item-container hid`);
						item.css(`display`, `none`);
						item.append(res.data[i]);
						$($(`.product-list-container > div .product-item-container`)[$(`.product-list-container > div .product-item-container`).length-1]).after(item);
					}
					setTimeout(function () {
						refreshHeight();
						loadProduct(res.start);
					}, 100);
				}
			}
		});
	};
	function refreshHeight() {
		$(".product-item-container:not(.hid) .item-thumbnail:not(.loaded) img").load(function () {
			var w = $(this).parent().outerWidth();
			if ($(this).outerHeight() > w) {
				$(this).css("width", "auto");
				$(this).css("height", "100%");
			}
			if (!$(`[class="`+$(this).parent().attr("class")+` loaded"]`).length)
				$("#body").append(`<style>[class="`+$(this).parent().attr("class")+` loaded"] { height: calc(`+w+`px * 400 / 300); }</style>`);
			$(this).parent().addClass("loaded");
			$(this).closest(".opacity-0").removeClass("opacity-0");
		}).each(function () {
			if(this.complete)
				$(this).trigger("load");
		});
	}
</script>
<section id="content" class="category-product">
	<figure class="container">
		<div class="row">
			<div class="index-all-title text-uppercase text-center">
				<?php if (is_array($category) && !empty($category)): ?>
					<span><?= $category['first_tag']!="" ? $category['first_tag'] : $category['title'] ?></span>
				<?php elseif (is_array($category) && !empty($category)): ?>
					<span><?= $option['title'] ?></span>
				<?php endif ?>
			</div>
		</div>
		<div  class="row">
			<div class="col-xs-12 display-flex flex-center-center">
				<?php foreach (array( "brand" => $classify['brand'][0]['title'], "masterial" => "Chất liệu", "price" => "Giá" ) as $k_type => $r_type):
					if (is_array($option) && !empty($option) && $k_type==$option['type']) continue; ?>
					<?php
					if ($k_type=="masterial") {
						$exclude = "and find_in_set({$classify['watch'][0]['id']}, category_id)";
					}
					else
						$exclude = "";
					$row_filter = getItems(array("table" => "option", "condition" => "where type like '{$k_type}' {$exclude} and enable>0 order by `index`, title"));
					$r_option = getItems(array("table" => "option", "id" => $_SESSION['index_product_filter'][$k_type]));
					if (is_array($row_filter) && !empty($row_filter)): ?>
						<div class="filter-panel display-flex flex-center-center" data-filter="<?= $k_type ?>">
							<b><span id="filter-title-<?= $k_type ?>" class="filter-title"><font><?= is_array($r_option)&&!empty($r_option) ? $r_option['title'] : $r_type ?></font></span>&nbsp;&nbsp;<span class="fa fa-caret-down text-danger"></span></b>
							<div class="filter-dropdown">
								<div class="filter-scroller">
									<a class="filter-item color-menu-center-fv color-hover-menu-center-fg" data-id="%" href="javascript:;">Tất cả</a>
									<?php foreach ($row_filter as $k_filter => $r_filter): ?>
										<a class="filter-item color-menu-center-fv color-hover-menu-center-fg" data-id="<?= $r_filter['id'] ?>" href="javascript:;"><?= $r_filter['title'] ?></a>
									<?php endforeach ?>
								</div>
							</div>
						</div>
					<?php endif ?>
					&nbsp;&nbsp;&nbsp;
				<?php endforeach ?>
				<span class="filter-clear-button fa fa-times color-menu-center-fv" title="Xóa lọc" style="font-size: 12px; cursor: pointer;"></span>
			</div>
		</div>
		<div class="row product-list-container">
			<div>
				<?php for ($i=0; $i<count($row_product); $i++):
					$r_product = $row_product[$i]; ?>
					<div class="col-md-3 product-item-container opacity-0 <?= $k_product>=$limit ? "hid" : "" ?>" <?= $k_product>=$limit ? 'style="display: none;"' : '' ?>>
						<?php include _template."layout/product-item.php" ?>
					</div>
					<?php $r_product = getItems(array("table" => "product", "id" => $r_product['female_id'])); ?>
					<div class="col-md-3 product-item-container opacity-0 <?= $k_product>=$limit ? "hid" : "" ?>" <?= $k_product>=$limit ? 'style="display: none;"' : '' ?>>
						<?php include _template."layout/product-item.php" ?>
					</div>
				<?php endfor ?>
				<div class="clearfix"></div>
				<?= ''//$paging ?>
				<script>
					$(document).ready(function () {
						loadProduct(<?= $limit ?>);
						refreshHeight();
						setTimeout(function () {
							var max = 0;
							$(".product-item .item-title").each(function () {
								if (max < $(this).outerHeight())
									max = $(this).outerHeight();
							});
							if (max > 0)
								$(".product-item .item-title").css("min-height", max + "px");
						}, 500);
						$(document).scroll(function () {
							var sctop = $(this).scrollTop();
							var vh = $(window).outerHeight();
							var cttop = sctop + vh;
							var nxtop = $("#content").next().offset().top;
							if (cttop >= nxtop) {
								for (i=0; $("#content .product-item-container.hid").length && i<12; i++) {
									$($("#content .product-item-container.hid").get(0)).css("opacity", 0);
									$($("#content .product-item-container.hid").get(0)).show(0);
									$($("#content .product-item-container.hid").get(0)).animate({ "opacity": 1 }, 800);
									$($("#content .product-item-container.hid").get(0)).removeClass("hid");
								}
								refreshHeight();
								setTimeout(function () {
									var max = 0;
									$(".product-item .item-title").each(function () {
										if (max < $(this).outerHeight())
											max = $(this).outerHeight();
									});
									if (max > 0)
										$(".product-item .item-title").css("min-height", max + "px");
								}, 500);
							}
						});
					});
				</script>
			</div>
		</div>
	</figure>
</section>
<div></div>
<?php include _template."layout/index-partner.php" ?>
<script>
	$(document).ready(function () {
		if (window.matchMedia("(max-width: 991px)").matches) {
			$(".filter-panel").click(function () {
				$(this).find(".filter-dropdown").toggleClass("shown");
			});
			$("body").on("click", function (e) {
				if(!$(e.target).closest(".filter-panel").length)
					$(".filter-panel .filter-dropdown").removeClass("shown");
			});
		}
		$(".filter-item").click(function () {
			var target = $(this);
			target.closest(".filter-dropdown").css("pointer-events", "none");
			$.ajax({
				url: "<?= getAjaxURL() ?>product_filter.php",
				method: "post",
				data: { k: target.closest(".filter-panel").data("filter"), id: target.data("id") },
				success: function (res) {
					var title_id = target.closest(".filter-panel").find(".filter-title").attr("id");
					$("#"+title_id).load(" #"+title_id+" > font");
					$(".product-list-container").load(" .product-list-container > div", function () {
						refreshHeight();
						setTimeout(function () {
							var max = 0;
							$(".product-item .item-title").each(function () {
								if (max < $(this).outerHeight())
									max = $(this).outerHeight();
							});
							if (max > 0)
								$(".product-item .item-title").css("min-height", max + "px");
							target.closest(".filter-dropdown").removeAttr("style");
						}, 500);
					});
				}
			});
		});
		$(".filter-clear-button").click(function () {
			$.ajax({
				url: "<?= getAjaxURL() ?>product_filter.php",
				method: "post",
				data: { k: "clear" },
				success: function (res) {
					$(".filter-title").each(function () {
						var title_id = $(this).attr("id");
						$("#"+title_id).load(" #"+title_id+" > font");
					});
					$(".product-list-container").load(" .product-list-container > div", function () {
						refreshHeight();
						var max = 0;
						$(".product-item .item-title").each(function () {
							if (max < $(this).outerHeight())
								max = $(this).outerHeight();
						});
						if (max > 0)
							$(".product-item .item-title").css("min-height", max + "px");
					});
				}
			});
		});
	});
</script>