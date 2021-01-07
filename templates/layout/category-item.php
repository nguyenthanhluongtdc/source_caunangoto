<div class="category-item display-flex" style="opacity: 0;">
	<div class="item-thumbnail display-flex flex-center-center flex-shrink-0">
		<img class="flex-shrink-0" src="<?= $r_category['thumbnail'] ?>">
	</div>
	<div class="item-heading">
		<div class="item-title"><?= $r_category['title'] ?></div>
		<div>
			<a href="<?= getURL($r_category['uri']) ?>" class="btn btn-success item-btn">Xem thêm</a>
		</div>
	</div>
</div>