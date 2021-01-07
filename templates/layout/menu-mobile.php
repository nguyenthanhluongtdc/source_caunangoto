<?php
$row_home = $classify['home'];
$row_home_id = array();
foreach ($row_home as $r_home):
	$row_home_id[] = $r_home['id'];
endforeach;
?>
<a href="#menu-mobile-container" class="btn btn_cate_mobile" style="display: none;">
	<i class="fa fa-bars"></i>
</a>
<div id="menu-mobile" class="menu-mobile  menu-kh">
	<div class="menu-mobile-navigation display-flex flex-center-center" style="display: none;position: relative;background-color: var(--maux);align-items:center;">
		
		<div style="padding: 0px 20px;" class="gio_mobile">   
			<a href="<?= getURL($classify['cart'][0]['uri']) ?>" class="a_con">
				<img src="<?= $layout['header']['giohang']['thumbnail'] ?>" style="width: 40px;height: 40px;">
				<div class="div_number">
					<div class="div_number1">
						<span class="cart-number"><?= $cart['total_quantity'] ?></span>
					</div>
				</div>
			</a>
		</div>

		<?php $logo = $layout['header']['logo']  ?>
		<a href="<?= $logo['link'] ?>" class="menu_1" style="margin: auto;padding-bottom: 5px;">
			<img class="img_logo" src="<?= $logo['thumbnail'] ?>">
		</a>
		<!-- <button class="btn collapse-mobile-btn" type="button" onclick="$(this).next().toggleClass('shown');">
			<i class="fa fa-ellipsis-h"></i>
		</button>
		<div class="collapse-mobile" style="position: absolute; display: flex; flex-wrap: wrap; top: 100%; left: 0; right: 0; padding: 0 5px; z-index: 9999;">
			<?php //foreach ($layout['header']['menu-mobile'] as $r_m): ?>
				<a href="<?= ''//getURL($r_m['uri']) ?>" style="float: left; flex-grow: 1; padding: 0 10px; line-height: 40px; text-transform: uppercase;">
					<?= ''//$r_m['title'] ?>
				</a>
			<?php //endforeach ?>
		</div>
		<script>
			$(document).ready(function () {
				$("body").click(function (e) {
					if($(e.target).parents(".collapse-mobile").length==0 && !$(e.target).hasClass("collapse-mobile") && $(e.target).parents(".collapse-mobile-btn").length==0 && !$(e.target).hasClass("collapse-mobile-btn"))
						$(".collapse-mobile").removeClass("shown");
				});
			});
		</script>
		<style>
			.collapse-mobile {
				opacity: 0;
				pointer-events: none;
				-webkit-transition: all .5s;
				-o-transition: all .5s;
				transition: all .5s;
			}
			.collapse-mobile.shown {
				opacity: 1;
				pointer-events: all;
			}
		</style> -->
		<div class="col-sm-12" style="display: block;background-color: #fff;">
          <div class="col-left label-search">
            <div class="search_mobile">
                  <div class="input">
                    <form method="post" action="<?=getURL($classify['search'][0]['uri'])?>">                 
                    <div class="input-search" style="width: calc(100% - 44px);">
                      <input class="input-search" style="font-size: 14px;" name="title" type="text" placeholder="Tìm kiếm sản phẩm...">
                    </div>
                    <button type="submit" class="btn_search"><span class="fa fa-search"></span></button>
                    </form>
                  </div>         
            </div>
          </div>
        </div>
	</div>

	<nav id="menu-mobile-container" style="display: none;">
		<ul>
			<!-- <li><a href="<?= ""//is_file("./home.php") ? "./index.php" : "." ?>" style="padding-left: 15px; font-size: 20px;">
				<span class="fa fa-home"></span>
			</a></li> -->
			<?php foreach ($layout['menu-top'] as $r_menu_top): ?>
				<li><a href="<?= getURL($r_menu_top['uri']) ?>"><?= $r_menu_top['title'] ?></a></li>
			<?php endforeach ?>
			<?php foreach ($layout['header']['menu-center'] as $r_menu_center): if(in_array($r_menu_center['id'], $row_home_id)) continue; ?>
				<li>
					<a href="<?= getURL($r_menu_center['uri']) ?>" style="line-height: 30px;">
						<?= $r_menu_center['title'] ?>
					</a>
					<?php if (is_array($r_menu_center['child']) && !empty($r_menu_center['child'])): ?>
						<ul>
							<?php foreach ($r_menu_center['child'] as $r_submenu_center): ?>
								<li><a href="<?=getURL($r_submenu_center['uri'])?>"><?= $r_submenu_center['title'] ?></a>
									<!-- <ul> -->
									<?php// foreach ($r_submenu_center['child'] as $dog => $list): ?>
										<!-- <li><a href="<?=getURL($list['uri'])?>"><?=$list['title']?></a></li> -->
									<?php// endforeach ?>
									<!-- </ul>	 -->
								</li>
							<?php endforeach ?>
						</ul>
					<?php endif ?>
				</li>
			<?php endforeach; ?>
		</ul>
	</nav>
	<script>$(document).ready(function (){$("#menu-mobile-container").removeAttr("style"); $("#mm-1 .mm-navbar .mm-title").html('<img src="<?= $layout['header']['logo']['thumbnail'] ?>" style="height:35px;">'); $("#mm-1 .mm-navbar .mm-title").click(function () {window.location="<?= is_file("./home.php") ? "./index.php" : "./" ?>"});});</script>
</div>
<style>
.menu-kh{
    transition: 0.5s;
    z-index: 999;
    position: sticky !important;
    padding: 0;
    color: #fff;
    width: 100%;
    top: 0;
}
.search_mobile{
	padding-top: 10px;
}
</style>
<script>

$(document).scroll(function() {
       // didScroll = true;
		if ($(this).scrollTop() > 50) {
              $('.search_mobile').hide(500);
		}
		if ($(this).scrollTop() == 0) {
              $('.search_mobile').show(400);

		}
		
	});
</script>