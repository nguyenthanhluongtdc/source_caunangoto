<div class="product-item">
	<a href="<?= getURL($r_product['uri']) ?>" class="item-thumbnail">
		<img src="<?= !is_file($r_product['thumbnail']) ? getResizedImageURL('assets/img/no-image.png', 400, 400) : getResizedImageURL($r_product['thumbnail'], 400, 400) ?>">
	</a>
	<div class="item-heading">
		<div class="item-title text-justify">
			<a href="<?= getURL($r_product['uri']) ?>">
				<?= $r_product['title'] ?>
			</a>
		</div>
		<div class="item-price">
			<span class="item-price-sale"><?= getPriceSale($r_product) ?></span><?= getPriceOrigin($r_product)!="" ? '<del class="item-price-origin text-muted">'.getPriceOrigin($r_product).'</del>' : '' ?>
		</div>
		<button type="button" class="item-cart-btn btn display-flex flex-center-center" title="Thêm vào giỏ hàng" onclick="cartAjax({ action: 'addtocart', id: '<?= $r_product['id'] ?>',type:'Mua trực tiếp', lbl: 'label-success',msg: 'Thêm vào giỏ hàng thành công' });"><span class="fa fa-cart-plus"></span></button>
	</div>
</div>