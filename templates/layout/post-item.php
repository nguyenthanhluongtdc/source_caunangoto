<div class="post-item">
	<a href="<?= getURL($r_post['uri']) ?>" class="item-thumbnail">
		<img src="<?= getResizedImageURL($r_post['thumbnail'], 320, 240) ?>">
	</a>
	<div class="item-heading display-flex flex-column">
		<div class="item-title">
			<a href="<?= getURL($r_post['uri']) ?>" class="color-menu-center-fg color-hover-menu-center-fv item-title"><?= $r_post['title'] ?></a>
		</div>
		<div class="text-muted flex-grow-1 display-flex flex-end-">
			<div class="item-date"><span class="far fa-calendar-check"></span>&nbsp;<?= date("d/m/Y", $r_post['create_date']); ?></div>
			<a class="item-btn" href="<?= getURL($r_post['uri']) ?>">Chi tiết..</a>
		</div>
	</div>
	<div class="clearfix"></div>
</div>