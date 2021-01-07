<div id="menu-center">
	<div class="<?= $container ?>">
		<div class="row menu-center-container display-flex">
			<div class="menu-center-item"<?= $_GET['param-1']=="" ? "data-active" : "" ?>>
				<a href="<?= is_file("./home.php") ? "./index.php" : "./" ?>" class="a display-flex flex-center-center">
					<span class="fa fa-home"></span>
				</a>
			</div>
			<div class="menu-center-item menu-product">
				<a href="javascript:;" class="a display-flex flex-center-center">
					Danh mục sản phẩm&nbsp;&nbsp;<span class="fa fa-caret-down"></span>
				</a>
				<div class="menu-product-container display-flex">
					<?php foreach ($layout['header']['menu-product'] as $r_menu_product): ?>
						<div class="menu-product-column display-flex flex-column flex-shrink-0">
							<a href="<?= getURL($r_menu_product['uri']) ?>" class="menu-product-title"><?= $r_menu_product['title'] ?></a>
							<?php foreach ($r_menu_product['child'] as $r_menu_product_child): ?>
								<div><a href="<?= getURL($r_menu_product_child['uri']) ?>">
									&nbsp;&nbsp;<span class="fa fa-caret-right"></span>&nbsp;&nbsp;<?= $r_menu_product_child['title'] ?></a>
								</div>
							<?php endforeach ?>
						</div>
					<?php endforeach ?>
				</div>
			</div>
			<?php foreach ($layout['header']['menu-center'] as $r_menu_center): ?>
				<div class="menu-center-item" <?= $r_menu_center['uri']==$_GET['param-1'] ? "data-active" : "" ?>>
					<a href="<?= getURL($r_menu_center['uri']) ?>" class="a display-flex flex-center-center">
						<?= $r_menu_center['title'] ?>
					</a>
					<?php if (is_array($r_menu_center['child']) && !empty($r_menu_center['child'])): ?>
						<div class="menu-center-child-container display-flex">
							<?php foreach ($r_menu_center['child'] as $r_menu_center_child): ?>
								<div class="menu-center-child-column display-flex flex-column flex-shrink-0">
									<a href="<?= getURL($r_menu_center_child['uri']) ?>" class="menu-center-child-title"><?= $r_menu_center_child['title'] ?></a>
									<?php foreach ($r_menu_center_child['child'] as $r_menu_center_child_child): ?>
										<div><a href="<?= getURL($r_menu_center_child_child['uri']) ?>">
											&nbsp;&nbsp;<span class="fa fa-caret-right"></span>&nbsp;&nbsp;<?= $r_menu_center_child_child['title'] ?></a>
										</div>
									<?php endforeach ?>
								</div>
							<?php endforeach ?>
						</div>
					<?php endif ?>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</div>